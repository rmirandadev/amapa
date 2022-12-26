<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    const STATUS = [0 => 'Inativo', 1 => 'Ativo'];

    const TYPE = [1 => 'Órgão do Governo', 2 => 'Prefeitura', 3 => 'Portal de Serviço'];
    public function getTypeViewAttribute() { return $this->type ? self::TYPE[$this->type] : null; }

    protected $fillable = ['name','initials','link','status','type','user_id'];

    public function getStatusViewAttribute(): string
    {
        return $this->status == 0 ? "<span class='badge badge-danger'>Inativo</span>" : "<span class='badge badge-success'>Ativo</span>";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
