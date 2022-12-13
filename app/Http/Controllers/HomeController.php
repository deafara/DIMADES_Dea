<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->data['currentAdminMenu'] = 'dashboard';
        $this->data['currentMenu'] = 'pengunjung';
        $this->data['q'] = null;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == '0') {
            return redirect('/');
        } else {
            return view('/admin/dashboard/index', $this->data);
        }
    }
}
