<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utility extends Model
{
    use HasFactory;

    const STATUS = [0 => 'Inativo', 1 => 'Ativo'];

    protected $fillable = ['name','text','link','icon','status','color','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusViewAttribute(): string
    {
        return $this->status == 0 ? "<span class='badge badge-danger'>Inativo</span>" : "<span class='badge badge-success'>Ativo</span>";
    }
}
