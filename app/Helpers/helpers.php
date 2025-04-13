<?php

use Illuminate\Support\Facades\Schema;
use App\Models\FaqCategory;
use App\Http\Controllers\Admin\SlugController;
use App\Models\Acl;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

function getFilter($table, $query, $filter = [])
{
    if (count($filter)) {
        foreach ($filter as $key => $value) {
            if (Schema::hasColumn(app($table)->getTable(), $key)) {
                $query = $query->where($key, 'like', '%' . $filter[$key] . '%');
            }
        }
    }
    return $query;
}

if (!function_exists('dashboard_url')) {
    function dashboard_url()
    {
        $user = auth()->user();
        if ($user->hasRole('Super Admin')) {
            return route('admin.home');
        } elseif ($user->hasRole('Restaurant')) {
            return route('admin.restaurant.dashboard');
        }
        return '#';
    }
}


if (!function_exists("singleStorageImageUpload")) {
    function singleStorageImageUpload()
    {
        return 'uploads/resized_image.jpg';
    }
}
if (!function_exists("getFaqsAllCategory")) {
    function getFaqsAllCategory()
    {
        return FaqCategory::get();
    }
}
if (!function_exists("generateSlug")) {
    function generateSlug($modelName,$request)
    {
        $slugController = new SlugController;
        if (isset($request->table_id) && !empty($request->table_id) && $request->slug_bk != $request->slug) {
            return $slugController->makeNewSlugName($modelName, $request->name, $request->slug);
        }elseif(isset($request->table_id) && !empty($request->table_id) && $request->slug_bk == $request->slug){
           
            return $request->slug_bk;
        }

        return $slugController->makeNewSlugName($modelName, $request->name, $request->slug);
    }
}


if (!function_exists('AclparentByName')) {
    function AclparentByName($title)
    {
        $record = Acl::where('title', $title)->first();
        return $record ? $record->id : null;
    }
}
if (!function_exists('generate_sidebar')) {
    function generate_sidebar()
    {
        $user = auth()->user();

        // Get the first assigned role
        $role = $user->roles->first();
        if (!$role) {
            return '';
        }

        // Get permission names assigned to the role
        $permissionNames = DB::table('role_has_permissions')
            ->join('permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
            ->where('role_has_permissions.role_id', $role->id)
            ->pluck('permissions.name')
            ->toArray();

        // Fetch all active menus with their actions
        $menus = Acl::with('actions')
            ->where('is_active', 1)
            ->orderBy('order')
            ->get();
        $sidebarHtml = '';
        foreach ($menus as $menu) {
            if ($menu->parent_id == null) {
                $permissionName = $menu->first_permission;
                // Get child menus for the current parent
                $childMenus = $menus->where('parent_id', $menu->id);
                // Check if any child menu is accessible
                $hasAccessibleChildren = false;
                foreach ($childMenus as $child) {
                    $childPermission = $child->first_permission;
                    if ($user->hasRole('Super Admin') || in_array($childPermission, $permissionNames)) {
                        $hasAccessibleChildren = true;
                        break;
                    }
                }

                // Determine if parent or any child is accessible
                $canAccess = $user->hasRole('Super Admin') 
                    || in_array($permissionName, $permissionNames) 
                    || $hasAccessibleChildren;

                if ($canAccess) {
                    $hasChildren = $childMenus->isNotEmpty();
                    $parentActive = Request::is($menu->route . '*');
                    $isChildActive = false;

                    foreach ($childMenus as $childMenu) {
                        if (Request::is($childMenu->route . '*')) {
                            $isChildActive = true;
                            break;
                        }
                    }
                    if ($hasChildren) {
                        $collapseActive = $parentActive || $isChildActive;
                        $activeClass = $parentActive ? 'active' : 'collapsed';
                        $isExpanded = $collapseActive ? 'true' : 'false';
                        $showClass = $collapseActive ? 'show' : '';

                        $sidebarHtml .= '<a class="nav-link ' . $activeClass . '" href="#" data-bs-toggle="collapse" data-bs-target="#collapse' . $menu->id . '" aria-expanded="' . $isExpanded . '" aria-controls="collapse' . $menu->id . '">';
                        $sidebarHtml .= '<div class="sb-nav-link-icon"><i class="' . $menu->icon . '"></i></div>';
                        $sidebarHtml .= $menu->title;
                        $sidebarHtml .= '<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>';
                        $sidebarHtml .= '</a>';

                        $sidebarHtml .= '<div class="collapse ' . $showClass . '" id="collapse' . $menu->id . '" data-bs-parent="#sidenavAccordion">';
                        $sidebarHtml .= '<nav class="sb-sidenav-menu-nested nav">';

                        foreach ($childMenus as $childMenu) {
                            $childPermission = $childMenu->first_permission;
                            $canChildAccess = $user->hasRole('Super Admin') || in_array($childPermission, $permissionNames);

                            if ($canChildAccess) {
                                $childActive = Request::is($childMenu->route . '*') ? 'active' : '';
                                $sidebarHtml .= '<a class="nav-link ' . $childActive . '" href="' . url($childMenu->route) . '">';
                                $sidebarHtml .= '<div class="sb-nav-link-icon"><i class="' . $childMenu->icon . '"></i></div>';
                                $sidebarHtml .= $childMenu->title;
                                $sidebarHtml .= '</a>';
                            }
                        }

                        $sidebarHtml .= '</nav>';
                        $sidebarHtml .= '</div>';
                    } else {
                        $activeClass = $parentActive ? 'active' : '';
                        $sidebarHtml .= '<a class="nav-link ' . $activeClass . '" href="' . url($menu->route ?? '') . '">';
                        $sidebarHtml .= '<div class="sb-nav-link-icon"><i class="' . $menu->icon . '"></i></div>';
                        $sidebarHtml .= $menu->title;
                        $sidebarHtml .= '</a>';
                    }
                }
            }
        }

        return $sidebarHtml;
    }
}