<?php

namespace App\Http\Controllers;

use App\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd($date=date('m'));

        $periods=Period::Search($request->dato)->orderBy('id','ASC')->paginate(5);
        return view('admin.periods.index')->with('periods',$periods);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $period = new Period($request->all());
        $period->year=date('Y');
        $period->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function show(Period $period)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $period = Period::find($id);
    return view('admin.periods.edit')->with('period',$period);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $period=Period::find($id);
        $period -> fill($request->all());
        $period->save();
         flash()->overlay("Se ha Editado el Articulo:"."<strong>".$period->name."</strong>"." "."de manera exitosa!");
        return redirect()->route('period.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //dd($id);
          $period=Period::find($id);
        $period->delete();
        flash()->overlay("Se ha Eliminado el periodo:"."<strong>".$period->name."</strong>"." "."de Manera Exitosa!");
        return redirect()->route('period.index');
    }
}
