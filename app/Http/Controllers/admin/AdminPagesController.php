<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

    public function about()
    {
        return view('admin.about');
    }

    public function portfolio()
    {
        return view('admin.portfolio');
    }

    public function clients()
    {
        return view('admin.clients');
    }

    public function pricing()
    {
        return view('admin.pricing');
    }

    public function contact()
    {
        return view('admin.contact');
    }

    public function blog()
    {
        return view('admin.blog');
    }
}