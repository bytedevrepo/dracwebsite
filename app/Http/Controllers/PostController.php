<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function index()
    {
        $edit = '';
        $pages = Page::all();
        return view('backend.post.index',compact('edit', 'pages'));
    }

    public function create()
    {
        return view('backend.post.create');
    }

    public function edit($page_id){
        $edit = Page::findOrFail($page_id);
        return view('backend.post.create', compact('edit'));
    }

    public function store(Request $request)
    {
//dd($request->all());
        $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'required',
            'body' => 'nullable',
            'meta_title' => 'nullable|max:255',
            'meta_keyboard' => 'nullable|max:255',
            'meta_description' => 'nullable|max:500'
        ]);
        if(isset($request->id) AND $request->id !== ''){
            $page = Page::find($request->id);
        }else{
            $page = new Page();
        }
        if($request->hasFile('image')){
            $path = $request->file('image')->store('page_images', 'public');
            $page->background_image = $path;
        }
        $page->title = $request->title;
        $page->slug = Str::slug($request->title);
        $page->excerpt = $request->excerpt;
        $page->body = $request->body;
        $page->meta_title = $request->meta_title;
        $page->meta_keyword = $request->meta_keyboard;
        $page->meta_description = $request->meta_description;
        $page->status = $request->submit;
        $page->save();

        Session::flash('message', 'Post has been created');
        if(isset($request->submit) AND $request->sumbit == 0){
            return redirect()->back();
        }elseif(isset($request->submit) AND $request->submit == 1){
            return redirect()->route('admin.post.index');
        }


    }


}
