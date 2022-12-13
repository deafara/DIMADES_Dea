<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (Auth::user()->role == '0') {
            return view('/admin/dashboard/index', $this->data);
        } else {
            return view('/pengunjung/tampilanpengunjung');
        }
    }
}
