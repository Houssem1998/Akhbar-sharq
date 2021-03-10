<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Writer;
use App\Models\Category;
use App\Traits\UploadTrait;
use Symfony\Component\Console\Input\Input;

class PostsController extends Controller
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
          'posts'  => Post::all(),
          'writers' => Writer::all(),
          'categories' => Category::all(),
        ];
        return view('post.index')->with($data);
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
          'posts'  => Post::all(),
          'categories' => Category::all(),
        ];
        return view('post.create')->with($data);
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
           'writerName' => 'required',
           'category' => 'required',
           'writerEmail' => 'required',
           'body' => 'required',
           'image' =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048',
           'writerImage' =>  'required|image|mimes:jpeg,png,jpg,gif|max:30420',
       ]);
       $post = new Post;
       if ($request->has('image')) {
           // Get image file
           $image = $request->file('image');
           // Make a image name based on user name and current timestamp
           $name ='image'.time();
           // Define folder path
           $folder = '/uploads/post/';
           // Make a file path where image will be stored [ folder path + file name + file extension]
           $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
           // Upload image
           $this->uploadOne($image, $folder, 'public', $name);
           // Set user profile image path in database to filePath
           $post->image = $filePath;
       }
       if ($request->has('writerImage')) {
        // Get image file
        $writerImage = $request->file('writerImage');
        // Make a image name based on user name and current timestamp
        $name ='image'.time();
        // Define folder path
        $folder = '/uploads/post/writerImage/';
        // Make a file path where image will be stored [ folder path + file name + file extension]
        $filePath = $folder . $name. '.' . $writerImage->getClientOriginalExtension();
        // Upload image
        $this->uploadOne($writerImage, $folder, 'public', $name);
        // Set user profile image path in database to filePath
        $post->writerImage = $filePath;
    }

    $writer = Writer::where('writerName', '=', $request->writerName)->first();
    if ($writer === null) {
        $request->validate([
            'writerEmail' => 'required|unique:writers',
            'writerName' => 'required|unique:writers',
        ]);
       $writer = new Writer;
       if ($request->has('writerImage')) {
        // Get image file
        $writerImage = $request->file('writerImage');
        // Make a image name based on user name and current timestamp
        $name ='image'.time();
        // Define folder path
        $folder = '/uploads/writer/writerImage/';
        // Make a file path where image will be stored [ folder path + file name + file extension]
        $filePath = $folder . $name. '.' . $writerImage->getClientOriginalExtension();
        // Upload image
        $this->uploadOne($writerImage, $folder, 'public', $name);
        // Set user profile image path in database to filePath
        $writer->writerImage = $filePath;
        }
        $writer->writerName = $request->writerName;
        $writer->writerEmail = $request->writerEmail;
        $writer->save();
    }
       $post->title = $request->title;
       $post->urgent = $request->urgent;
       $post->subTitle = $request->subTitle;
       $post->writerName = $request->writerName;
       $post->wroted_at = $request->wroted_at;
       $post->category = $request->category;
       $post->body = $request->body;
       $post->status = $request->status;
       $post->writerEmail = $request->writerEmail;
       $post->resource = $request->resource;
       $post->save();
       return redirect()->route('post.index',app()->getlocale())->with('success','Post created successfully.');
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
          'posts'  => Post::all(),
          'categories'  => Category::all(),
          'post'   => Post::find($id),
        ];
        return view('post.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$locale,$id)
    {
        //
        $request->validate([
            'writerEmail' => 'required',
            'title' => 'required',
            'writerName' => 'required',
            'category' => 'required',
            'body' => 'required',
            'image' =>  'image|mimes:jpeg,png,jpg,gif|max:2048',
            'writerImage' =>  'image|mimes:jpeg,png,jpg,gif|max:30420',
        ]);
        $post = Post::find($id);
        if ($request->has('image')) {
            // Get image file
            $image = $request->file('image');
            // Make a image name based on user name and current timestamp
            $name ='image'.time();
            // Define folder path
            $folder = '/uploads/post/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $post->image = $filePath;
        }
        if ($request->has('writerImage')) {
         // Get image file
         $writerImage = $request->file('writerImage');
         // Make a image name based on user name and current timestamp
         $name ='image'.time();
         // Define folder path
         $folder = '/uploads/post/writerImage/';
         // Make a file path where image will be stored [ folder path + file name + file extension]
         $filePath = $folder . $name. '.' . $writerImage->getClientOriginalExtension();
         // Upload image
         $this->uploadOne($writerImage, $folder, 'public', $name);
         // Set user profile image path in database to filePath
         $post->writerImage = $filePath;
     }

        $post->title = $request->title;
        $post->urgent = $request->urgent;
        $post->subTitle = $request->subTitle;
        $post->writerName = $request->writerName;
        $post->wroted_at = $request->wroted_at;
        $post->category = $request->category;
        $post->body = $request->body;
        $post->writerEmail = $request->writerEmail;
        $post->status = $request->status;
        $post->resource = $request->resource;
        $post->save();
        return redirect()->route('post.index',app()->getlocale())->with('success','post updated successfully.');
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
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('post.index',app()->getlocale())->with('success','Post Deleted successfully.');
    }
}
