<?php

namespace App\Http\Controllers;

use App\Models\DataModel;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function index(){
        $alldata = DB::table('datakota')
            ->get();
        $datakota = DB::table('datakota')
            ->groupBy('provinsi')
            ->get();
        return view('output',compact(['alldata','datakota']));
    }

    public function store(Request $request){
        $data = $request->getContent(); 
        $array = preg_split("/" . preg_quote("|", "/") . "/", $data);
        $array = preg_replace('/_/', ' ', $array);

        if (count($array) === 6) {
            $input =  [
                'kode_wilayah' => $array[0],
                'kode_pos' => $array[1],
                'provinsi' => $array[2],
                'kota' => $array[3],
                'kecamatan' => $array[4],
                'kelurahan' => $array[5],
            ];
            DataModel::create($input);
            $successmsg = "Success terinput!";
            return redirect('/input')->with('success',$successmsg);
        }else{
            $errormsg = "Invalid data format! Cek Lagi Inputan Anda!";
            return redirect('/input')->with('error', $errormsg);
        }
    }
}