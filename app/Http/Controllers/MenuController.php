<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
//        $menu = \App\Models\Menu::with('child')->where('parent_id', 1)->get()->toArray();
//        $mainMenu = \App\Models\Menu::where('parent_id', null)->first()->toArray();
//        $menu = json_encode($menu, true);
//        $mainMenu = json_encode($mainMenu, true);
        return view('frontend.main-menu');
    }

    public function getMainMenu()
    {
        $child = \App\Models\Menu::with('child')->where('parent_id', 1)->get()->toArray();
        $mainMenu = \App\Models\Menu::where('parent_id', null)->first()->toArray();
        $data['child'] = json_encode($child, true);
        $data['mainMenu'] = json_encode($mainMenu, true);
        return response(json_encode($data));
    }

    public function getChildMenu($id)
    {
        $mainMenu = Menu::find($id);
        $child = Menu::where('parent_id', $id)->get()->toArray();
        $data['main'] = $mainMenu;
        $data['child'] = $child;
        return response(json_encode($data));
    }

    // admin
    public function admin_index()
    {
        return view('backend.menu.index');
    }
}
