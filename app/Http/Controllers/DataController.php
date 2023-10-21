<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataModel;

class DataController extends Controller
{
    public function index(){
        $datakota = DataModel::all();
        return view('output',compact(['datakota']));
    }
}
