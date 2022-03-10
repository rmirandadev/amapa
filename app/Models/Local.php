<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;

    protected $fillable = ['name','width','height','plataform_id','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plataform()
    {
        return $this->belongsTo(Plataform::class);
    }
}
