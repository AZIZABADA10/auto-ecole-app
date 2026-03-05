<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use App\Models\Candidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    public function index() {
        $users = User::with('role')->paginate(10);
        return view('users.index', compact('users'));
    }
    public function create() {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role_id' => 'required|exists:roles,id',
            'phone' => 'nullable|string'
        ]);
        
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        
        $role = Role::find($request->role_id);
        if ($role && $role->name === 'candidat') {
            Candidat::create(['user_id' => $user->id]);
        }
        
        return redirect()->route('users.index')->with('success', 'Utilisateur créé');
    }
}
