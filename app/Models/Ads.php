<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;

    public $fillable = ['name','image','link','status','initial_date','final_date','local_id','plataform_id','user_id'];

    const STATUS = [0 => 'Inativo', 1 => 'Ativo'];
    public function getStatusViewAttribute(): string
    {
        return $this->status == 0 ? "<span class='badge badge-danger'>Inativo</span>" : "<span class='badge badge-success'>Ativo</span>";
    }

    public function getLinkViewAttribute()
    {
        return $this->link != null ? "<a href='$this->link'><span class='badge badge-primary'><i class='fas fa-external-link-alt'></i> Link</span></a>" : "<span class='badge badge-light'><i class='fas fa-external-link-alt'></i> Link</span>";
    }

    public function getExpireViewAttribute()
    {
        if(!isset($this->final_date)) {
            return "<span class='badge badge-warning'>Não Expira</span>";
        }if ($this->final_date >= date('Y-m-d')) {
            return "<span class='badge badge-success'>".date('d/m/Y',strtotime($this->final_date))."</span>";
        }else{
            return "<span class='badge badge-danger'>Expirou</span>";
        }
    }

    public function plataform()
    {
        return $this->belongsTo(Plataform::class);
    }

    public function local()
    {
        return $this->belongsTo(Local::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
