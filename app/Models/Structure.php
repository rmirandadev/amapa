<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','initials','image','text','user_id','remove'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
