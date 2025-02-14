<?php

namespace App\Http\Controllers;

use App\Models\Cargos;
use App\Models\Empleados;
use Illuminate\Http\Request;


class CargosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['Cargos']=Cargos::paginate(5);
        return view('Cargos.index',$datos);  
        
       //$Cargos = Cargos::with('Empleados')->get();

       $Cargos = Cargos::all();
       return view('Cargos.index', compact('Cargos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Empleados = Empleados::all();
        $Cargos = new Cargos();
        return view('Cargos.create', compact('Cargos', 'Empleados'));
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
            'Empleados_id' => 'required|exists:Empleados,id',            
            'Area'=>'required|string|max:100',
            'Cargos'=>'required|string|max:100',
            'Roles' => 'required|in:Colaborador,Jefe',
            'Jefe'=>'required|string|max:100',
            'presidente'=>'required|boolean',
        ];
        $mensaje=[
            'Empleados_id.required' => 'El empleado es requerido',
            'required'=>':attribute es requerido',
            'Area.required'=>'El :attribute es requerida',  
            'Cargos.required'=>'Los :attribute son requeridos',
            'Roles.in' => 'El rol debe ser "Colaborador" o "Jefe"',
            'Jefe.required'=>'El :attribute es requerido',
            'presidente.boolean' => 'El campo presidente debe ser "Sí" o "No"',        
        ];

        $this->validate($request, $campos,$mensaje);

        if ($request->presidente == true) {
            $presidenteExistente = Cargos::where('presidente', true)->exists();
            if ($presidenteExistente) {
                return back()->withErrors(['presidente' => 'Ya existe un presidente en la tabla.']);
            }
        }
        
        $datosCargos = $request->except('_token');
        Cargos::insert($datosCargos);
        //return response()->json($datosCargos);
        return redirect('Cargos')->with('Notification','Cargo creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cargos  $cargos
     * @return \Illuminate\Http\Response
     */
    public function show(Cargos $cargos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cargos  $cargos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Cargos=Cargos::FindOrFail($id);
        $Empleados = Empleados::all();
        return view('Cargos.edit', compact('Cargos', 'Empleados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cargos  $cargos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Empleados_id' => 'required|exists:Empleados,id',  
            'Area'=>'required|string|max:100',
            'Cargos'=>'required|string|max:100',
            'Roles' => 'required|in:Colaborador,Jefe',
            'Jefe'=>'required|string|max:100',
            'presidente' => 'required|boolean',
        ];
        $mensaje=[
            'required'=>':attribute es requerido',
            'Empleados_id' => 'required|exists:Empleados,id',  
            'Area.required'=>'El :attribute es requerida',  
            'Cargos.required'=>'Los :attribute son requeridos',
            'Roles.in' => 'El rol debe ser "Colaborador" o "Jefe"',
            'Jefe.required'=>'El :attribute es requerido', 
            'presidente.boolean' => 'El campo presidente debe ser "Sí" o "No"',        
        ];

        $this->validate($request, $campos,$mensaje);

        if ($request->presidente == true) {
            $presidenteExistente = Cargos::where('presidente', true)->where('id', '!=', $id)->exists();
            if ($presidenteExistente) {
                return back()->withErrors(['presidente' => 'Ya existe un presidente en la tabla.']);
            }
        }
    

        $request->validate([
            'Empleados_id' => 'required|exists:Empleados,id',
        ]);
        
        Cargos::where('id', $id)->update($request->except(['_token', '_method']));
        $Cargos = Cargos::findOrFail($id);
        $Empleados = Empleados::all();
        //return view('Cargos.edit', compact('Cargos', 'Empleados'));

        return redirect('Cargos')->with('Notification','Cargo editado con exito');
        
        //$datosCargos = $request->except(['_token','_method']);
        //Cargos::where('id','=','$id')->update($datosCargos);
        
        //$Cargos=Cargos::FindOrFail($id);        
        //return view('Cargos.edit', compact('Cargos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cargos  $cargos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cargos::destroy($id);
        return redirect('Cargos')->with('Notification','Cargo borrado con exito');
        
    }
}
