<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WriteWithUs;
use App\Traits\UploadTrait;
use App\Models\Category;
use App\Models\Post;
class WriteWithUsController extends Controller
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
            'posts' => WriteWithUs::all(),
        ];
        return view('writeWithUs.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('front.pages.writeWithUs');
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
        $request->validate([
            'title' => 'required',
            'name' => 'required',
            'category' => 'required',
            'email' => 'required',
            'body' => 'required',
            'image' =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $post = new WriteWithUs;
        if ($request->has('image')) {
            // Get image file
            $image = $request->file('image');
            // Make a image name based on user name and current timestamp
            $name ='image'.time();
            // Define folder path
            $folder = '/uploads/WriteWithUs/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $post->image = $filePath;
        }
        $post->title = $request->title;
        $post->subTitle = $request->subTitle;
        $post->name = $request->name;
        $post->category = $request->category;
        $post->body = $request->body;
        $post->email = $request->email;
        $post->save();
        return redirect()->route('index',app()->getlocale())->with('success','Post Sent successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($locale,$id)
    {
        //
        $data = [
            'post' => WriteWithUs::find($id),
            'categories' => Category::all(),
        ];
        return view('writeWithUs.post')->with($data);
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
            'name' => 'required',
            'category' => 'required',
            'email' => 'required',
            'body' => 'required',
            'image' =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $post = new Post;
        if ($request->has('image')) {
            // Get image file
            $image = $request->file('image');
            // Make a image name based on user name and current timestamp
            $name ='image'.time();
            // Define folder path
            $folder = '/uploads/WriteWithUs/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $post->image = $filePath;
        }
        $post->title = $request->title;
        $post->subTitle = $request->subTitle;
        $post->writerName = $request->name;
        $post->writerImage = $request->writerImage;
        $post->category = $request->category;
        $post->body = $request->body;
        $post->writerEmail = $request->email;
        $post->status = $request->status;
        $post->save();
        return redirect()->route('index',app()->getlocale())->with('success','Post Sent successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale,$id)
    {
        $post = WriteWithUs::find($id);
        $post->delete();
        return redirect()->route('write.index',app()->getlocale())->with('success','Post Deleted successfully.');
        //
    }
}
