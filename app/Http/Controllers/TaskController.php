<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Styde\Html\Facades\Alert;
use Illuminate\Http\Request;
use App\Entities\Task;

class TaskController extends Controller
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

        return view('admin.tasks.index', compact('tipo_tiempos','tipoManifiesto','clientes','departamentos','campos_descarga','sucursales','couriers'));
    }

    public function create() {

        return view('admin.tasks.create', compact('tipo_tiempos', 'transportadoras', 'mensajeros', 'tipoManifiesto', 'ciudades', 'tipoMensajero', 'zonas', 'sucursales', 'couriers', 'clientes', 'departamentos','sucursalesOrigen'));
    }

    public function update (Request $request, $id ) {
        $task = Task::findOrFail($id);
        
        Alert::message("Tarea " . $task->id . " actualizada con exito! =>".$task->created_at, 'success');
        return redirect()->route('admin.tasks.index');
    }

    public function store(Request $request) {
        $task = new Task;        
        //$task->save();

        Alert::message("Tarea " . $task->id . " registrada con exito! ", 'success');

        return redirect()->route('admin.tasks.index', compact('id'));
    }

    public function delete() {
        $task = new Task;
        //$task->delete();
        return view('admin.tasks.create', compact('tipo_tiempos', 'transportadoras', 'mensajeros', 'tipoManifiesto', 'ciudades', 'tipoMensajero', 'zonas', 'sucursales', 'couriers', 'clientes', 'departamentos','sucursalesOrigen'));
    }
}
