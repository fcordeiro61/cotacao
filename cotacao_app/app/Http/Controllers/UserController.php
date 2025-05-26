<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role; // Importando o modelo Role
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    // Exibe a lista de usuários
    public function index()
    {
        // Recupera todos os usuários do banco de dados
        Log::info('user index');
        $users = User::all();
        $roles = Role::all(); // Buscando todos os perfis

        // Retorna a view com a lista de usuários
        return view('user.list', compact('users'));
    }

    public function create()
    {
        Log::info('user create');
        $roles = Role::all(); // Buscando todos os perfis
        return view('user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        Log::info('user store');
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role_id' => 'required|exists:roles,id',  // Garantindo que o perfil existe
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
        ]);

        // Atribuindo o perfil ao usuário
        //$user->role_id = $request->role_id; // Atualiza o perfil

        return redirect()->route('user.list')->with('success', 'Usuário criado com sucesso!');
    }

    // Exibe os detalhes de um usuário
    public function edit($id)
    {
        Log::info('user edit');
        // Recupera o usuário pelo ID
        $user = User::findOrFail($id);
        $roles = Role::all(); // Buscando todos os perfis

        // Retorna a view com os detalhes do usuário
        return view('user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        Log::info('user update');

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'role_id' => 'required|exists:roles,id', // Validar o perfil
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // Se a senha foi preenchida, atualize-a
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->role_id = $request->role_id; // Atualiza o perfil
        $user->save();
        return redirect()->route('user.list')->with('success', 'Usuário atualizado!');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.list')->with('success', 'Usuário excluído com sucesso!');
    }

    public function deactivate($id)
    {
        Log::info('user deactivate');
        $user = User::findOrFail($id);
        $user->active = false;
        $user->save();

        return redirect()->route('user.list')->with('success', 'Usuário desativado com sucesso!');
    }

    public function activate($id)
    {
        Log::info('user activate');
        $user = User::findOrFail($id);
        $user->active = true;
        $user->save();

        return redirect()->route('user.list')->with('success', 'Usuário reativado com sucesso!');
    }
}
