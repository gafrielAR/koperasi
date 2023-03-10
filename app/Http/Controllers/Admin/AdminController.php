<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Member;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function dashboard() {
        $members = Member::with('savings')->with('loans')->with('installments')->paginate(9);

        // dd($members->savings);
        
        return view('admin.dashboard', compact('members'));
    }

    public function member() {
        $members = Member::paginate(9);

        return view('admin.member', compact('members'));
    }
}
