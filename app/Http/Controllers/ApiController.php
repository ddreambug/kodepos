<?php

namespace App\Http\Controllers;

use App\Models\DataModel;
use Illuminate\Http\Request;
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
            $dataComponents = explode('|', $data);
            if (count($dataComponents) === 6) {
                list($kode_wilayah, $kode_pos, $provinsi, $kota, $kecamatan, $kelurahan) = $dataComponents;
    
                $jsonData = [
                    'kode_wilayah' => $kode_wilayah,
                    'kode_pos' => $kode_pos,
                    'provinsi' => $provinsi,
                    'kota' => $kota,
                    'kecamatan' => $kecamatan,
                    'kelurahan' => $kelurahan,
                ];

            DataModel::create($jsonData);
            $successmsg = "Success terinput!";
            return redirect('/input')->with('success',$successmsg);
        }
    }
}