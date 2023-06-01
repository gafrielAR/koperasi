<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

// Models
use App\Models\Member;

class MemberController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function list() {
        $members = Member::orderByDesc('created_at')->paginate(18);

        return view('admin.member', compact('members'));
    }

    public function create(Request $request) {
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

    public function edit($id) {
        $data = Member::findOrFail($id);

        return response()->json(['result' => $data]);
    }

    public function update(Request $request, $id) {
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

    public function delete($id) {
        Member::findOrFail($id)->delete();

        return redirect()->route('admin.member.list')->with('success', "Data Deleted Successfully");
    }
}
