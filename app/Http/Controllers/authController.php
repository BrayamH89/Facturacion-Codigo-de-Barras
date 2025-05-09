<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class authController extends Controller
{
    public function index()
    {        
        return view('factura.subir_excel');
    }

    public function vistaresgistrar()
    {       
        return view('auth.registroUsuarios');
    }

    public function registro()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'nombre_completo' => 'required|string|max:150',
            'tipo_documento' => 'required|string|max:20',
            'numero_documento' => 'required|string|max:15|unique:usuarios,numero_documento',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'nombre_completo.required' => 'El nombre es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El formato del correo no es válido.',
            'email.unique' => 'Este correo ya está registrado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'Las contraseñas debe ser de mínimo 8 caracteres.',
            'numero_documento.unique' => 'Este número de documento ya está registrado.',
        ]);

        $usuario = Usuario::create([
            'nombre_completo' => $validated['nombre_completo'],
            'tipo_documento' => $validated['tipo_documento'],
            'numero_documento' => $validated['numero_documento'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        auth()->login($usuario);
        return redirect()->route('factura.subir');
    }
    
    public function editarUsuario($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('auth.actualizarUsuarios', compact('usuario'));
    }

    public function updateUser(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $validated = $request->validate([
            'nombre_completo' => 'required|string|max:150',
            'tipo_documento' => 'required|string|max:20',
            'numero_documento' => 'required|string|max:15|unique:usuarios,numero_documento,'.$id.',id_usuario',
            'email' => 'required|email|unique:usuarios,email,'.$id.',id_usuario',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $updateData = [
            'nombre_completo' => $validated['nombre_completo'],
            'tipo_documento' => $validated['tipo_documento'],
            'numero_documento' => $validated['numero_documento'],
            'email' => $validated['email'],
        ];
        
        // Solo actualizar password si se proporcionó
        if (!empty($validated['password'])) {
            $updateData['password'] = Hash::make($validated['password']);
        }
        
        $usuario->update($updateData);
        
        return redirect()->route('listar.usuarios')->with('success', 'Usuario actualizado correctamente');
    }

    public function eliminarUsuario($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return redirect()->route('listar.usuarios')->with('success', 'Usuario eliminado correctamente');
    }

    public function login(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $usuario = Usuario::where('email', $request->email)->first();

        if (!$usuario) {
            return back()->withErrors(['email' => 'El email no existe'])->withInput();
        }

        if (!Hash::check($request->password, $usuario->password)) {
            return back()->withErrors(['password' => 'Contraseña incorrecta']);
        }

        Auth::login($usuario);
        $request->session()->regenerate();
        return redirect()->route('factura.subir');
    }

    public function traerUsuarios()
    {
        $usuarios = Usuario::all();
        return view('auth.usuarios', compact('usuarios'));
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.usuarios');
    }
}