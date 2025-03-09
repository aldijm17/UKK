<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Bicycles extends Model
{

  protected $table ="bicycles";
  protected $primaryKey = "id_bicycle";
  protected $fillable = [
    'merk',
    'tipe',
    'warna',
    'deskripsi',
    'harga_sewa',
  ];
}
