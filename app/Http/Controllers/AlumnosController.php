<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use DB;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* $alumnos=Alumno::all();//Es el equivalente a select * from alumnos // Consulta Eloquent
        /*dd($alumnos);
        return view('welcome')
        ->with('alumnos',$alumnos);
        return view('alumnos.index')
        ->with('alumnos',$alumnos);*/
        $alumnos=Alumno::paginate(5); //select * from alumnos;  Eloquent
       
        return view('alumnos.index')
        ->with('alumnos',$alumnos);
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $alumnos=new Alumno();
        $alumnos->nombre=$request->nombre;
        $alumnos->direccion=$request->direccion;
        $alumnos->telefono=$request->telefono;
        $alumnos->fec_nac=$request->fec_nac;
        $alumnos->save();

        return redirect()->route('alumnos.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $alumos=Alumno::find($id);
       
       $alumnos->nombre=$request->nombre;
       $alumnos->direccion=$request->direccion;
       $alumnos->telefono=$request->telefono;
       $alumnos->fec_nac=$request->fec_nac;
       $alumnos->save();

       return redirect()->route('alumnos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        dd('si llega');
        /*DB::table('alumnos')->where('id', '=', $id)->delete();

        return redirect()->route('alumnos.index');*/
    }
}
