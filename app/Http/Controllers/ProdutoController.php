<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProdutoModel;


class ProdutoController extends Controller
{
    private function process_form($request){
		
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = array();
		return view("produto.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = array();
		return view("produto.create");
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
     * @param  \App\Models\ProdutoModel  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array();
		return view("produto.show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProdutoModel  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array();
		return view("produto.edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProdutoModel  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProdutoModel  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
