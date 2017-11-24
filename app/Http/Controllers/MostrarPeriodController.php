<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reading;
use App\Period;
use DB;

use App\Customer;

class MostrarPeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
        /*
            $reads=Reading::Search($request->dato)->orderBy('id','DESC')->paginate(5);
    if($reads->count('id')<=0){
    flash()->success("no se encontro a:".$request->dato." ".".....")->important();
    }
    return view('admin.readings.index')->with('reads',$reads);
      
*/
    
    /*
        $reads= Reading::where('period_id','=',$id)
        ->where('month','=',$request->mes)
        ->paginate(9);
        */


$customers = DB::table('customers')
            ->join('readings', 'customers.id', '=', 'readings.customer_id')
            ->join('periods', 'readings.period_id', '=', 'periods.id')
            ->select('customers.id as ids','customers.name as names','periods.name as periodos')
            ->where('period_id','=',$id)
            ->where('customers.name','LIKE','%'.$request->mes.'%')
            // return $query->where('name','LIKE','%'.$dato.'%')
            ->distinct()->get();
            //dd($customers);

     
    return view('admin.readings.index')->with('customers',$customers);
        
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
