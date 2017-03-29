<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\klanten;

class ToevoegenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * 
     * @return pages.voegtoe #no_comment
     */
    public function show()
    {
        $oKlanten = new klanten();
        $aKlantnamen=$oKlanten->getAllNames();
        if(empty($_POST)){
            $sSoortFormulier="installatie";
        }else{
            $sSoortFormulier=$_POST['formulier'];
        }
        $aDataForView=array(
            'klanten'=>$aKlantnamen,
            'soortFormulier'=>$sSoortFormulier
        );
        return view('pages.voegtoe',array('aDataForView'=>$aDataForView));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}