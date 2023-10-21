<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataModel;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    // public function index(){
    //     $datakota = DataModel::all();
    //     return view('output',compact(['datakota']));
    // }

    function index(){
        $datalist = DB::table('datakota')
            ->groupBy('provinsi')
            ->get();
        return view('output')->with('datakota',$datalist);
    }


    function fetch(Request $request){
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('datakota')
            ->where($select,$value)
            ->groupBy($dependent)
            ->get();
        $output = '<option value = "">Select '.ucfirst($dependent).'</option>';
        foreach($data as $row){
            $output .='<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
        }
        echo $output;
    }

}
