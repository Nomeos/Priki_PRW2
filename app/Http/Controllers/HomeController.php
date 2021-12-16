<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $filterValue = 5;
    public function index()
    {
       return view('home',['filterValue' => $this->filterValue]);
    }
}
