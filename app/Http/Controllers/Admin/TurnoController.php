<?php

namespace App\Http\Controllers\Admin;

use App\Turno;
use App\Surtidor;
use App\TurnoDetail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TurnoController extends Controller {

    public function index() {
        //
    }

    public function create() {
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        //
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function editarturno( $id ) {
        //
        $turno = Turno::where( 'id', $id )->get();

        return view( 'admin.turnos.edit', compact( 'turno' ) );

    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {
        //
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        //
    }
}
