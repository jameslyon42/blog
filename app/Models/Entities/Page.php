<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\Entities\User');
    }
}
