<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuPage;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        return view('frontend.main-menu');
    }

    public function getMainMenu()
    {
        $mainMenu = MenuPage::where('parent_id', 0)->first()->toArray();
        $child = MenuPage::with('children')->where('parent_id', $mainMenu['id'])->get()->toArray();
        $data['child'] = json_encode($child, true);
        $data['mainMenu'] = json_encode($mainMenu, true);
        return response(json_encode($data));
    }

    public function getChildMenu($id)
    {
        $mainMenu = MenuPage::find($id);
        $child = MenuPage::with('page:id,slug')->where('parent_id', $id)->get()->toArray();
        $data['main'] = $mainMenu;
        $data['child'] = $child;
        return response(json_encode($data));
    }

    // admin
    public function admin_index()
    {
        $menu = Menu::where('is_selected', 1)->first();
        if ($menu){
            $menu_items = MenuPage::where('menu_id',$menu->id)
                ->where('parent_id',0)
                ->with(['menu','children.page','parent','page'])
                ->orderBy('order')
                ->get();
        }

        return view('backend.menu.index', compact('menu', 'menu_items'));
    }

    public function saveMenuOrder(Request $request)
    {
        $input = $request->data;
        $dataCount = 1;
        $childCount = 1;
        $subchildCount = 1;
        foreach ($input as $data) {
            if(isset($data['children'])){
                foreach($data['children'] as $child){
                    if(isset($child['children'])){
                        foreach ($child['children'] as $subchild) {
                            $menusub = MenuPage::find($subchild['id']);
                            $menusub->parent_id = $child['id'];
                            $menusub->order = $subchildCount;
                            $menusub->save();
                            $subchildCount++;
                        }
                    }
                    $menuch = MenuPage::find($child['id']);
                    $menuch->parent_id = $data['id'];
                    $menuch->order = $childCount;
                    $menuch->save();
                    $childCount++;
                    // dd('child'.$child['id']);
                }
            }
            $menu = MenuPage::find($data['id']);
            $menu->parent_id = 0;
            $menu->order = $dataCount;
            $menu->save();
            $dataCount++;

        }
        $flashMessage = [
            'heading'=>'success',
            'type'=>'success',
            'message'=>'Menu order saved successfully.'
        ];
        \Session::flash('flash_message', $flashMessage);

        return 'true';
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'display_name' => 'required',
        ]);
        $menu = new MenuPage();
        if ($request->hasFile('image')){
            $path = $request->file('image')->store('menu_images', 'public');
            $menu->image = $path;
        }
        $menu->display_name = $request->display_name;
        $menu->parent_id = 0;
        $menu->page_id = 0;
        $menu->menu_id = 1;
        $menu->save();

        return redirect()->back();

    }
}
