<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

// Models
use App\Models\Member;
use App\Models\Saving;
use App\Models\Loan;
use App\Models\Installment;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $members = Member::orderByDesc('created_at')->paginate(18);

        return view('admin.member', compact('members'));
    }

    public function show($id)
    {
        $member = optional(Member::findOrFail($id));
        $members = Member::all();
        $loans = Loan::all();
        $installments = Installment::all();
        $savings = Saving::all();

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

        return view('admin.member.show', compact(['loans', 'installments', 'savings', 'members', 'member', 'shuData']));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'nip' => 'required|numeric',
            'gender' => 'required|in:male,female',
        ]);

        $data = [
            'name' => $request->name,
            'nip' => $request->nip,
            'gender' => $request->gender
        ];

        Member::create($data);
        return response()->json(['success' => "Data Saved Successfully"]);
    }

    public function edit($id)
    {
        $data = Member::findOrFail($id);

        return response()->json(['result' => $data]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'nip' => 'required|numeric',
            'gender' => 'required|in:male,female',
        ]);

        $data = [
            'name' => $request->name,
            'nip' => $request->nip,
            'gender' => $request->gender
        ];

        Member::where('id', $id)->update($data);
        return response()->json(['success' => "Data Updated Successfully"]);
    }

    public function delete($id)
    {
        Member::findOrFail($id)->delete();

        return redirect()->route('admin.member.list')->with('success', "Data Deleted Successfully");
    }
}
