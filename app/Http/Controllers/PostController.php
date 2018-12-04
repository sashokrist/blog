<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Session;

class PostController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        return view('admin.posts.create')->with('categories', Category::all());
    }

    public function store(Request $request)
    {
       $this->validate($request, [
          'title' => 'required',
          'featured' => 'required|image',
          'content_post' => 'required',
           'category_id' => 'required'
       ]);

       $featured = $request->featured;
       $featured_new_name = time().$featured->getClientOriginalName();
       $featured->move('uploads/posts', $featured_new_name);

       $post = Post::create([
           'title' => $request->title,
           'content_post' => $request->content_post,
           'featured' => 'uploads/posts/'.$featured_new_name,
           'category_id' => $request->category_id
       ]);
       Session::flash('success', 'Post was created');
       
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
