<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
         User::create($request->validated());

         return redirect()->route('users.index')->with('success', "Usuário criado com sucesso!");
    }
    
    public function edit(string $id)
    {
        // $user = User::where('id', '=', $id)->first();
        $user = User::where('id', $id)->first();
        $user = User::where('id', $id)->firstOrFail(); //retorna 404 para api
        if (!$user = User::find($id)){
            return redirect()->route('users.index')->with('message', 'Usuário não encontrado.');
        }
        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, string $id)
    {
        if (!$user = User::find($id)){
            return back()->with('message', 'Usuário não encontrado.');
        }

        $data = $request->only('name', 'email');
        
        if ($request->password){
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function show(string $id)
    {
        if (!$user = User::find($id)){
            return back()->with('message', 'Usuário não encontrado.');
        }

        $user = User::where('id', $id)->first();
        return view('admin.users.show', compact('user'));
    }

    public function destroy(string $id)
    {
        if (!$user = User::find($id)){
            return back()->with('message', 'Usuário não encontrado.');
        }

        if(Auth::user()->id === $user->id)
        {
            return back()->with('message', 'Você não pode excluir a si mesmo.');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuário excluído com sucesso!');
    }

}
