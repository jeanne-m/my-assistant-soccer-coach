<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Principle extends Model
{
    /**
     * Focus model data
     *
     * @return array
     */
    public function focus()
    {
        return $this->belongsTo('App\Focus');
    }
}
