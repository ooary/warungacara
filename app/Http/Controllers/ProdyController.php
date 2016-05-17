<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Prody as Prody;

class ProdyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role:admin');
    }
    public function index()
    {
        //
        $prody = Prody::all();
        return view('prody.index',compact('prody'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return View('prody.create');
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
       $this->validate($request,["name"=>"required|min:6|unique:prody"]);   

       Prody::create($request->all());
       
       \Flash::success($request->get('name') . ' Saved ');
       return Redirect('prody');


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
        $prody = Prody::findOrfail($id);

        return view('prody.edit',compact('prody'));
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
        $this->validate($request,["name"=>"required|min:6"]);  
        
        $prody = Prody::findOrfail($id);


        $prody -> update($request->all());
       \Flash::success($request->get('name') . ' update ');
       return Redirect('prody');


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
        $prody = Prody::findOrfail($id);
        $prody ->delete();
       \Flash::success('Delete success ');

        return Redirect('prody');
    }
}
