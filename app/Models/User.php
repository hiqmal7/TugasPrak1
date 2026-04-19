<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use function Pest\Laravel\get;

#[Fillable(['username', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    use Notifiable;
 
    protected $primaryKey = 'npm';
    public $incrementing  = false;  // npm bukan auto-increment
    protected $keyType    = 'int';
 
    protected $fillable = [
        'npm', 'username', 'first_name', 'last_name',
        'email', 'email_verified_at', 'password',
    ];
 
    protected $hidden = ['password'];
 
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
 
    // Satu user bisa punya banyak pinjaman
    public function loans()
    {
        return $this->hasMany(loans::class, 'user_npm', 'npm');
    }
}