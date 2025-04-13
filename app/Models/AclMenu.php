<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class AclMenu extends Model
{
    protected $fillable = ['title', 'icon', 'route', 'parent_id', 'order', 'permission_id', 'is_active'];

    public function parent()
    {
        return $this->belongsTo(AclMenu::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(AclMenu::class, 'parent_id')->orderBy('order');
    }

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }
}
