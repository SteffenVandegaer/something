<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\dataTableModel;

class BewerkController extends Controller
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
        $oDataTable=new dataTableModel();
        
        
        $aDataTable=$oDataTable->getAllData("logs");
        
        
        return view('pages.bewerk',array('aDataTable'=>$aDataTable));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit()
    {
        $oDataTable=new dataTableModel();
        if(empty($_POST)){
            $aDataTable=$oDataTable->getAllData("logs");
        }else{
            $aDataTable=$oDataTable->getAllData($_POST['tabel']);
        }
        return view('pages.bewerk',array('aDataTable'=>$aDataTable));
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