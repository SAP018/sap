<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {

        //$articles = article::Search($request->title)->orderBy('id','DESC')->paginate(5);
    $customers=Customer::Search($request->dato)->orderBy('id','ASC')->paginate(5);
    if($customers->count('id')<=0){
    flash()->success("no se encontro a:".$request->dato." ".".....")->important();
    }
    return view('admin.customers.index')->with('customers',$customers);
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = new Customer($request->all());
        $customer->save();
        flash()->success("Se ha registrado el usuario:".$customer->name." "."de manera exitosa!")->important();
        return redirect()->route('customer.index');
         //return view('admin.customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('admin.customers.edit')->with('customer',$customer);
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestreturn view('admin.customers.edit')
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //editar actualizar
        $customer=Customer::find($id);
        $customer->fill($request->all());
        $customer->save();
         flash()->overlay("El usuario:"."<strong>".$customer->name."</strong>"." "."Ha sido Editado de Manera Exitosa!");
         return redirect()->route('customer.index');
        // return view('admin.customers.edit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
