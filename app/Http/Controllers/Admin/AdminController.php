<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Models\Saving;
use App\Models\Member;
use App\Models\Loan;
use App\Models\Installment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // $members        = Member::all();
        $savings = Saving::with('member')->get();
        $loans = Loan::with(['member', 'installments'])->get();
        $installments = Installment::with('loan')->get();
        $members = Member::with(['loans', 'savings'])->get();

        $savingsByYearAndMember = Saving::select(
            DB::raw('YEAR(date) AS year'),
            'member_id',
            DB::raw('SUM(principal_saving + mandatory_saving + voluntary_saving) AS total_savings')
        )
            ->groupBy('year', 'member_id')
            ->get();

        $interestByYear = Loan::select(
            DB::raw('YEAR(date) AS year'),
            DB::raw('SUM(interest) AS total_interest')
        )
            ->groupBy('year')
            ->get();

        $shuData = [];

        foreach ($savingsByYearAndMember as $savingsShu) {
            $year = $savingsShu->year;
            $member = Member::findOrFail($savingsShu->member_id);
            $totalSavings = $savingsShu->total_savings;
            $totalInterest = $interestByYear->firstWhere('year', $year)->total_interest ?? 0;
            $multiply = $totalSavings + $totalInterest;
            $shu = $multiply * 0.05;

            $shuData[] = [
                'year' => $year,
                'member' => $member->name,
                'total_savings' => $totalSavings,
                'total_interest' => $totalInterest,
                'shu' => $shu,
            ];
        }

        return view('admin.dashboard', compact('members', 'savings', 'loans', 'installments', 'shuData'));
    }

    public function getData(Request $request)
    {
        $year = $request->input('year', date('Y'));

        $savingQuery = Saving::query();
        $loanQuery = Loan::query();
        $installmentQuery = Installment::query();

        // If a specific year is selected, apply the filtering
        if ($year) {
            $startDate = "{$year}-01-01 00:00:00";
            $endDate = "{$year}-12-31 23:59:59";

            $savingQuery->whereBetween('date', [$startDate, $endDate]);
            $loanQuery->whereBetween('date', [$startDate, $endDate]);
            $installmentQuery->whereBetween('date', [$startDate, $endDate]);
        }

        $savings = $savingQuery->with('member')->get();
        $loans = $loanQuery->with(['member', 'installments'])->get();
        $installments = $installmentQuery->with(['loan', 'loan.member'])->get();

        return response()->json([
            'savings' => $savings,
            'loans' => $loans,
            'installments' => $installments
        ]);
    }


    public function filterByYear(Request $request)
    {
        $year = $request->input('year', date('Y'));

        $items = [
            'savings' => Saving::whereYear('date', $year)->get(),
            'loans' => Loan::whereYear('date', $year)->get(),
            'installments' => Installment::whereYear('date', $year)->get(),
        ];

        return response()->json($items);
    }

    public function savingChart(Request $request)
    {
        $year = $request->input('year', date('Y'));
        $data = Saving::whereYear('date', $year)->get();

        $response = [
            'chart' => [
                'prices' => $data->pluck('principal_saving')->toArray(),
                'dates' => $data->pluck('date')->toArray()
            ]
        ];

        return response()->json($response);
    }
}
