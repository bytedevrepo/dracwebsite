<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CmsController extends Controller
{
    public function homePage()
    {
        $background = Cms::where('key', 'home_background')->first();
        return view('backend.cms.home-page', compact('background'));
    }

    public function homePageSave(Request $request)
    {
        $this->validate($request, [
            'image' => 'required'
        ]);

        if (isset($request->key) AND $request->key != ''){
            $cms = Cms::where('key', $request->key)->firstOrNew();
        }else{
            $cms = new Cms();
        }
        $path = $request->file('image')->store('cms', 'public');
        $cms->value = $path;
        $cms->key = $request->key;
        $cms->save();
        Session::flash('message', 'Image set successfully');
        return redirect()->back();

    }
}
