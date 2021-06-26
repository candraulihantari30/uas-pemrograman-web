<?php

namespace App\Http\Controllers;

use App\models\pendidikan;
use App\models\tpekerjaan;
use App\models\status_kk;
use App\models\nam_tem;
use App\models\tem_bag;
use App\models\keterangan;
use App\models\jk;
use App\models\Keluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $keluarga=Keluarga::
        join('tpekerjaans', 'keluargas.pekerjaan', '=', 'tpekerjaans.id_peker')->
        join('pendidikans', 'keluargas.pendidikan', '=', 'pendidikans.id_pen')->
        join('nam_tems',    'keluargas.nam_tem', '=', 'nam_tems.id_nam')->
        join('tem_bags',    'keluargas.tem_bag', '=', 'tem_bags.id_tem')->
        join('status_kks',  'keluargas.status_kk', '=', 'status_kks.id_sta')->
        join('keterangans', 'keluargas.keterangan', '=', 'keterangans.id_keter')->
        join('jks', 'keluargas.id_jk', '=', 'jks.id_jkel') 
        ->paginate(5);
        $title="Data Keluarga";
        return view ('admin.keluarga.berandakeluarga',compact('title', 'keluarga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $status_kk     = status_kk  ::all();
        $tpekerjaan    = tpekerjaan ::all();
        $tem_bag       = tem_bag    ::all();
        $nam_tem       = nam_tem    ::all();
        $keterangan    = keterangan ::all();
        $pendidikan    = pendidikan ::all();
        $jk    =jk::all();
        $title = "Tambah Data Keluarga";
        return view('admin.keluarga.inputkeluarga', 
        compact ('title', 'jk', 'pendidikan', 'keterangan', 'nam_tem', 'tem_bag', 'tpekerjaan', 'status_kk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message=[
            'required'=> 'Kolom : attribute Harus lengkap',
            'date'    => 'Kolom : attribute Haraus Tanggal',
            'numeric' => 'Kolom : attribute Harus Angka',
        ];
        $validasi=$request->validate([
            'nama'         => 'required|max:255',
            'nik'          => 'required',
            'no_kk'        => 'required',
            'nik_adat'     => 'required',
            'tempat'       => 'required',
            'tanggal_lahir'=> 'required',
            'id_jk'        => 'required',
            'status_kk'    => 'required',
            'pekerjaan'    => 'required',
            'pendidikan'   => 'required',
            'nam_tem'      => 'required',
            'tem_bag'      => 'required',
            'foto'         => 'required|mimes:jpg,bmp,png',
            'keterangan'   => 'required'
        ],$message );
        $path=$request->file('foto')->store('fotos');
        $validasi['user_id']=Auth::id();
        $validasi['foto']=$path;
        Keluarga::create($validasi);
        return redirect('keluarga')->with('success', 'Data berhasil tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $keluarga=Keluarga::
        join('tpekerjaans', 'keluargas.pekerjaan', '=', 'tpekerjaans.id_peker')->
        join('pendidikans', 'keluargas.pendidikan', '=', 'pendidikans.id_pen')->
        join('nam_tems',    'keluargas.nam_tem', '=', 'nam_tems.id_nam')->
        join('tem_bags',    'keluargas.tem_bag', '=', 'tem_bags.id_tem')->
        join('status_kks',  'keluargas.status_kk', '=', 'status_kks.id_sta')->
        join('keterangans', 'keluargas.keterangan', '=', 'keterangans.id_keter')->
        join('jks', 'keluargas.id_jk', '=', 'jks.id_jkel') 
        ->find($id);
        $title = "Detail Keluarga";
        return view('admin.keluarga.detailkeluarga', compact('keluarga', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $keluarga=Keluarga::find($id);
        $status_kk     = status_kk   :: all();
        $tpekerjaan    = tpekerjaan  :: all();
        $tem_bag       = tem_bag     :: all();
        $nam_tem       = nam_tem     :: all();
        $keterangan    = keterangan  :: all();
        $pendidikan    = pendidikan  :: all();
        $jk            = jk::all();
        $title   = "Edit  Data Keluarga";
        return view('admin.keluarga.inputkeluarga', 
        compact ('title','keluarga', 'jk', 'pendidikan', 'keterangan', 'nam_tem', 'tem_bag', 'tpekerjaan', 'status_kk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validasi=$request->validate([
            'nama'=>'required',
            'nik'=>'required',
            'no_kk'=>'required',
            'nik_adat'=>'required',
            'tempat'=>'required',
            'tanggal_lahir'=>'required',
            'id_jk'=>'required',
            'status_kk'=>'required',
            'pekerjaan'=>'required',
            'pendidikan'=>'required',
            'nam_tem'=>'required',
            'tem_bag'=>'required',
            'keterangan'=>'required'
        ]);
            if($request->hasFile('foto')){
                $path=$request->file('foto')->store('fotos');
                $validasi['foto']=$path;
            }
        $validasi['user_id']=Auth::id();
        Keluarga::where('id',$id)->update($validasi);
        return redirect('keluarga')->with('success', 'Data berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $keluarga=Keluarga::find($id);
        if ($keluarga != null){
            
            Keluarga::where('id', $id)->delete();
        }
        return redirect('keluarga')->with('success','Data Berhasil Dihapus');
    }
}
