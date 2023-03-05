@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data Resep
                    </div>
                    <div class="card-body">
                        <form action="{{ route('resep.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">User :</label>
                                <select name="user_id"
                                   class="form-control @error('user_id') is-invalid @enderror">
                                   @foreach ($users as $user)               
                                   <option value="{{ $user->id }}">{{ $user->name }}</option>
                                   @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Kota :</label>
                                <select name="kota_id"
                                   class="form-control @error('kota_id') is-invalid @enderror">
                                   @foreach ($kotas as $kota)               
                                   <option value="{{ $kota->id }}">{{ $kota->nama_kota }}</option>
                                   @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Judul :</label>
                                <input type="text" class="form-control" name="judul" placeholder="Judul Masakan">
                            </div>

                            <div class="mb-3">
                                <label>Gambar Makanan :</label>
                                <input type="file" class="form-control" name="gambar_resep" placeholder="Gambar">
                            </div>

                            <div class="mb-3">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" cols="30" rows="7"
                                  class="form-control mb-2  @error('deskripsi') is-invalid @enderror" placeholder="deskripsi"
                                ></textarea>
                            </div>

                            <div class="mb-3">
                                <label>Bahan-Bahan</label>
                                <textarea name="bahan_bahan" cols="30" rows="7"
                                  class="form-control mb-2  @error('bahan_bahan') is-invalid @enderror" placeholder="Bahan-Bahan"
                                ></textarea>
                            </div>

                            <div class="mb-3">
                                <label>Langkah-Langkah</label>
                                <textarea name="langkah_langkah" cols="30" rows="7"
                                  class="form-control mb-2  @error('langkah_langkah') is-invalid @enderror" placeholder="Langkah-Langkah"
                                ></textarea>
                              </div>
                                    <button class="btn btn-primary" type="submit">Tambah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection