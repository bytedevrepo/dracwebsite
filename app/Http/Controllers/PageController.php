<?php

namespace App\Http\Controllers;

use App\Models\MenuPage;
use App\Models\Page;
use App\Traits\SetResponse;
use Illuminate\Http\Request;

class PageController extends Controller
{
    use SetResponse;
    public function getPageBySlug(Request $request, $slug='')
    {
        if($slug !== ''){
            $page = Page::where('slug', $slug)->firstOrFail();
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
