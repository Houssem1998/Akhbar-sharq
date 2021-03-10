<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Category;
use App\Traits\UploadTrait;
class NotificationsController extends Controller
{
    use UploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [
            'categories'  => Category::all(),
          'notifications'  => Notification::all(),
        ];
        return view('notification.create')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [
            'categories'  => Category::all(),
          'notifications'  => Notification::all(),
        ];
        return view('notification.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
           'title' => 'required',
           'body' => 'required',
       ]);
       $notification = new Notification;
       $notification->title = $request->title;
       $notification->category = $request->category;
       $notification->type = $request->type;
       $notification->body = $request->body;
       $notification->save();
       return redirect()->route('notification.create',app()->getlocale())->with('success','Notification created successfully.');
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
    public function edit($locale,$id)
    {
        //
        $data = [
          'notifications'  => Notification::all(),
          'categories'  => Category::all(),
          'notification'   => Notification::find($id),
        ];
        return view('notification.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locale,$id)
    {
        //
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        $notification = Notification::find($id);
        $notification->title = $request->title;
        $notification->category = $request->category;
        $notification->type = $request->type;
        $notification->body = $request->body;
        return redirect()->route('notification.create',app()->getlocale())->with('success','notification updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale,$id)
    {
        //
        $notification = Notification::find($id);
        $notification->delete();
        return redirect()->route('notification.create',app()->getlocale())->with('success','Notification Deleted successfully.');
    }
}
