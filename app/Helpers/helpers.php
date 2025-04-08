<?php

use Illuminate\Support\Facades\Schema;
use App\Models\FaqCategory;
use App\Http\Controllers\Admin\SlugController;
use App\Models\Acl;
use Illuminate\Console\View\Components\Alert;
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
        $menus = Acl::where('is_active', 1)
            ->orderBy('order')
            ->get();

        $sidebarHtml = '';

        foreach ($menus as $menu) {
            if ($menu->parent_id == null) {
                $canAccess = auth()->user()->can($menu->permission_name);

                if ($canAccess) {
                    $childMenus = $menus->where('parent_id', $menu->id);
                    $hasChildren = $childMenus->isNotEmpty();

                    // Determine if the parent route is active by itself.
                    $parentActive = Request::is($menu->route . '*');

                    // Check if any child route is active.
                    $isChildActive = false;
                    foreach ($childMenus as $childMenu) {
                        if (Request::is($childMenu->route . '*')) {
                            $isChildActive = true;
                            break;
                        }
                    }

                    // For parent with children, we use collapse control:
                    if ($hasChildren) {
                        // Expand the collapse if either the parent or any child is active.
                        $collapseActive = $parentActive || $isChildActive;

                        // The parent's link gets 'active' only if its own route matches,
                        // otherwise it remains 'collapsed'
                        $activeClass = $parentActive ? 'active' : 'collapsed';
                        $isExpanded = $collapseActive ? 'true' : 'false';
                        $showClass    = $collapseActive ? 'show' : '';

                        $sidebarHtml .= '<a class="nav-link ' . $activeClass . '" href="#" data-bs-toggle="collapse" data-bs-target="#collapse' . $menu->id . '" aria-expanded="' . $isExpanded . '" aria-controls="collapse' . $menu->id . '">';
                        $sidebarHtml .= '<div class="sb-nav-link-icon"><i class="' . $menu->icon . '"></i></div>';
                        $sidebarHtml .= $menu->title;
                        $sidebarHtml .= '<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>';
                        $sidebarHtml .= '</a>';

                        $sidebarHtml .= '<div class="collapse ' . $showClass . '" id="collapse' . $menu->id . '" data-bs-parent="#sidenavAccordion">';
                        $sidebarHtml .= '<nav class="sb-sidenav-menu-nested nav">';

                        foreach ($childMenus as $childMenu) {
                            $canChildAccess = auth()->user()->can($childMenu->permission_name);
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
                        // For single-level menu items, apply active if parent route is active.
                        $activeClass = $parentActive ? 'active' : '';
                        $sidebarHtml .= '<a class="nav-link ' . $activeClass . '" href="' . url($menu->route) . '">';
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
