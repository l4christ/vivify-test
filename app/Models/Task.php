<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'description',
        'status'
    ];

    public function getTitleExcerptAttribute()
    {
        $limit = 30; 
        $title = $this->attributes['title'];

        if (strlen($title) > $limit) {
            return substr($title, 0, $limit) . '...';
        }

        return $title;
    }

    public function getDescriptionExcerptAttribute()
    {
        $limit = 50; 
        $description = $this->attributes['description'];

        if (strlen($description) > $limit) {
            return substr($description, 0, $limit) . '...';
        }

        return $description;
    }
}
