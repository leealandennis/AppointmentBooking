<?php

namespace App\Http\Controllers;

use App\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index(Request $request)
    {
        $searchQuery = $request->get('searchQuery') ?? '';
        return Provider::query()->where("uid", "like", "%{$searchQuery}%")->get();
    }

    public function show(String $uid)
    {
        return Provider::query()->where('uid', '=', $uid)->get();
    }

}
