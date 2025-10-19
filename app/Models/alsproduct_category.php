<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alsproduct_category extends Model
{
    //
    public function products()
    {
        return $this->hasMany(Alsproduct::class, 'alsproduct_category_id');
    }
}
