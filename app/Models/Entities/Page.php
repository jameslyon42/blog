<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = [];

    protected $appends = ['image'];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\Entities\User');
    }

    public function getImageAttribute()
    {
        preg_match_all('/!\[[^\]]*\]\(([^)]*)\)/', $this->markdown, $matches);

        return $matches[1][0] ?? null;
    }
}
