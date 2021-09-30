<?php

namespace App\Http\Controllers;

use App\Models\MenuPage;
use App\Models\Page;
use App\Traits\SetResponse;
use Illuminate\Http\Request;

class PageController extends Controller
{
    use SetResponse;
    public function getPageBySlug(Request $request,$slug='')
    {
        if($slug !== ''){
//            $menu_id = $request->menu;
//            $menu = [];
//            if ($menu_id){
//                $selected_menu = MenuPage::where('id', $menu_id)->first();
//                $menu = MenuPage::where('id', $selected_menu->parent_id)->with('children')->first();
//            }
            $page = Page::where('slug', $slug)->firstOrFail();

            $returnData = $this->prepareResponse(false, 'success', compact('page'), []);
            return response()->json($returnData, 200);
        }
    }
}
