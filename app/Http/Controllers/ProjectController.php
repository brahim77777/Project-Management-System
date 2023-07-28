<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Rules\NotInThePast;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Project::class, 'project');
    }
    public function index(){
        $projects = Project::where('user_id' , auth()->id() )->orderBy('dead_line', 'desc')->get();
        return view('projects' , compact('projects'));
    }

    public function show(Project $project){
        return view('project' , compact('project'));
    }
    public function destroy(Project $project){
        $project->delete();
        return redirect('/projects');
    }
    public function create(){
        return view('create');
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'bail|required|unique:projects',
            'description' => 'required',
            'date' => ['bail','required', 'date',new NotInThePast()]
        ]);
;
        $data['title'] = $request->input('title');
        $data['description'] = $request->input('description');
        $data['date'] = $request->input('date');
        $data['user_id'] = auth()->user()->id;



        Project::create($data);
        return redirect('/projects/');
    }

    public function update(Request $request , Project $project){
        $project->update($request->all());
        return back();
    }
}
