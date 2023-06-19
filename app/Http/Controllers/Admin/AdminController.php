<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Models\Saving;
use App\Models\Member;
use App\Models\Loan;
use App\Models\Installment;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function dashboard()
    {
        // $members        = Member::all();
        $savings        = Saving::with('member')->get();
        $loans          = Loan::with(['member', 'installments'])->get();
        $installments   = Installment::with('loan')->get();
        $members        = Member::with(['loans', 'savings'])->get();

        $savingsByYearAndMember = Saving::select(
            DB::raw('YEAR(date) AS year'),
            'member_id',
            DB::raw('SUM(principal_saving + mandatory_saving + voluntary_saving) AS total_savings')
        )
            ->groupBy('year', 'member_id')
            ->get();

        $interestByYear = Loan::select(DB::raw('YEAR(date) AS year'), DB::raw('SUM(interest) AS total_interest'))
            ->groupBy('year')
            ->get();

        $shuData = [];

        foreach ($savingsByYearAndMember as $savingsShu) {
            $year = $savingsShu->year;
            $member = Member::findOrFail($savingsShu->member_id);
            $totalSavings = $savingsShu->total_savings;
            $totalInterest = $interestByYear->firstWhere('year', $year)->total_interest;
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

        return view('admin.dashboard', compact(['members', 'savings', 'loans', 'installments', 'shuData']));
    }

    public function savingChart()
    {
        $year = 2022;

        $results = DB::select("
            SELECT
                months.month,
                COALESCE(SUM(s.mandatory_saving), 0) AS mandatory_saving,
                COALESCE(SUM(s.principal_saving), 0) AS principal_saving
            FROM (
                SELECT 1 AS month
                UNION SELECT 2
                UNION SELECT 3
                UNION SELECT 4
                UNION SELECT 5
                UNION SELECT 6
                UNION SELECT 7
                UNION SELECT 8
                UNION SELECT 9
                UNION SELECT 10
                UNION SELECT 11
                UNION SELECT 12
            ) AS months
            LEFT JOIN savings AS s
                ON MONTH(s.date) = months.month
                    AND YEAR(s.date) = :year
            GROUP BY
                months.month
            ORDER BY
                months.month
        ", ['year' => $year]);

        $labels = [];
        $mandatorySavingData = [];
        $principalSavingData = [];

        foreach ($results as $result) {
            $labels[] = "Month " . $result->month;
            $mandatorySavingData[] = $result->mandatory_saving;
            $principalSavingData[] = $result->principal_saving;
        }

        $data = [
            'labels' => $labels,
            'series' => [
                [
                    'name' => 'Mandatory Saving',
                    'data' => $mandatorySavingData,
                ],
                [
                    'name' => 'Principal Saving',
                    'data' => $principalSavingData,
                ],
            ],
        ];

        // $jsonData = json_encode($data);

        return response()->json(['result' => $data]);
    }
}
