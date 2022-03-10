<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tourism extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','image','text','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
