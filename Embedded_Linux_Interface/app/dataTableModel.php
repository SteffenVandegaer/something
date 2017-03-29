<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class dataTableModel extends Model
{
    public function getAllData($sTableName){
        switch ($sTableName) {
            case "logs":
                $oData = DB::select('SELECT logs.Log_ID, logs.Container_ID, klanten.Klantnaam, logs.Meting '
                                    .'FROM '.$sTableName. 
                                    ' JOIN containers ON logs.Container_ID=containers.Container_ID'
                        .           ' JOIN containersperinstallaties ON containersperinstallaties.Container_ID=containers.Container_ID'
                        .           ' JOIN installaties ON containersperinstallaties.Installatie_ID=installaties.Installatie_ID'
                        .           ' JOIN klanten ON klanten.Klant_ID=installaties.Klant_ID', [1]);
                
                $aData=json_decode(json_encode($oData), true);
                foreach($aData as $iId=>$aRij){
                    $oHoeveelheid= DB::select('SELECT Volume FROM containers WHERE Container_ID='.$aData[$iId]['Container_ID'], [1]);
                    $aHoeveelheid=json_decode(json_encode($oHoeveelheid), true);
                    $aData[$iId]['Meting']=$aData[$iId]['Meting']/$aHoeveelheid[0]['Volume']*100;
                    $aData[$iId]['Meting']=$aData[$iId]['Meting'].'%';
                }
                
                break;
            case "installaties":
                
                $oData = DB::select(' SELECT installaties.Installatie_ID, klanten.Klantnaam, verantwoordelijken.Naam, installaties.Van, installaties.Tot'
                        .           ' FROM installaties'
                        .           ' JOIN verantwoordelijken ON installaties.Verantwoordelijk_ID=verantwoordelijken.Verantwoordelijke_ID'
                        .           ' JOIN klanten ON installaties.Klant_ID=klanten.Klant_ID', [1]);
                $aData=json_decode(json_encode($oData), true);
                break;
            case "klanten":
                $oData = DB::select('select * from '.$sTableName, [1]);
                $aData=json_decode(json_encode($oData), true);
                break;
            case "containers":
                $oData = DB::select('select * from '.$sTableName, [1]);
                $aData=json_decode(json_encode($oData), true);
                break;
            case "verantwoordelijken":
                $oData = DB::select('select * from '.$sTableName, [1]);
                $aData=json_decode(json_encode($oData), true);
                break;
            case "modules":
                $oData = DB::select('select * from '.$sTableName, [1]);
                $aData=json_decode(json_encode($oData), true);
                break;
        }
        
        
        return $aData;
    }
}