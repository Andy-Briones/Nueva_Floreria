<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alsproduct extends Model
{
    //
    public function category()
    {
        return $this->belongsTo(alsproduct_category::class, 'alsproduct_category_id');
    }

    public function supllier()
    {
        return $this->belongsTo(alssupllier::class, 'supllier_id');
    }
}
