<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public function index()
    {
        $title = 'Role Management';
        return view('pages.role.index', compact('title'));
    }
}
