<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AclAdminAction extends Model
{
    use HasFactory;


    protected $fillable = [
        'admin_module_id',
        'name',
        'function_name',
    ];

    
    public function acl()
{
    return $this->belongsTo(Acl::class, 'admin_module_id');
}
}
