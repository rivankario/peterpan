@extends('layouts.appadmin')
@section('content') 

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-middle">
                <h4 class="m-0 font-weight-bold text-primary">Data Lowongan</h6>
                <a href="formlowongan" type="button" class="btn btn-primary">Tambah Lowongan</a>
        </div>
        <div class="card-body">
            <div class="table-responsive justify-content-between">  
                <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Syarat</th>
                            <th>Deskripsi</th>
                            <th>Jumlah Pendaftar</th>
                            <th>Jenis</th>
                            <th>Tanggal Buka</th>
                            <th>Tanggal Tutup</th>
                            <th class="w-30"> </th>
                        </tr>
                    </thead>
                    @foreach ($lowongan as $data)
                    <tbody>
                        <tr>
                            <td>{{$data['judul']}}</td>
                            <td>{{$data['syarat']}}</td>
                            <td>{{$data['deskripsi']}}</td>
                            <td>{{$data['jml_pendaftar']}}</td>
                            <td>{{$data['jenis']}}</td>
                            <td>{{$data['tanggal_buka']}}</td>
                            <td>{{$data['tanggal_tutup']}}</td>

                            <th class="w-20 px-3">
                                <a href="/datalowongan/delete/{{$data->id_lowongan}}" action="/deletelowongan" >
                                    <button type="button" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger float-right mr-3">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </a>
                                <a href="/formEditLowongan/{{$data->id_lowongan}}">
                                    <button type="button" class="btn btn-warning float-right mr-3">
                                        <i class="bi bi-pen"></i>
                                    </button>
                                </a>
                            </th>
                        </tr>
                        
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection