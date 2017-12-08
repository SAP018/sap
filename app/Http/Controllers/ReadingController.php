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

        
           
       
        if ($request->isMethod('post')) {
           
    //

      
        
        //guardar lecturas
        $reading = new Reading($request->all());
       
       $reading->monto=0;
        $reading->user_id= \Auth::user()->id;
        $reading->period_id=$request->period_id;
        $reading->month=date('m');
        $reading->save();
         }
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
    public function show($id,$periodo)
    {
        //la variable periodo id trae el id del periodo que corresponde la vista
        //Controlador de mostrar
         $reads= Reading::where('customer_id','=',$id)
         ->where('period_id','=',$periodo)
         ->get();
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
               //dd($mes1);
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
        //la bariable factura obtiene el registro correspondiente a dicho id
        //y resta un mes al mes actual
         $distinto = Reading::find($id);
         $periodoanterior=$distinto->period_id-1;
         if($periodoanterior == 0){
            $periodoanterior==1;
         
         
         


                $factura = Reading::find($id);
               $mes=  $factura->month;
               $mes1 =$mes-1;
               $customer =$factura->customer_id;

            //variable usada para capturar el periodo anterior al actual y poder restar el mes de diciembre 

               
              // dd($periodoanterior);}
               
               $periodo=Reading::where('period_id', $periodoanterior)
               ->where('month','=',12)
               ->where('customer_id','=',$customer)
                ->first();
                

              // dd($periodo->medida);
            //  dd($mes1);
               //la variable flight de utiliza para capturar el mes anterior
                $flight = Reading::where('id', $id)->orwhere('month','=',$mes1)
                ->first();

                   //dd($factura->month);
                $metros =$factura->medida - $flight->medida;
               if($metros < 10)
               {
                   $cantidad=100+$factura->recargo; 
                }else{
                $cantidad =($metros*10)+$factura->recargo;
                }
                            
                    

                //la variable metros se utiliza para restar la medida del mes actual con la del mes anterior
            
               //$total =$metros*10;

               // dd($factura->customer->name);
              $pdf = \App::make('dompdf.wrapper');
              $pdf->loadView('admin.readings.pdf.factura',['factura'=> $factura,'flight'=> $flight,'metros' => $metros,'cantidad'=> $cantidad,'periodo' => $periodo]);
            return $pdf->stream();
    }else{
    
         $distinto = Reading::find($id);
         $periodoanterior=$distinto->period_id-1;
         $factura = Reading::find($id);
               $mes=  $factura->month;
               $mes1 =$mes-1;
               $customer =$factura->customer_id;
               


            //variable usada para capturar el periodo anterior al actual y poder restar el mes de diciembre 

               
              // dd($periodoanterior);}
               
               $periodo=Reading::where('period_id', $periodoanterior)
               ->where('month','=',12)
               ->where('customer_id','=',$customer)
                ->first();
                //dd($periodo->medida);
                

              // dd($periodo->medida);
            //  dd($mes1);
               //la variable flight de utiliza para capturar el mes anterior
                $flight = Reading::where('period_id','=',$periodoanterior+1)->where('month','=',$mes1)
                ->first();

               // dd($flight->medida);

             if($factura->month==1){
                         $metros =$factura->medida - $periodo->medida;
                         if($metros < 10){
                               $cantidad=100+$factura->recargo; 
                            }else{
                            $cantidad =($metros*10)+$factura->recargo;
                            }
                    }else{
                           $metros =$factura->medida - $flight->medida;
               if($metros < 10){
           $cantidad=100+$factura->recargo; 
        }else{
        $cantidad =($metros*10)+$factura->recargo;
        }
                    }
                            
                    

                //la variable metros se utiliza para restar la medida del mes actual con la del mes anterior
            
               //$total =$metros*10;

               // dd($factura->customer->name);
              $pdf = \App::make('dompdf.wrapper');
              $pdf->loadView('admin.readings.pdf.factura',['factura'=> $factura,'flight'=> $flight,'metros' => $metros,'cantidad'=> $cantidad,'periodo' => $periodo]);
            return $pdf->stream();
    }
    }

}
