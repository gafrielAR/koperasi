<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use App\Models\Member;
use App\Models\Saving;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $loans = Loan::paginate(9);
        $members = Member::all();

        return view('admin.loan', compact(['loans', 'members']));
    }

    public function read($id)
    {
        $member = Member::findOrFail($id);

        return view('admin.loan-detail', compact('member'));
    }

    public function create(Request $request)
    {
        Validator::make($request->all(), [
            'member_id' => 'required|exists:members,id',
            'loan_number' => 'required',
            'date' => 'required|date',
            'term' => 'required|numeric',
            'loan' => 'required|numeric',
            'interest' => 'required|numeric',
            'installment' => 'required|numeric',
        ]);

        $data = [
            'prefix' => 'LN',
            'member_id' => $request->member_id,
            'date' => $request->date,
            'term' => $request->term,
            'loan' => $request->loan,
            'interest' => $request->interest,
            'installment' => $request->installment,
        ];

        Loan::create($data);
        return response()->json(['success' => "Data Saved Successfully"]);
    }

    public function edit($id)
    {
        $data = Loan::findOrFail($id);

        return response()->json(['result' => $data]);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'member_id' => 'required|exists:members,id',
            'loan_number' => 'required',
            'date' => 'required|date',
            'term' => 'required|numeric',
            'loan' => 'required|numeric',
            'interest' => 'required|numeric',
            'installment' => 'required|numeric',
        ]);

        $data = [
            'prefix' => 'LN',
            'member_id' => $request->member_id,
            'date' => $request->date,
            'term' => $request->term,
            'loan' => $request->loan,
            'interest' => $request->interest,
            'installment' => $request->installment,
        ];

        Loan::findOrFail($id)->update($data);
        return response()->json(['success' => "Data Updated Successfully"]);
    }

    public function delete($id)
    {
        Loan::findOrFail($id)->delete();

        return redirect()->route('admin.loan.list')->with('success', "Data Deleted Successfully");
    }
}
