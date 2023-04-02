<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use App\Models\Member;
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
        $members = Member::paginate(9);

        return view('admin.loan', compact(['members']));
    }

    public function read($id)
    {
        $member = Member::findOrFail($id);
        
        return view('admin.loan-detail', compact('member'));
    }

    public function create(Request $request)
    {
        Validator::make($request->all(), [
            'transaction_number' => 'required',
            'date' => 'required|date',
            'member_id' => 'required|exists:members,id',
            'principal_saving' => 'required|numeric',
            'mandatory_saving' => 'required|numeric',
            'voluntary_saving' => 'required|numeric',
        ]);

        $data = [
            'transaction_number' => $request->transaction_number,
            'date' => $request->date,
            'member_id' => $request->member_id,
            'principal_saving' => $request->principal_saving,
            'mandatory_saving' => $request->mandatory_saving,
            'voluntary_saving' => $request->voluntary_saving,
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
            'transaction_number' => 'required',
            'date' => 'required|date',
            'member_id' => 'required|exists:members,id',
            'principal_saving' => 'required|numeric',
            'mandatory_saving' => 'required|numeric',
            'voluntary_saving' => 'required|numeric',
        ]);

        $data = [
            'transaction_number' => $request->transaction_number,
            'date' => $request->date,
            'member_id' => $request->member_id,
            'principal_saving' => $request->principal_saving,
            'mandatory_saving' => $request->mandatory_saving,
            'voluntary_saving' => $request->voluntary_saving,
        ];

        Loan::findOrFail($id)->update($data);
        return response()->json(['success' => "Data Updated Successfully"]);
    }

    public function delete($id)
    {
        Loan::findOrFail($id)->delete();

        return redirect()->route('admin.saving.list')->with('success', "Data Deleted Successfully");
    }
}