<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use Illuminate\Http\Request;

class OpinionController extends Controller
{
    public function show($id)
    {
        $opinion = Opinion::find($id);
        if ($opinion == null) {
            return redirect()->back()->withErrors(['msg' => 'The opinion doesn\'t exist.']);
        }
        $useropinions = $opinion->userOpinion;

        return view('showOpinion', ['useropinions' => $useropinions, 'opinion' => $opinion]);
    }
}
