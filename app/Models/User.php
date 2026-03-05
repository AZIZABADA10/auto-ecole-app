<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'phone', 'is_active'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected function casts(): array {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function candidat() {
        return $this->hasOne(Candidat::class);
    }

    public function moniteur() {
        return $this->hasOne(Moniteur::class);
    }

    public function isAdmin() {
        return $this->role && $this->role->name === 'admin';
    }

    public function isAssistante() {
        return $this->role && $this->role->name === 'assistante';
    }

    public function isCandidat() {
        return $this->role && $this->role->name === 'candidat';
    }
}
