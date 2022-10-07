<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        $this->breadcrumbs = [];
    }

    public function breadcrumb_init(String $title, String $url){
        $this->breadcrumbs = [];

        array_push($this->breadcrumbs,         [
            'title' => $title,
            'url' => $url
        ]);

        return $this->breadcrumbs;
    }

    public function breadcrumb_add(String $title, String $url){
        array_push($this->breadcrumbs,         [
            'title' => $title,
            'url' => $url
        ]);

        return $this->breadcrumbs;
    }
}
