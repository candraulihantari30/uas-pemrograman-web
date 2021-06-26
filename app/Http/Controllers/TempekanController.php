<?php

namespace App\Http\Controllers;

use App\models\tbket;
use App\models\tem_bag;
use App\models\nam_tem;
use App\models\tjabatan;
use App\models\Tempekan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TempekanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tempekan=Tempekan::
        join ('tbkets',   'tempekans.ket',         '=', 'tbkets.id_ket')->
        join ('tem_bags', 'tempekans.tem_bag',   '=', 'tem_bags.id_tem')->
        join ('nam_tems', 'tempekans.nam_tem',   '=', 'nam_tems.id_nam')->
        join ('tjabatans', 'tempekans.jabatan',  '=', 'tjabatans.id_jb') 
        ->paginate(5);
        
        $title = "Data Tempekan ";
        return view('admin.tempekan.berandatempekan', compact ('title','tempekan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tbket     = tbket    ::all();
        $tem_bag   = tem_bag  ::all();
        $nam_tem   = nam_tem  ::all();
        $tjabatan  = tjabatan ::all();
        $title     = "Tambah Data Tempekan ";
        return view('admin.tempekan.inputtempekan', 
        compact ('title', 'tjabatan', 'nam_tem', 'tem_bag', 'tbket'));
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
            'required'=> 'Kolom :attribute Harus lengkap',
            'date'    => 'Kolom :attribute Haraus Tanggal',
            'numeric' => 'Kolom :attribute Harus Angka',
        ];
        $validasi=$request->validate([
            'nama'          =>'required|unique:tempekans|max:255',
            'jabatan'       =>'required',
            'periode'       =>'required', 
            'nam_tem'       =>'required',
            'tem_bag'       =>'required', 
            'ket'           =>'required'
        ], $message);
        $validasi['id_anggota'] = Auth::id();
        Tempekan::create($validasi);
        return redirect('tempekan')->with('success', 'Data berhasil tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $tempekan = Tempekan::
        join ('tbkets',   'tempekans.ket',       '=', 'tbkets.id_ket')->
        join ('tem_bags', 'tempekans.tem_bag',   '=', 'tem_bags.id_tem')->
        join ('nam_tems', 'tempekans.nam_tem',   '=', 'nam_tems.id_nam')->
        join ('tjabatans', 'tempekans.jabatan',  '=', 'tjabatans.id_jb')
        ->find($id);
        $title = "Detail Tempekan";
        return view('admin.tempekan.detailtempekan', compact('tempekan', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tbket     = tbket    ::all();
        $tem_bag   = tem_bag  ::all();
        $nam_tem   = nam_tem  ::all();
        $tjabatan  = tjabatan ::all();
        $tempekan  = Tempekan ::find($id);
        $title     = "Edit Data Tempekan";
        return view('admin.tempekan.inputtempekan', 
        compact ('title','tempekan', 'tjabatan', 'nam_tem', 'tem_bag', 'tbket'));
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
            'nama'          =>'required',
            'jabatan'       =>'required',
            'periode'       =>'required', 
            'nam_tem'       =>'required',
            'tem_bag'       =>'required', 
            'ket'           =>'required'
        ]);
        $validasi['id_anggota']=Auth::id();
        Tempekan::where('id', $id)->update($validasi);
        return redirect('tempekan')->with('success','Data Berhasil Ditambah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tempekan=Tempekan::find($id);
        if ($tempekan != null){

            Tempekan::where('id', $id)->delete();
        }
        return redirect('tempekan')->with('success','Data Berhasil Dihapus');
    }
}
