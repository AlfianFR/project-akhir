@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Data Katgeori
                </div>
                <div class="card-body">
                    <form action="{{ route('kategori.update', $kategori->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label class="form-label">Nama Katgeori :</label>
                            <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori" value="{{ $kategori->nama_kategori }}">
                            @error('nama_kategori')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                                <button class="btn btn-primary" type="submit">Edit</button>
                                <a href="{{ route('kategori.index') }}" class="btn btn-primary">
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection