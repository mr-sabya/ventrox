<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //
    public function index()
    {
        $title = 'Permissions';
        return view('pages.permission.index', compact('title'));
    }
}
