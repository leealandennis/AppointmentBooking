<?php

namespace App\Http\Controllers;

use App\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    public function index()
    {
        return Clinic::all();
    }
}
