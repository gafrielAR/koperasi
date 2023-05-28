<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Saving;
use App\Models\Member;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function dashboard() {
        $savings = Saving::with('member')->get();
        $members = Member::all();

        return view('admin.dashboard', compact(['savings', 'members']));
    }
}
