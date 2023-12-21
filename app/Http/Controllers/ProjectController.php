<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Styde\Html\Facades\Alert;
use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        date_default_timezone_set('America/Bogota');
        Carbon::setLocale('es');
    }

    public function index() {
        $dataProyect = Project::all();
        return view('index_proyect', compact('dataProyect'));
    }

    public function edit($id) {
        $dataProyect = Project::find($id);
        $propCheckEnable = $dataProyect->status_id ? 'checked' : '';
        $propCheckDisable = $propCheckEnable === 'checked' ? '' : 'checked';
        return view('edit_proyect', compact('dataProyect','propCheckEnable','propCheckDisable'));
    }

    public function create() {
        return view('create_proyect');
    }

    public function update (Request $request, $id ) {
        $project = Project::findOrFail($id);

        $project->name = 'textUpdate';
        $project->description = 'DescUpdate';
        $project->status_id = 1;
        $project->date_init = '2023-12-31';

        $project->save();
        
        Alert::message("Proyecto " . $project->id . " actualizado con exito! ", 'success');
        return redirect()->route('index_proyect');
    }

    public function store(Request $request) {
        $project = new Project;        
        $project->save();

        Alert::message("Proyecto " . $project->id . " Registrado con exito! ", 'success');

        return redirect()->route('index_proyect');
    }

    public function delete() {
        $project = new Project;
        $project->delete();

        Alert::message("Proyecto " . $project->id . " Eliminado con exito! ", 'success');

        return redirect()->route('index_proyect');
    }
}
