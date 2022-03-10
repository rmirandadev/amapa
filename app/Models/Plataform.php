<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plataform extends Model
{
    use HasFactory;

    protected $fillable = ['name','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function locals()
    {
        return $this->hasMany(Local::class);
    }
}
