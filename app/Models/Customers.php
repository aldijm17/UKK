<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id_customer';
    
    protected $fillable = [
        'nama', 
        'profil_img', 
        'email', 
        'alamat',
        'email', 
        'no_telpon'];
    
}
