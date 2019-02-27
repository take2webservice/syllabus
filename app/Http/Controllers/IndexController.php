<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;

class IndexController extends Controller
{
    function index() {
        $schools = School::orderBy('ord', 'ASC')->get();
        return view('index', ['schools' => $schools]);
    }

}
