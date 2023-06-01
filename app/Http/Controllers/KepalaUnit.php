<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Contracts\Support\Renderable;
use App\Models\Lowongan;
use App\Models\Unit;

class KepalaUnit extends Controller
{

    public function beranda()
    {
        $lowongan = Lowongan::all();
        return view('kepalaunit', ['lowongan' => $lowongan]);
    }

    public function datalowongan()
    {
        $lowongan = Lowongan::all();
        return view('datalowongan', ['lowongan' => $lowongan]);
    }

    public function formlowongan()
    {
        $unit = Unit::all();
        return view('formlowongan', compact('unit'));

    }

    public function formeditLowongan($id){
        $lowongan = Lowongan::find($id);   
        $unit = Unit::all();
        return view('formEditLowongan', compact('lowongan','unit'));
    }

    public function addlowongan(Request $req)
    {
        // $syarat = implode(", ",$_POST[syarat]);
        $data_lowongan = new Lowongan;
        $data_lowongan->judul = $req->judul;
        $data_lowongan->id_unit = $req->unit;
        $data_lowongan->syarat = implode(', ', (array) $req->input('syarat', []));
        $data_lowongan->jenis = $req->jenis;
        $data_lowongan->tanggal_buka = $req->tanggal_buka;
        $data_lowongan->tanggal_tutup = $req->tanggal_tutup;
        $data_lowongan->deskripsi = $req->deskripsi;
        $data_lowongan->save();
        return redirect("/datalowongan");
    }

    public function editlowongan(Request $req)
    {
        // $syarat = implode(", ",$_POST[syarat]);
        $data_lowongan = new Lowongan;
        $data_lowongan->judul = $req->judul;
        $data_lowongan->id_unit = $req->unit;
        $data_lowongan->syarat = implode(', ', (array) $req->input('syarat', []));
        $data_lowongan->jenis = $req->jenis;
        $data_lowongan->tanggal_buka = $req->tanggal_buka;
        $data_lowongan->tanggal_tutup = $req->tanggal_tutup;
        $data_lowongan->deskripsi = $req->deskripsi;
        $data_lowongan->save();
        return redirect("/datalowongan");
    }

    public function deletelowongan($id_lowongan){
        $data_lowongan = Lowongan::where('id_lowongan', $id_lowongan)->delete();
        return redirect("/datalowongan");
    }
}
