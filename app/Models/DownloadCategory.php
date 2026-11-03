<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadCategory extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function scopePublished($query)
    {
        return $query->wherePublished(1);
    }

    public function downloads()
    {
        return $this->hasMany(Download::class, 'download_categories_id', 'id');
    }

    // Use the slug for route model binding
    public function getRouteKeyName()
    {
        return 'slug';
    }
}




