@extends('layouts.appadmin')
@section('content')
@php
    $syarat = explode(', ', $lowongan -> syarat);
@endphp
<form method="POST" action="/editlowongan">
  @csrf 
    <div class="mb-3">
      <label for="judulLowongan" class="form-label">Judul Lowongan</label>
      <input name="judul" type="judul" class="form-control" value="{{$lowongan->judul}}" id="inputJudulLowongan" aria-describedby="emailHelp">
    </div>
    
    <!--nama unit-->
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Unit</label>
      <select name="unit" class="form-control">
        @foreach ($unit as $item)
            <option value="{{$item['id_unit']}}">{{$item['nama']}}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Jenis Lowongan</label>
      <select name="jenis" class="form-control">
        <option value="Part Time">Part-Time</option>
        <option value="Full Time">Full-Time</option>
      </select>
    </div>

    <div class="mb-3">
      <div class="row form-group">
        <label for="date" class="col-sm-1 col-form-label">Tanggal buka</label>
        <div class="col-sm-4">
            <div class="input-group date" id="datepickerbuka">
                <input name="tanggal_buka" type="text" value="{{$lowongan->tanggal_buka}}" class="form-control">
                <span class="input-group-append">
                    <span class="input-group-text bg-white">
                        <i class="fa fa-calendar"></i>
                    </span>
                </span>
            </div>
        </div>
    </div>
    </div>

    <div class="mb-3">
      <div class="row form-group">
        <label for="date" class="col-sm-1 col-form-label">Tanggal tutup</label>
        <div class="col-sm-4">
            <div class="input-group date" id="datepickertutup">
                <input name="tanggal_tutup" type="text" value="{{$lowongan->tanggal_tutup}}" class="form-control">
                <span class="input-group-append">
                    <span class="input-group-text bg-white">
                        <i class="fa fa-calendar"></i>
                    </span>
                </span>
            </div>
        </div>
    </div>
    </div>
  
    <!--Syarat-->
    <div class="mb-3">
      <label for="judulLowongan" class="form-label">Syarat</label>
      <div class="form-check">
        <input name="syarat[]" class="form-check-input" type="checkbox" value="Transkrip Nilai" {{ in_array('Transkrip Nilai', $syarat) ? 'checked' : '' }} id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
          Transkrip Nilai
        </label>
      </div>
      <div class="form-check">
        <input name="syarat[]" class="form-check-input" type="checkbox" value="CV" {{ in_array('CV', $syarat) ? 'checked' : '' }} id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
          CV
        </label>
      </div>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Deskripsi</label>
      <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$lowongan->deskripsi}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection