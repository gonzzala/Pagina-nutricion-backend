<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function create()
    {
        $admins = User::all();
        
        return view('admins.admins', compact('admins'));
    }

    public function store(AdminRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('admins.create')->with('success', 'Administrador creado correctamente.');
    
    }

    public function update(AdminUpdateRequest $request, $id)
    {
        $admin = User::find($id);
        $admin->name = $request->update_name;
        $admin->email = $request->update_email;
        if ($request->filled('update_password')) {
            $admin->password = Hash::make($request->update_password);
        };
        $admin->save();

        return redirect()->route('admins.create')->with('success', 'Administrador de nombre: '. $admin->name .' actualizado exitosamente.');
        
    }

    public function destroy($id)
    {
        $admin = User::find($id);
        $admin->delete();

        return redirect()->route('admins.create')->with('success', 'Administrador de nombre: '. $admin->name .' eliminado exitosamente.');
        
    }
}
