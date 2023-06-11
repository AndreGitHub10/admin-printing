<?php

namespace App\Models;

use CodeIgniter\Model;

class PrintingModel extends Model
{
    protected $table = 'printings';
    protected $allowedFields = ['id', 'tanggal', 'no_ik', 'nama_barang', 'no_printing', 'jumlah_meter', 'keterangan', 'id_user', 'created_at'];

    protected $validationRules = [
        'tanggal'     => 'required',
        'no_ik'        => 'required',
        'nama_barang'     => 'required',
        'no_printing' => 'required',
        'jumlah_meter' => 'required'
    ];
}
