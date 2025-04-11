<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class SyncPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permissions:sync';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
   
     public function handle()
     {
         $routes = Route::getRoutes();
         $synced = 0;
 
         foreach ($routes as $route) {
             $middlewares = $route->middleware();
 
             // Only sync permissions for routes with 'authadmin' middleware
             if (in_array('authadmin', $middlewares) && $route->getName()) {
                 $name = $route->getName();
 
                 // Convert to desired format
                 $permission = $this->formatPermissionName($name);
 
                 if (!Permission::where('name', $permission)->exists()) {
                     Permission::create(['name' => $permission]);
                     $this->info("Synced permission: {$permission}");
                     $synced++;
                 }
             }
         }
 
         $this->info("Total permissions synced: {$synced}");
     }
 
     protected function formatPermissionName($routeName)
     {
         // Example: admin.users.index → user-list
         $parts = explode('.', $routeName); // ['admin', 'users', 'index']
         if (count($parts) >= 2) {
             $section = $parts[1]; // users
             $action = $parts[2] ?? 'index'; // index
 
             $actionMap = [
                 'index' => 'list',
                 'create' => 'create',
                 'store' => 'create',
                 'edit' => 'edit',
                 'update' => 'edit',
                 'destroy' => 'delete',
                 'show' => 'view',
             ];
 
             $actionFormatted = $actionMap[$action] ?? $action;
 
             return "{$section}-{$actionFormatted}";
         }
 
         return str_replace('.', '-', $routeName); // fallback
     }
    
}
