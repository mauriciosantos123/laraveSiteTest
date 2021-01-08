<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;


class ContactController extends Controller
{
    private function process_form(Request $request){
	$data['name']= $request->name; 
	$data['phone']=$request->phone;
	$data['msg']=$request->msg;

	return $data;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listContact = Contact::get();
	$data['listContact']=$listContact;


	return view("contact.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = array();

	
		return view("contact.create",$data);
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
	Contact::create($this->process_form($request));
	$request->session->flash('alert','Cadastrado Com sucesso' );
	return redirect()->to('contact');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactModel  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $contat = Contact::findOrFail($id);
	$data['contat']=$contat;
	 
		return view("contact.edit",$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactModel  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array();
	$data['id']= $id;
	

    $data['contat']=$contat;
	$contat = Contact::findOrFail($id);
    

        return view("contact.edit",$data);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\ContactModel  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
	$contat->update($this->process_form($request));

	$request->session()->flash('alert','Editado com Sucesso');
	return redirect()->to(contact);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactModel  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
	Contact::where("id",$id)->delete();
	$request->session()->flash('alert','apagado com Sucesso ');
	return redirect()->to('contact');
    }
}
