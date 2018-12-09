<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Session;

class PostController extends Controller
{

    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
    }

    public function create()
    {
        $categories = Category::all();
        if($categories->count() == 0){
            Session::flash('info', 'You must create a category before create a new post');
            return redirect()->back();
        }
        return view('admin.posts.create')->with('categories', $categories)
            ->with('tags', Tag::all());
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
           'category_id' => $request->category_id,
           'slug' => str_slug($request->title),
           'tags' => 'required'
       ]);

       $post->tags()->attach($request->tags);

       Session::flash('success', 'Post was created');
       return redirect()->route('posts');

    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.posts.edit')->with('post', $post)->with('categories', Category::all())
            ->with('tags', Tag::all());
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content_post' => 'required',
            'category_id' => 'required'
        ]);
        $post = Post::find($id);
        if($request->hasFile('featured')){
            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts', $featured_new_name);
            $post->featured = 'uploads/posts/'.$featured_new_name;
        }

        $post->title = $request->title;
        $post->content_post = $request->content_post;
        $post->category_id = $request->category_id;

        $post->save();

        $post->tags()->sync($request->tags);

        Session::flash('success', 'Post was update');
        return redirect()->route('posts');

    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Session::flash('success', 'The post was just trashed.');
        return redirect()->back();
    }

    public function trashed(){
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trash')->with('posts', $posts);
    }

    public  function kill($id){
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();
        Session::flash('success', 'Post was delete');
        return redirect()->back();
    }

    public  function restore($id){
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();
        Session::flash('success', 'Post was restored');
        return redirect()->route('posts');
    }

}
