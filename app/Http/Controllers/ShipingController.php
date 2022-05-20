<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShipingController extends Controller
{
    public function index()
    {
        return view('shiping.shipings',['title' => 'Shiping']);

    }

    public function show()
    {
        return view('shiping.single-shiping',['title' => 'Shiping Details']);

    }

}
