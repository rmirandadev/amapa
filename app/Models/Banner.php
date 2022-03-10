<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = ['title','subtitle','image','link','status','user_id'];

    const STATUS = [0 => 'Inativo', 1 => 'Ativo'];
    public function getStatusViewAttribute(): string
    {
        return $this->status == 0 ? "<span class='badge badge-danger'>Inativo</span>" : "<span class='badge badge-success'>Ativo</span>";
    }

    public function getLinkViewAttribute(): string
    {
        return $this->link != null ? "<a href='$this->link'><span class='badge badge-primary'><i class='fas fa-external-link-alt'></i> Link</span></a>" : "<span class='badge badge-light'><i class='fas fa-external-link-alt'></i> Link</span>";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
