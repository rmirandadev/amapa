<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = ['name','call','slug','image','text','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
