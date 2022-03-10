<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','ip','os','browsers','device'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
