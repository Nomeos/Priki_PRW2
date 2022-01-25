<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OpinionController extends Controller
{
    public function show($id)
    {
        $opinion = Opinion::find($id);
        if ($opinion == null) {
            return redirect()->back()->withErrors(['msg' => 'The opinion doesn\'t exist.']);
        }
        $useropinions = $opinion->comments;

        return view('showOpinion', ['useropinions' => $useropinions, 'opinion' => $opinion]);
    }

    public function store(Request $request, $id)
    {
        $opinion = Opinion::find($id);
        $comment = $request['comment'];
        if(strlen($comment) > 1000) {
            return redirect()->back()->withErrors(['msg' => 'The message exceed 1000 characters !']);
        }elseif(strlen($comment) <= 0 || strlen($comment) == null){
            return redirect()->back()->withErrors(['msg' => 'Please fill the comment section.']);
        }
        $opinion->comments()->attach(Auth::user(),array("comment"=>$request['comment']));
        return redirect()->back()->with(['ok' => 'The comment has been successfully added.']);
    }


}
