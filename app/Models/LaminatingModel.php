<?php

namespace App\Models;

use CodeIgniter\Model;

class LaminatingModel extends Model
{
    protected $table = 'laminatings';
    protected $allowedFields = ['id', 'tanggal', 'no_ik', 'nama_barang', 'no_laminating', 'jumlah_meter', 'keterangan', 'id_user', 'created_at'];

    protected $validationRules = [
        'tanggal'     => 'required',
        'no_ik'        => 'required',
        'nama_barang'     => 'required',
        'no_laminating' => 'required',
        'jumlah_meter' => 'required',
    ];
}
