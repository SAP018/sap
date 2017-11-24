<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use laracast\Flash\Flash;
use Illuminate\Http\Redirect;
use App\Http\Requests\userRequest;



class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
          $users=User::Search($request->dato)->orderBy('id','ASC')->paginate(5);
    if($users->count('id')<=0){
    flash()->success("no se encontro a:".$request->dato." ".".....")->important();
    }
    return view('admin.users.index')->with('users',$users);
      
    
         }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(userRequest $request)
    {
        /*
        $user = new User($request->all());
        $user->password=bcrypt($request->password);
        $user->save();
        flash()->success("Se ha registrado el usuario:".$user->name." "."de manera exitosa!")->important();
        return redirect()->route('user.index');
        */
     
       
       $user = new User($request->all());
        $user->password=bcrypt($request->password);

        $user->save();
       flash()->success("Se ha registrado el usuario:".$user->name." "."de manera exitosa!")->important();
       /*
        flash()->overlay("Se ha registrado el usuario:"."<strong>".$user->name."</strong>"."Ha sido creado "."de manera exitosa!",'Importante');
            */
            return redirect()->route('user.index');
         
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
         $user=User::find($id);
        return view('admin.users.edit')->with('user',$user);
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
    
        $user=User::find($id);
        $user -> fill($request->all());
        $user->save();
         flash()->overlay("Se ha Editado el Articulo:"."<strong>".$user->name."</strong>"." "."de manera exitosa!");
        return redirect()->route('user.index');
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       $user=User::find($id);
        $user->delete();
        flash()->overlay("Se ha Eliminado el usuario:"."<strong>".$user->name."</strong>"." "."de Manera Exitosa!");
        return redirect()->route('user.index');
    }
}
