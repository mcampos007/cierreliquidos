<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Turno;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //dd(auth()->user());
        $turno = Turno::where('status',false)->get();
        $turnoscerrados = Turno::where('status',true)->orderBy('id','desc')->paginate(5);
        
        if (count($turno)>0){
            // llamar a edición de turno pendiente

            $nuevo = false;
        }
        else{
            // llamar a nuevo turno
            $nuevo = true;
        }

        return view('home')->with(compact('turno','nuevo','turnoscerrados'));
    }
}
