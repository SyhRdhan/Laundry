<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * @var array<string, string>
     */
    protected $middlewareGroups = [];

    /**
     * @var array<string, string>
     */
    protected $middlewareAliases = [];

    use AuthorizesRequests, ValidatesRequests;
}