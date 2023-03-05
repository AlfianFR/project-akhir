@extends('layouts.admin')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Resep</h4>
        <div class="table-responsive">
            <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Nama Kota</th>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reseps as $resep)
                <tr>
                    <td>{{$loop->iteration }}</td>
                    <td>{{$resep->user->name}}</td>
                    <td>{{$resep->kota->nama_kota}}</td>
                    <td>{{$resep->judul}}</td>
                    <td>
                        @if($resep->gambar_resep)
                            <img src="{{ asset('/images/gambar_resep/' . $resep->gambar_resep) }}"
                                width="60" height="60" alt="{{ $resep->name }}">
                        @else
                            <span class="badge badge-primary">No image</span>
                        @endif
                    </td>
                    <td>{{$resep->status}}</td>
                    <td>
                        <form action="{{ route('resep.destroy', $resep->id) }}" method="post">
                            @csrf
                            @method('delete')
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
@endsection