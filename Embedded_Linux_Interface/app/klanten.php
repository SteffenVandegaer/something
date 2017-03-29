<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class klanten extends Model
{
    public function getAllNames(){
        $oKlantnamen = DB::select('select klantnaam from klanten', [1]);
        $aKlantnamen=json_decode(json_encode($oKlantnamen), true);
        return $aKlantnamen;
    }
}