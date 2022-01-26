<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

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
        return view('showPractice', ['practice' => $practice, 'opinions' => $practice->opinions()->get()]);
    }

    public function indexMod()
    {
        if (! Gate::allows('indexMod', Auth::user())) {
            abort(403);
        }


        $practices = DB::table('practices')
            ->orderBy('domain_id')
            ->orderBy('publication_state_id')
            ->get();

        return view('practiceMod', ['practices' => $practices]);
    }

    /**public function create(){

        return view('createPractice');
    }*/

    public function publish($id)
    {
        $practice = Practice::where('id', '=', $id)->first();
        if ($practice == null) {
            return redirect()->back()->withErrors("Error: Practice not found");
        }
        if (Auth::User()->can('publish', $practice)) {
            $practice->publish();
            return redirect("/");
        }
        return redirect()->back()->withErrors("Error: You can't do that");
    }

    /**public function store(Request $request){
        dd($practice = Practice::find($request->input('practice')));
        if (Auth::user()->cannot('publishPractice', $practice)) {
            abort(403);
        }
        $practice->publish();
        return redirect()->back()->with(['ok' => 'The practice has been successfully added.']);
    }*/


}
