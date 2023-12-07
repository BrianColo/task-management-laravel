<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Styde\Html\Facades\Alert;
use Illuminate\Http\Request;
use App\Entities\Project;

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
        $dataProyect = Project::findAll();
        return view('index_proyect', compact('dataProyect'));
    }

    public function create() {

        return view('admin.projects.create', compact('tipo_tiempos', 'transportadoras', 'mensajeros', 'tipoManifiesto', 'ciudades', 'tipoMensajero', 'zonas', 'sucursales', 'couriers', 'clientes', 'departamentos','sucursalesOrigen'));
    }

    public function update (Request $request, $id ) {
        $project = Project::findOrFail($id);
        
        Alert::message("Manifiesto " . $project->id . " actualizado con exito! =>".$project->fechaDespachoActual, 'success');
        return redirect()->route('admin.projects.index');
    }

    public function store(Request $request) {
        $project = new Project;        
        $project->save();

        Alert::message("Proyecto " . $project->id . " registrado con exito! ", 'success');

        return redirect()->route('admin.projects.index', compact('id'));
    }

    public function delete() {
        $project = new Project;
        $project->delete();
        return view('admin.projects.create', compact('tipo_tiempos', 'transportadoras', 'mensajeros', 'tipoManifiesto', 'ciudades', 'tipoMensajero', 'zonas', 'sucursales', 'couriers', 'clientes', 'departamentos','sucursalesOrigen'));
    }
}
