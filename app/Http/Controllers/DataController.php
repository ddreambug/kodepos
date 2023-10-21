<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DataController extends Controller
{

    public function index(){
        $alldata = DB::table('datakota')
            ->get();
        $datakota = DB::table('datakota')
            ->groupBy('provinsi')
            ->get();
        return view('output',compact(['alldata','datakota']));
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

    public function parseData(Request $request){
        $data = $request->input('data'); 
        $dataComponents = explode('|', $data);

        if (count($dataComponents) === 6) {
            list($kode_wilayah, $kode_pos, $provinsi, $kota, $kecamatan, $kelurahan) = $dataComponents;

            return [
                'kode_wilayah' => $kode_wilayah,
                'kode_pos' => $kode_pos,
                'provinsi' => $provinsi,
                'kota' => $kota,
                'kecamatan' => $kecamatan,
                'kelurahan' => $kelurahan,
            ];
        } else {
            throw new \InvalidArgumentException('Invalid data format');
        }
    }

    //pake laravel eloquent untuk input
    public function store(Request $request){
        try{
            $parsedData = $this->parseData($request);
            // $inputData = new DataModel();
            // $inputData->json_data = $parsedData;
            // $inputData->save();
            
            
            //dd($parsedData);
            DataModel::create($parsedData);
            $successmsg = "Success terinput!";
            return redirect('/input')->with('success',$successmsg);
        }catch (\InvalidArgumentException $e) {
            return redirect('/input')->with('error', $e->getMessage());
        }
    }
    
}
