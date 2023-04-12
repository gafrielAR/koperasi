<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Installment;
use App\Models\Loan;
use App\Models\Member;
use Illuminate\Http\Request;

class InstallmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $installments = Installment::paginate(9);
        $members = Member::all();
        $loans = Loan::all();

        return view('admin.installment', compact(['installments', 'members', 'loans']));
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

        Saving::create($data);
        return response()->json(['success' => "Data Saved Successfully"]);
    }

    public function edit($id)
    {
        $data = Saving::findOrFail($id);

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

        Saving::findOrFail($id)->update($data);
        return response()->json(['success' => "Data Updated Successfully"]);
    }

    public function delete($id)
    {
        Saving::findOrFail($id)->delete();

        return redirect()->route('admin.saving.list')->with('success', "Data Deleted Successfully");
    }
}
