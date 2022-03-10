<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    const STATUS = [ 0 => 'Inativo', 1 => 'Ativo'];

    protected $fillable = ['name', 'email', 'password','status','user_id'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = ['email_verified_at' => 'datetime'];

    public function monitor()
    {
        return $this->hasMany(Monitor::class);
    }

    public function getStatusViewAttribute(): string
    {
        return $this->status == 0 ? "<span class='badge badge-danger'>Inativo</span>" : "<span class='badge badge-success'>Ativo</span>";
    }

    public function banners()
    {
        return $this->hasMany(Banner::class);
    }

    public function tourisms()
    {
        return $this->hasMany(Tourism::class);
    }

    public function programs()
    {
        return $this->hasMany(Program::class);
    }

    public function structures()
    {
        return $this->hasMany(Structure::class);
    }

    public function socials()
    {
        return $this->hasMany(Social::class);
    }

    public function utilities()
    {
        return $this->hasMany(Utility::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
