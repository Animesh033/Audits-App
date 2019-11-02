<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; //added

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File; //added
use Excel;
class AdminController extends Controller
{
   	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:admin');
        $this->middleware(['auth:admin', 'admin.verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.layouts.admin_app');
    }

}
