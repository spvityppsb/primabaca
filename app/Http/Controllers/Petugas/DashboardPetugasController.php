<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardPetugasController extends Controller
{
    public function index()
    {
        return view('petugas.dashboard.dashboard');
    }
}
