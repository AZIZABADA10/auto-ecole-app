<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Candidat;
use App\Models\Formation;
use App\Models\Moniteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index(Request $request)
    {
        $query = User::with('role');

        // Recherche textuelle
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        // Filtre par rôle
        if ($request->filled('role')) {
            $roleName = $request->role;
            $query->whereHas('role', function($q) use ($roleName) {
                $q->where('name', $roleName);
            });
        }

        $users = $query->latest()->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create(Request $request)
    {
        $roles = Role::all();
        $type = $request->query('type', 'candidat');
        return view('users.form', compact('roles', 'type'));
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $isStaff = $request->user_type === 'staff';

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:8',
            'is_active' => 'boolean'
        ];

        if ($isStaff) {
            $rules['role_id'] = 'required|exists:roles,id';
        }

        $validated = $request->validate($rules);

        $validated['password'] = Hash::make($validated['password']);
        $validated['is_active'] = $request->has('is_active') ? $request->is_active : true;

        if (!$isStaff) {
            $role = Role::where('name', 'candidat')->first();
            $validated['role_id'] = $role ? $role->id : null;
        }

        $user = User::create($validated);

        if (!$isStaff) {
            $candidat = Candidat::create(['user_id' => $user->id]);
        } else {
            // Si c'est un moniteur, on crée l'entrée dans la table moniteurs
            if ($user->role && $user->role->name === 'moniteur') {
                Moniteur::create(['user_id' => $user->id]);
            }
        }

        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès.');
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $type = $user->isCandidat() ? 'candidat' : 'staff';
        return view('users.form', compact('user', 'roles', 'type'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
    {
        $isStaff = $request->user_type === 'staff' || !$user->isCandidat();

        $rules = [
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone' => 'required|string|max:20',
            'is_active' => 'boolean'
        ];

        if ($request->filled('password')) {
            $rules['password'] = 'string|min:8';
        }

        if ($isStaff && Auth()->user()->isAdmin()) {
            $rules['role_id'] = 'required|exists:roles,id';
        }

        $validated = $request->validate($rules);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $validated['is_active'] = $request->has('is_active') ? $request->is_active : false;

        $user->update($validated);

        if (!$isStaff && $request->filled('formation_id') && $user->candidat) {
             // Maj formtion si nécessaire
        }

        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()->route('users.index')->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
