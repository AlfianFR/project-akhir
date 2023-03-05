@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Resep
                    <a href="{{ route('resep.create') }}" class="btn btn-sm btn-primary" style="float: right">
                        Tambah Data
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>User</th>
                                    <th>Nama Kota</th>
                                    <th>Kategori Makanan</th>
                                    <th>Judul</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($reseps as $resep)
                                <tr>
                                    <td>{{$loop->iteration }}</td>
                                    <td>{{$resep->user->name}}</td>
                                    <td>{{$resep->kota->nama_kota}}</td>
                                    <td>{{$resep->kategori->nama_kategori}}</td>
                                    <td>{{$resep->judul}}</td>
                                    <td>{{$resep->status}}</td>
                                    <td>
                                        <form action="{{ route('resep.destroy', $resep->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('resep.edit', $resep->id) }}"
                                                class="btn btn-sm btn-outline-success">
                                                Edit
                                            </a> |
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Apakah Anda Yakin?')">Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection