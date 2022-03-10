<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;
    const STATUS = [0 => 'Inativo', 1 => 'Ativo'];

    protected $fillable = ['name','icon','link','status','user_id'];

    public function getStatusViewAttribute(): string
    {
        return $this->status == 0 ? "<span class='badge badge-danger'>Inativo</span>" : "<span class='badge badge-success'>Ativo</span>";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
