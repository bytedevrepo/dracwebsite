<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuPage extends Model
{
    use HasFactory;

    public function parent()
    {
        return $this->belongsTo(MenuPage::class, 'parent_id')->orderBy('order', 'asc');
    }

    public function children()
    {
        return $this->hasMany(MenuPage::class, 'parent_id')->orderBy('order', 'asc');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function page()
    {
        return $this->belongsTo(Post::class, 'page_id');
    }
}
