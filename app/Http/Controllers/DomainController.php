<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Practice;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function index($id)
    {
        return view('domain',["domain" => Domain::find($id)]);

    }
}
