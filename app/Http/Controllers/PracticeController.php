<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class PracticeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function show($id)
    {
        $practice = Practice::find($id);
        if ($practice == null) {
            return redirect()->back()->withErrors(['msg' => 'The practice doesn\'t exist.']);
        }

        return view('showPractice', ['practice' => $practice,'opinions' => $practice->opinions()->get()]);
    }
}
