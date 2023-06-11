<?php

namespace App\Models;

use CodeIgniter\Model;

class SlittingModel extends Model
{
    protected $table = 'slittings';
    protected $allowedFields = ['id', 'tanggal', 'no_ik', 'barang_jadi', 'no_slitting', 'jumlah_meter', 'hasil_fg_utuh', 'hasil_fg_riwen', 'keterangan', 'id_user', 'created_at'];

    protected $validationRules = [
        'tanggal'     => 'required',
        'no_ik'        => 'required',
        'barang_jadi'     => 'required',
        'no_slitting' => 'required',
        'jumlah_meter' => 'required',
        'hasil_fg_utuh' => 'required',
        'hasil_fg_riwen' => 'required',
    ];
}
