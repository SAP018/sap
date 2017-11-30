<?php

namespace App\Http\Controllers;

use App\Reading;
use App\Period;
use Illuminate\Http\Request;
use App\Customer;

class ReadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

         $reads=Reading::Search($request->dato)->orderBy('id','DESC')->paginate(5);
    if($reads->count('id')<=0){
    flash()->success("no se encontro a:".$request->dato." ".".....")->important();
    }
    return view('admin.readings.index')->with('reads',$reads);
      

    /*
        $reads= Reading::where('period_id','=',$id)->paginate(4);

     
    return view('admin.readings.index')->with('reads',$reads);
        */ 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers=Customer::orderBy('name','ASC')->pluck('name','id');
        $periods=Period::orderBy('name','ASC')->pluck('name','id');
        return view('admin.readings.create')
        ->with('customers',$customers)
        ->with('periods',$periods);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       //$period = Period::where('year','=',date('Y'))->limit(1)->get();


        
      
        
        //guardar lecturas
        $reading = new Reading($request->all());
       
       $reading->monto=0;
        $reading->user_id= \Auth::user()->id;
        $reading->period_id=$request->period_id;
        $reading->month=date('m');
        $reading->save();
        //dd($reading);
         
          flash()->success("Se ha registrado el usuario:".$reading->customer->name." "."de manera exitosa!")->important();
        return redirect()->route('reading.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reading  $reading
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        //Controlador de mostrar
         $reads= Reading::where('customer_id','=',$id)->get();
          return view('admin.readings.show')->with('reads',$reads);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reading  $reading
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reading  $reading
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reading  $reading
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reading $reading)
    {
        //
    }

    public function pay($id){
       // dd($id);



//$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
//dd($url);

     $reads= Reading::where('customer_id','=',$id)->get();
          
        $read = Reading::find($id);
        $read->estatus=2;

         $factura = Reading::find($id);
               $mes=  $factura->month;
               $mes1 =$mes-1;
            //  dd($mes1);
                $flight = Reading::where('id', $id)->orwhere('month','=',$mes1)
                ->first();
               $metros =$factura->medida - $flight->medida;
               if($metros < 10){
           $read->monto=100; 
        }else{
           $read->monto=$metros*10; 

        
        }








        $read->save();
        //obtener la url del anterior
        redirect()->getUrlGenerator()->previous();
       return redirect(redirect()->getUrlGenerator()->previous());
        //return view('admin.readings.show')->with('reads',$reads);
    }

    public function factura($id)
    {   
        //dd($id);
                $factura = Reading::find($id);
               $mes=  $factura->month;
               $mes1 =$mes-1;
            //  dd($mes1);
                $flight = Reading::where('id', $id)->orwhere('month','=',$mes1)
                ->first();
               $metros =$factura->medida - $flight->medida;
               if($metros < 10){
           $cantidad=100+$factura->recargo; 
        }else{
        $cantidad =($metros*10)+$factura->recargo;
        }
               //$total =$metros*10;

               // dd($factura->customer->name);
              $pdf = \App::make('dompdf.wrapper');
              $pdf->loadView('admin.readings.pdf.factura',['factura'=> $factura,'flight'=> $flight,'metros' => $metros,'cantidad'=> $cantidad]);
            return $pdf->stream();
    }

}
