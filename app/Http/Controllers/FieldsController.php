<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Field;
use App\Models\Notification;
use App\Traits\UploadTrait;
class FieldsController extends Controller
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
          'fields'  => Field::all(),
          'notifications'  => Notification::all(),
        ];
        return view('field.create')->with($data);
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
          'fields'  => Field::all(),
          'notifications'  => Notification::all(),
        ];
        return view('field.create')->with($data);
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
           'image' =>  'image|mimes:jpeg,png,jpg,gif|max:2048',
       ]);
       $field = new Field;
       if ($request->has('image')) {
           // Get image file
           $image = $request->file('image');
           // Make a image name based on user name and current timestamp
           $name = $request->title.'_'.time();
           // Define folder path
           $folder = '/uploads/field/';
           // Make a file path where image will be stored [ folder path + file name + file extension]
           $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
           // Upload image
           $this->uploadOne($image, $folder, 'public', $name);
           // Set user profile image path in database to filePath
           $field->image = $filePath;
       }
       $field->section = $request->section;
       $field->title = $request->title;
       $field->subTitle = $request->subTitle;
       $field->body = $request->body;
       $field->attribute = $request->attribute;
       $field->save();
       return redirect()->route('field.create',app()->getlocale())->with('success','Field created successfully.');
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
          'fields'  => Field::all(),
          'notifications'  => Notification::all(),
          'field'   => Field::find($id),
        ];
        return view('field.edit')->with($data);
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
            'image' =>  'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $field = Field::find($id);
        if ($request->has('image')) {
            // Get image file
            $image = $request->file('image');
            // Make a image name based on user name and current timestamp
            $name = $request->title.'_'.time();
            // Define folder path
            $folder = '/uploads/field/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $field->image = $filePath;
        }
        $field->section = $request->section;
        $field->title = $request->title;
        $field->subTitle = $request->subTitle;
        $field->body = $request->body;
        $field->attribute = $request->attribute;
        $field->save();
        return redirect()->route('field.create',app()->getlocale())->with('success','field updated successfully.');
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
        $field = Field::find($id);
        $field->delete();
        return redirect()->route('field.create',app()->getlocale())->with('success','Field Deleted successfully.');
    }
}
