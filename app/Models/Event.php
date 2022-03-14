<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    const STATUS = [0 => 'Inativo', 1 => 'Ativo'];

    protected $fillable = ['name','slug','text','contact','local','initial_date','initial_hour','final_date','final_hour','status','user_id'];

    public function getStatusViewAttribute(): string
    {
        return $this->status == 0 ? "<i class='fas fa-circle text-danger'></i>" : "<i class='fas fa-circle text-success'></i>";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status','1');
    }
}
