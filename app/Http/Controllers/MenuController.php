<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
//        $data['background'] = \App\Models\Cms::where('key', 'home_background')->first();
        $mainMenu = MenuPage::where('parent_id', 0)->first();
        $child = MenuPage::with(['category:id,slug','post:id,slug','children'])
            ->where('parent_id', $mainMenu->id)->orderBy('order', 'asc')->get();
        $returnData = $this->prepareResponse(false, 'success', compact('mainMenu', 'child'), []);
        return response()->json($returnData, 200);
    }

    public function getChildMenu($id)
    {
        $data['background'] = \App\Models\Cms::where('key', 'home_background')->first();
        $mainMenu = MenuPage::find($id);
        $child = MenuPage::with(['category:id,slug', 'post:id,slug'])->where('parent_id', $id)->get()->toArray();
        $data['mainMenu'] = $mainMenu;
        $data['child'] = $child;
        $returnData = $this->prepareResponse(false, 'success', $data, []);
        return response()->json($returnData, 200);
    }

    // admin
    public function admin_index()
    {
        $menu_items = [];
        $categories = Category::all();
        $posts = Post::where('status', 1)->with('category:id,title')
            ->get()->map(function ($query){
                $category_title = (!blank($query->category)) ? Str::limit($query->category->title, 40) : '';
                return [
                    'id' => $query->id,
                    'title' => $query->title,
                    'category' => $category_title,
                    'title_category' => Str::limit($query->title, 40) . ' - ' . $category_title,
                    'slug' => $query->slug,
                ];
            });
        $menu = Menu::where('is_selected', 1)->first();
        if ($menu){
            $menu_items = MenuPage::where('menu_id',$menu->id)
                ->where('parent_id',0)
                ->with(['menu','children.post','parent','post'])
                ->orderBy('order', 'asc')
                ->get();
        }

        return view('backend.menu.index', compact('menu', 'menu_items', 'posts','categories'));
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
        $menu->post_id = null;
        $menu->category_id = null;
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
            'post_id' => 'required|integer'
        ]);
        $post = Post::findOrFail($request->post_id);
        $menu = new MenuPage();
        $menu->post_id = $post->id;
        $menu->category_id = null;
        $menu->menu_id = 1;
        $menu->order = 0;
        $menu->parent_id = 0;
        $menu->display_name = $post->title;
        $menu->slug = Str::slug($post->title);
        $menu->image = '';
        $menu->save();
        Session::flash('message', 'Post added successfully.');
        return response()->json('success');
    }

    public function addCategoryToMenu(Category $category)
    {
        $menu = new MenuPage();
        $menu->category_id = $category->id;
        $menu->post_id = null;
        $menu->menu_id = 1;
        $menu->order = 0;
        $menu->parent_id = 0;
        $menu->display_name = $category->title;
        $menu->slug = $category->slug;
        $menu->image = '';
        $menu->save();

        $posts = $category->posts;
        if ($posts->count()){
            foreach($posts as $key => $post){
                $postMenu = new MenuPage();
                $postMenu->category_id = null;
                $postMenu->post_id = $post->id;
                $postMenu->menu_id = 1;
                $postMenu->order = $key+1;
                $postMenu->parent_id = $menu->id;
                $postMenu->display_name = $post->title;
                $postMenu->slug = $post->slug;
                $postMenu->image = '';
                $postMenu->save();
            }
        }

        Session::flash('message', 'Category added successfully.');
        return redirect()->back();
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
        if ($request->page_id){
            $menu->post_id = $request->page_id;
            $menu->category_id = null;
        }elseif($request->category_id){
            $menu->post_id = null;
            $menu->category_id = $request->category_id;
        }else{
            $menu->post_id = null;
            $menu->category_id = null;
        }

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
