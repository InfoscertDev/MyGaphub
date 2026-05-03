<?php

namespace App\Models\SevenG;

use Illuminate\Database\Eloquent\Model;

class BespokeKPI extends Model
{
    public  $table = 'bespoke_kpis';

    public function wheel(){
        return $this->hasOne('App\Models\Wheel\BespokeWheel','bespoke_id');
    }
}
