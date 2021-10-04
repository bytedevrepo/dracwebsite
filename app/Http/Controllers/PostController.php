<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function index()
    {
        $pages = Post::all();
        return view('backend.post.index',compact('pages'));
    }

    public function create()
    {
        $categories = Category::all();
        $edit = '';
        return view('backend.post.create', compact('edit','categories'));
    }

    public function edit($page_id){
        $edit = Post::where('id', $page_id)->with(['category', 'createdBy'])->firstOrFail();
        $categories = Category::all();
        return view('backend.post.create', compact('edit', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'meta_title' => 'nullable|max:255',
            'meta_keyword' => 'nullable|max:255',
            'meta_description' => 'nullable|max:500'
        ]);

        $slug = Str::slug($request->title);
        if($request->slug != '' AND $request->slug != $slug){
            $slug = $request->slug;
        }
        if(isset($request->id) AND $request->id !== ''){
            $page = Post::find($request->id);
        }else{
            $page = new Post();
        }

        if(isset($request->submit) AND $request->submit == 1){
            $published_date = Carbon::now();
            $status = 1;
        }
        else{
            $published_date = null;
            $status = 0;
        }

        $background_image_path = $this->uploadImage($request, $page);
        $background_image_path ? $page->background_image = $background_image_path : '';
        $page->title = $request->title;
        $page->slug = $slug;
        $page->excerpt = $request->excerpt;
        $page->body = $request->body;
        $page->meta_title = $request->meta_title;
        $page->meta_keyword = $request->meta_keyword;
        $page->meta_description = $request->meta_description;
        $page->category_id = $request->category;
        $page->status = $status;
        $page->published_date = $published_date;
        $page->created_by = auth()->user()->id;
        $page->save();

        Session::flash('message', 'Post created / updated successfully.');

        if(isset($request->continue_edit) AND $request->continue_edit == 1){
            return redirect()->route('admin.post.edit', $page->id);
        }else{
            return redirect()->route('admin.post.index');
        }
    }

    /**
     * @param Request $request
     * @param Post $page
     * @return false|string
     */
    public function uploadImage(Request $request, Post $page)
    {
        if ($request->hasFile('image')) {
            if ($page){
                Storage::delete('public/'.$page->background_image);
            }
            return $request->file('image')->store('post_background_images', 'public');
        }
        return null;
    }

    public function delete($id){
        $page = Post::find($id);
        $page->delete();
        return redirect()->back()->with('message', 'post has been deleted!');
    }
}
