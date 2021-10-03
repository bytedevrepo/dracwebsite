<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $data=Category::all();
        $edit=[];
        return view('backend.category.index',['category'=>$data, 'edit'=>$edit]);

    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        if (isset($request->category_id) && $request->category_id != '' )
        {
            $category = Category::find($request->category_id);
        }

        else
        {
            $category = new Category();
        }
        $category->title = $request->title;
        $category->slug = Str::slug($request->title, '-');
        $category->save();
        Session::flash('message', 'Category added successfully.');
        return redirect()->back();
    }

    public function delete($category_id)
    {
        $category = Category::findOrFail($category_id);
        $category->delete();

        return redirect()->back()
        ->with('message', 'Category has been deleted!');
    }

    public function edit($category_id)
    {
        $category=Category::all();
        $edit = Category::find($category_id);

        return view('backend.category.index', compact('edit','category'));

    }

}
