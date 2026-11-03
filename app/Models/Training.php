<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trainer;

class Training extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function scopePublished($query)
    {
       return $query->wherePublished(1);
    }
  
  
    public function trainers(){
        return $this->hasMany(Trainer::class,'training_id','id');
     }
}
