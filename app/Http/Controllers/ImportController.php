<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Config;
use Illuminate\Http\Request;


class ImportController extends Controller
{
    public function index(){
        return 'let me import';
    }

    public function importProduct(){
        return $config = Config::where('user_id', Auth::user()->id)->first();
    }
}
