<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Saving;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $member = Auth::user();
        $id = Auth::id();

        $savingsByYear = Saving::select(
            DB::raw('YEAR(date) AS year'),
            DB::raw('SUM(principal_saving + mandatory_saving + voluntary_saving) AS total_savings')
        )
            ->groupBy('year')
            ->where('member_id', '=', $id)
            ->get();

        $interestByYear = Loan::select(DB::raw('YEAR(date) AS year'), DB::raw('SUM(interest) AS total_interest'))
            ->groupBy('year')
            ->where('member_id', '=', $id)
            ->get();

        $shuData = [];

        foreach ($savingsByYear as $savingsShu) {
            $year = $savingsShu->year;
            $totalSavings = $savingsShu->total_savings;
            $totalInterest = $interestByYear->firstWhere('year', $year)->total_interest;
            $shu = ($totalSavings + $totalInterest) * 0.05;

            $shuData[] = [
                'year' => $year,
                'total_savings' => $totalSavings,
                'total_interest' => $totalInterest,
                'shu' => $shu,
            ];
        }

        return view('user.index', compact('shuData'));
    }
}
