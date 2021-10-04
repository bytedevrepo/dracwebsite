<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuPage;
use App\Models\Post;
use App\Traits\SetResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    use SetResponse;

    public function getMainMenu()
    {
        $data['background'] = \App\Models\Cms::where('key', 'home_background')->first();
        $data['mainMenu'] = MenuPage::where('parent_id', 0)->first()->toArray();
        $data['child'] = MenuPage::with(['page:id,slug','children'])->where('parent_id', $data['mainMenu']['id'])->get()->toArray();
        $returnData = $this->prepareResponse(false, 'success', $data, []);
        return response()->json($returnData, 200);
    }

    public function getChildMenu($id)
    {
        $data['background'] = \App\Models\Cms::where('key', 'home_background')->first();
        $mainMenu = MenuPage::find($id);
        $child = MenuPage::with('page:id,slug')->where('parent_id', $id)->get()->toArray();
        $data['mainMenu'] = $mainMenu;
        $data['child'] = $child;
        $returnData = $this->prepareResponse(false, 'success', $data, []);
        return response()->json($returnData, 200);
    }

    // admin
    public function admin_index()
    {
        $menu_items = [];
        $pages = Post::where('status', 1)->get();
        $menu = Menu::where('is_selected', 1)->first();
        if ($menu){
            $menu_items = MenuPage::where('menu_id',$menu->id)
                ->where('parent_id',0)
                ->with(['menu','children.page','parent','page'])
                ->orderBy('order')
                ->get();
        }

        return view('backend.menu.index', compact('menu', 'menu_items', 'pages'));
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
                }
            }
            $menu = MenuPage::find($data['id']);
            $menu->parent_id = 0;
            $menu->order = $dataCount;
            $menu->save();
            $dataCount++;
        }
        Session::flash('message', 'Menu updated successfully.');
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
        $menu->slug = Str::slug($request->display_name);
        $menu->parent_id = 0;
        $menu->page_id = 0;
        $menu->menu_id = 1;
        $menu->save();
        Session::flash('message', 'Menu added successfully.');
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $this->validate($request,[
            'menu_id' => 'required|integer'
        ]);
        $menu = MenuPage::find($request->menu_id);
        if($menu){
            $child = MenuPage::where('parent_id', $menu->id)->delete();
            $menu->delete();
        }
        Session::flash('message', 'Menu deleted successfully.');
        return redirect()->back();
    }

    public function addPageToMenu(Request $request)
    {
        $this->validate($request,[
            'page_id' => 'required|integer'
        ]);
        $page = Post::findOrFail($request->page_id);
        $menu = new MenuPage();
        $menu->page_id = $page->id;
        $menu->menu_id = 1;
        $menu->order = 0;
        $menu->display_name = $page->title;
        $menu->slug = Str::slug($page->title);
        $menu->image = '';
        $menu->save();
        Session::flash('message', 'Page added successfully.');
        return response()->json('success');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'menu_id' => 'required|integer',
            'display_name' => 'required|string|max:255'
        ]);

        $menu = MenuPage::find($request->menu_id);
        $menu->display_name = $request->display_name;
        $menu->slug = Str::slug($request->display_name);
        $menu->page_id = $request->page_id ? $request->page_id : 0;
        if ($request->hasFile('image')){
            $old_image = $menu->image;
            $path = $request->file('image')->store('menu_images', 'public');
            $menu->image = $path;

            //delete old file
            Storage::disk('public')->delete($old_image);
        }
        $menu->alt_text = $request->alt_text;
        $menu->target = $request->target;
        $menu->custom_css = $request->custom_css;
        $menu->save();
        Session::flash('message', 'Menu updated successfully.');
        return redirect()->back();
    }
}
