<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
           // Logic to list users
           $users = User::all();
           return view('admin.users.index', compact('users'));
    }
}
