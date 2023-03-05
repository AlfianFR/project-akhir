<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Kota;
use App\Models\Kategori;

class Resep extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
        
    }
    public function kota()
    {
        return $this->belongsTo(Kota::class);
        
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
        
    }
    public function image()
    {
        if ($this->gambar_resep && file_exists(public_path('images/gambar_resep/' . $this->gambar_resep))) {
            return asset('images/gambar_resep/' . $this->gambar_resep);
        } else {
            return asset('images/no_image.jpg');
        }
    }
// mengahupus image(image) di storage(penyimpanan) public
    public function deleteImage()
    {
        if ($this->gambar_resep && file_exists(public_path('images/gambar_resep/' . $this->gambar_resep))) {
            return unlink(public_path('images/gambar_resep/' . $this->gambar_resep));
        }
    }
}