<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['Empleados']=Empleados::paginate(5);
        return view('Empleados.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'Nombres'=> 'required|string|max:100',
            'Apellidos'=> 'required|string|max:100',
            'Identificacion'=> 'required|string|max:100',
            'Direccion'=> 'required|string|max:100',
            'Telefono'=> 'required|string|max:100',
            'Ciudad_de_nacimiento'=> 'required|string|max:100',
        ];
        
        $mensaje=[
            'required'=>':attribute es requerido'
        ];

        $this->validate($request, $campos,$mensaje);

        //$datosEmpleados = $request->all();
        $datosEmpleados = $request->except('_token');
        Empleados::insert($datosEmpleados);
        //return response()->json($datosEmpleados);
        return redirect('Empleados')->with('Notification','Se creo exitosamente el empleado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Empleados=Empleados::findOrFail($id);
        return view('Empleados.edit', compact('Empleados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosEmpleados = $request->except(['_token','_method']);
        Empleados::where('id','=',$id)->update($datosEmpleados);

        $Empleados=Empleados::findOrFail($id);
        //return view('Empleados.edit', compact('Empleados'));
        return redirect('Empleados')->with('Notification','Se modifico exitosamente los datos el empleado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Empleados::destroy($id);
        return redirect('Empleados')->with('Notification','Se borro exitosamente el empleado');
    }
}
