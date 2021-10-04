<?php

namespace App\Http\Controllers;

use App\Models\MenuPage;
use App\Models\Post;
use App\Traits\SetResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PageController extends Controller
{
    use SetResponse;
    public function getPageBySlug(Request $request, $slug='')
    {
        if($slug !== ''){
            $page = Post::where('slug', $slug)->firstOrFail();
            $returnData = $this->prepareResponse(false, 'success', compact('page'), []);
            return response()->json($returnData, 200);
        }
    }

    public function getPageList($menu_slug)
    {
        $menu = MenuPage::where('slug', $menu_slug)->first();
        $siblings = MenuPage::where('parent_id', $menu->id)->with('page')->get();
        $returnData = $this->prepareResponse(false, 'success', compact('menu', 'siblings'), []);
        return response()->json($returnData, 200);
    }

}

