<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acl extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'icon',
        'route',
        'parent_id',
        'order',
        'is_active',
        'permission_name',
    ];

    public function parent()
    {
        return $this->belongsTo(Acl::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Acl::class, 'parent_id');
    }

  
    public function permissions()
    {
        return $this->hasMany(AclAdminAction::class, 'admin_module_id');
    }

    
}
