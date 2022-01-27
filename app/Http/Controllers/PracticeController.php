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
        if (!Gate::allows('moderator', Auth::user())) {
            abort(403);
        }

        $practices = DB::table('practices')
            ->orderBy('domain_id')
            ->orderBy('publication_state_id')
            ->get();

        return view('practiceMod', ['practices' => $practices]);
    }

    /**public function create(){
     *
     * return view('createPractice');
     * }*/

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

    public function editTitle($id)
    {
        $practice = Practice::find($id);
        if (!Auth::User()->can('modify', $practice)) {
            abort(403);
        }
        return view('editPracticeTitle')->with(['practice' => Practice::find($id)]);
    }

    public function saveTitle(Request $request, $id)
    {
        $practice = Practice::find($id);
        $oldTitle = $practice->title;
        $newTitle = $request['title'];
        if (!Auth::User()->can('modify', $practice)) {
            abort(403);
        }
        if (!Practice::all()->where('title', '==', $newTitle)->isEmpty()) {
            return redirect()->back()->withErrors("This title is already used for another practice.");
        }
        if (strlen($newTitle) < 3 || strlen($newTitle) > 40) {
            return redirect()->back()->withErrors("This title dosen't respect the titles requirements.");
        }

        if(!empty($request['reason'])){
            $practice->changelogs()->attach(Auth::user(),array("reason"=>$request['reason'],"previously"=>$oldTitle,"created_at"=>date("Y/m/d")));
        }else{
            $practice->changelogs()->attach(Auth::user(),array("previously"=>$oldTitle,"created_at"=>date("Y/m/d")));
        }
        $practice->title = $newTitle;
        $practice->save();
        return redirect()->action(
            [PracticeController::class, 'show'], ['id' => $practice->id]
        )->with([''=>'','ok' => 'The title has been updated successfully.']);

    }

    /**public function store(Request $request){
     * dd($practice = Practice::find($request->input('practice')));
     * if (Auth::user()->cannot('publishPractice', $practice)) {
     * abort(403);
     * }
     * $practice->publish();
     * return redirect()->back()->with(['ok' => 'The practice has been successfully added.']);
     * }*/


}
