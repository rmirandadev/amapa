<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title','subtitle','slug','publication_date','image','image_legend','image_photographer','text','status','clicks','highlight','finished','category_id','subcategory_id','user_id','topic_id','user_finished_id'];

    const STATUS = [0 => 'Inativa', 1 => 'Ativa'];
    public function getStatusViewAttribute(): string
    {
        return $this->status == 0 ? "<span class='badge badge-danger'>Inativa</span>" : "<span class='badge badge-success'>Ativa</span>";
    }

    const HIGHTLIGHT = [0 => 'Inativo', 1 => 'Ativo'];
    public function getHightlightViewAttribute(): string
    {
        return $this->status == 0 ? "<span class='badge badge-danger'>Inativo</span>" : "<span class='badge badge-success'>Ativo</span>";
    }

    const FINISHED = [0 => 'Notícia aberta', 1 => 'Notícia finalizada'];
    public function getFinishedViewAttribute(): string
    {
        return $this->finished == 0 ? "<span class='badge badge-danger'>Aberta</span>" : "<span class='badge badge-success'>Finalizada</span>";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userfinished()
    {
        return $this->belongsTo(User::class,'user_finished_id','id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function getDateViewAttribute()
    {
        return date('d',strtotime($this->publication_date)) . ' ' . GetMonth(date('m',strtotime($this->publication_date))) . ' ' . date('Y',strtotime($this->publication_date));
    }
}
