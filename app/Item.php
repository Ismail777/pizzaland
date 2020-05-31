<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed image
 */
class Item extends Model
{
    protected $guarded = [];

    public function path()
    {
        return "/items/{$this->id}";
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    function asDollars() {
        if ($this->price < 0) return "-".asDollars(-$this->price);
        return '$' . number_format($this->price / 100, 2);
    }
}
