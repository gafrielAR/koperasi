<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Installment;
use App\Models\Loan;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstallmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $installments = Installment::orderBy('id', 'desc')->get();
        $members = Member::all();
        $loans = Loan::all();

        return view('admin.installment', compact(['installments', 'members', 'loans']));
    }

    public function api_loan(Request $request)
    {
        $data['loans'] = Loan::where('member_id', $request->member_id)->get();

        return response()->json($data);
    }

    public function create(Request $request)
    {
        Validator::make($request->all(), [
            'date' => 'required|date',
            'loan_id' => 'required|exists:loans,id',
            'installment_number' => 'required|numeric',
            'ammount' => 'required|numeric'
        ]);

        $data = [
            'prefix' => 'IN',
            'date' => $request->date,
            'loan_id' => $request->loan_id,
            'installment_number' => $request->installment_number,
            'ammount' => $request->ammount,
        ];

        Installment::create($data);
        return response()->json(['success' => "Data Saved Successfully"]);
    }

    public function edit($id)
    {
        $data = Installment::findOrFail($id);

        return response()->json(['result' => $data]);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'date' => 'required|date',
            'loan_id' => 'required|exists:loans,id',
            'installment_number' => 'required|numeric',
            'ammount' => 'required|numeric'
        ]);

        $data = [
            'prefix' => 'IN',
            'date' => $request->date,
            'loan_id' => $request->loan_id,
            'installment_number' => $request->installment_number,
            'ammount' => $request->ammount,
        ];

        Installment::findOrFail($id)->update($data);
        return response()->json(['success' => "Data Updated Successfully"]);
    }

    public function delete($id)
    {
        Installment::findOrFail($id)->delete();

        return redirect()->route('admin.saving.list')->with('success', "Data Deleted Successfully");
    }
}
