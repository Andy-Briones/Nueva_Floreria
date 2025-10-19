<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alssupllier extends Model
{
    //
    public function products()
    {
        return $this->hasMany(Alsproduct::class, 'supllier_id');
    }
}
