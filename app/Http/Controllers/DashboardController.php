<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::count();
        $gejala = Gejala::count();
        $penyakit = Penyakit::count();
        $diagnosis = Diagnosis::count();

        return view('dashboard.index', compact('gejala', 'penyakit', 'diagnosis', 'users'));
    }

    public function profile()
    {
        return view('dashboard.profile');
    }
}
