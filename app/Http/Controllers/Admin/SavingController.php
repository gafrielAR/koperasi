<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SavingsDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

// Models
use App\Models\Saving;
use Yajra\DataTables\DataTables;

class SavingController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function list(SavingsDataTable $savings) {
        return $savings->render('admin.saving');
    }

    public function create(Request $request) {
        Validator::make($request->all(), [
            'transaction_number'    => 'required',
            'date'                  => 'required|date',
            'member'                => 'required|exists:members,id',
            'principal_saving'      => 'required|numeric',
            'mandatory_saving'      => 'required|numeric',
            'voluntary_saving'      => 'required|numeric',
        ]);

        $data = [
            'transaction_number'    => $request->transaction_number,
            'date'                  => $request->date,
            'member'                => $request->member,
            'principal_saving'      => $request->principal_saving,
            'mandatory_saving'      => $request->mandatory_saving,
            'voluntary_saving'      => $request->voluntary_saving,
        ];

        Saving::create($data);
        return response()->json(['success' => "Data Saved Successfully"]);
    }

    public function edit($id) {
        $data = Saving::findOrFail($id);

        return response()->json(['result' => $data]);
    }

    public function update(Request $request, $id) {
        Validator::make($request->all(), [
            'name' => 'required',
            'nip' => 'required|numeric',
            'gender' => 'required|in:male,female',
        ]);

        $data = [
            'name' => $request->name,
            'nip' => $request->nip,
            'gender' => $request->gender
        ];

        Saving::where('id', $id)->update($data);
        return response()->json(['success' => "Data Updated Successfully"]);
    }

    public function delete($id) {
        Saving::findOrFail($id)->delete();

        return redirect()->route('admin.saving.list')->with('success', "Data Deleted Successfully");
    }
}