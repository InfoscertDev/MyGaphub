<?php

namespace App\SevenG;

use Illuminate\Database\Eloquent\Model;

class BespokeKPI extends Model
{
    public  $table = 'bespoke_kpis';

    public function wheel(){
        return $this->hasOne('App\Wheel\BespokeWheel','bespoke_id');
    }
}
