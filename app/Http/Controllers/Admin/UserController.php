<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
           // Logic to list users
           $users = User::paginate(15);
           return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        // Logic to show the form for creating a new user
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {
         User::create($request->all());

         return redirect()->route('users.index')->with('success', "Usuário criado com sucesso!");
    }
}
