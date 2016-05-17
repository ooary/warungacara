<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Event as Event;
use Auth;
use File;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $event = Event::where('user_id',Auth::user()->id)->get();
        return View('event.index',compact('event')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('event.create');
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
        $this->validate($request,['title'=>'required|min:5|unique:events',
                                  'category_lists'=>'required',
                                  'image'=>'mimes:jpg,png,jpeg|max:2000',
                                  'content'=>'required']);
        $data = $request->only('title','content');

        if($request->hasFile('image'))
            :
           $data['image'] = $this->saveImg($request->file('image'));
        endif;

        $event = Event::create($data);
        $event -> slug_title = str_slug($request->get('title'),"-");
        $event -> user_id = Auth::user()->id;
        $event ->save();
        $event->categories()->sync($request->get('category_lists'));
        \Flash::success($request->get('title') . ' akan di posting setelah Verifikasi :) ');

        return Redirect('event');




    }
    public function saveImg(UploadedFile $image){

        $fileName = str_random(40). '.' . $image -> guessClientExtension();
        $path     = public_path() . DIRECTORY_SEPARATOR . 'img';
        $image -> move($path,$fileName);
        return $fileName;

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
        //$event = Event::findOrfail($id);
        $event = Event::where('slug_title',$id)->first();
        //dd($event);

        return View('event.edit',compact('event'));
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
        $this->validate($request,['title'=>'required|min:5|unique:events',
                                  'category_lists'=>'required',
                                  'image'=>'mimes:jpg,png,jpeg|max:2000',
                                  'editor1'=>'required']);
        $event = Event::findOrfail($id);

        $data = $request->only('title');
        if($request->hasFile('image')){

            $data['image']=$this->saveImg($request->file('image'));
            if($event->image !=='') $this->deleteImg($event->image);

        }
        $event = new Event;
        $event -> title = $request->get('title');
        $event -> slug_title = slug_title($request->get('title'),"-");
        $event -> content = $request->get('content');
        $event -> image = $fileName;

        $event->update();

        if(count($request->get('category_lists'))>0)
            :
            $event -> categories()->sync($request->get('category_lists'));
        else
            :
            $event ->categories()->detach();

        endif;

        \Flash::success($request->get('title') . ' Update Success');
        return Redirect('event');

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
        $event = Event::findOrfail($id);
        if($event -> image !=='') $this->deleteImg($event->image);
        $event -> delete();
        \Flash::success('Event Delete Success');
        return Redirect('event');
    }
    public function deleteImg($fileName){

        $path = public_path() . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . $fileName ;
        return File::delete($path);

    }
}
