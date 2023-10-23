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
        $array = preg_split("/" . preg_quote("|", "/") . "/", $data);
        $array = preg_replace('/_/', ' ', $array);


        if (count($array) === 6) {
            return [
                'kode_wilayah' => $array[0],
                'kode_pos' => $array[1],
                'provinsi' => $array[2],
                'kota' => $array[3],
                'kecamatan' => $array[4],
                'kelurahan' => $array[5],
            ];
        } else {
            throw new \InvalidArgumentException('Invalid data format! Cek Lagi Inputan Anda!');
        }
    }

    //pake laravel eloquent untuk input
    public function store(Request $request){
        try{
            $parsedData = $this->parseData($request);
            DataModel::create($parsedData);
            $successmsg = "Success terinput!";
            return redirect('/input')->with('success',$successmsg);
        }catch (\InvalidArgumentException $e) {
            return redirect('/input')->with('error', $e->getMessage());
        }
    }
    
}
