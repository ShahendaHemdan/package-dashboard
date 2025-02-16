<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;


class Admin extends Authenticatable 
{ 

    /** @use HasFactory<\Database\Factories\AdminFactory> */
    use HasRoles;
    use HasFactory, Notifiable;
    protected $table = 'admins';

    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'role_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function uploadImage($image)
    {
        $path = $image->store('images/admins', 'public'); 
        $this->image = $path;
        $this->save();
    }

    public function sendEmailVerification()
    {
        $this->sendEmailVerificationNotification();
    }

    public function role()
    {
        return $this->belongsTo(Role::class); 
    }


}