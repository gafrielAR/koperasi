<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

use App\Models\Saving;
use App\Models\Loan;
use App\Models\Installment;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function dashboard() {
        $savings        = Saving::with('member')->get();
        $loans          = Loan::with(['member', 'installments'])->get();
        $installments   = Installment::with('loan')->get();

        return view('admin.dashboard', compact(['savings', 'loans', 'installments']));
    }

    public function savingChart() {
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
