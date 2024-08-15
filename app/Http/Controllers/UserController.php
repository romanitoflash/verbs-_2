<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
      
            // Si no tiene acceso, redirigir o lanzar una excepción
            
            $users = User::paginate(10); // Cambia 10 por el número de usuarios por página que desees
            return view('users.index', compact('users'));
       

       
    }
    

    public function create()
    {       
            
        $roles = Role::all();
        return view('users.create', compact('roles'));  

        
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'role' => 'required'
        ]);

        // Encriptar la contraseña antes de crear el usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Encriptar la contraseña
        ]);
        $user->assignRole($request->role);

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Asegúrate de que no te estás eliminando a ti mismo (opcional)
        if (auth()->user()->id === $user->id) {
            return redirect()->route('users.index')->with('error', 'You cannot delete yourself.');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('users.edit', compact('user', 'roles'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Actualizar el rol del usuario
        $user->syncRoles($request->role);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }



}
