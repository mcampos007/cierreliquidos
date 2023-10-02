<?php

namespace App\Http\Controllers\Admin;

use App\Surtidor;
use App\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SurtidorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $surtidors = Surtidor::paginate(10);
        return view('admin.surtidors.index')->with(compact('surtidors'));
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
        $surtidor = Surtidor::findOrFail($id);
        $products = Product::all();
        return view('admin.surtidors.edit')->with(compact('surtidor','products'));
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
        $surtidor = Surtidor::findOrFail($id);
        $surtidor->name = $request->input('name');
        $surtidor->product_id = $request->input('producto');
        $surtidor->lectura_actual = $request->input('lectura_actual');
        $surtidor->save();
        return redirect('/admin/surtidors');
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
