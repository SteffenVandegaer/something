<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ToevoegenModel extends Model
{
    public function getAllCustomerNames(){
        $oKlantnamen = DB::select('select * from klanten', [1]);
        $aKlantnamen=json_decode(json_encode($oKlantnamen), true);
        return $aKlantnamen;
    }
    
    public function getInstallatieData(){
        $oInstallaties = DB::select('select * from Installaties', [1]);
        $aInstallaties=json_decode(json_encode($oKlantnamen), true);
        return $aKlantnamen;
    }
}