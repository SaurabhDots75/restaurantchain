<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

     // Define a protected $model property
     protected $model;

     public function __construct()
     {
         // Share $model globally across all views
         view()->share('model', $this->model);
     }
     
}
