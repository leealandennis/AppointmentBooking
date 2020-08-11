<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        return Patient::all();
    }

    public function show(String $uid)
    {
        return Patient::query()->where('uid', '=', $uid)->get();
    }
}
