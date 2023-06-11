<?php

namespace App\Controllers;

use App\Models\PrintingModel;

class PrintingController extends BaseController
{
    public function index()
    {
        $data["menu_active"] = 'printing';
        return view('pages/printing', $data);
    }

    public function insertData($tanggal = '', $no_ik = '', $nama_barang = '', $no_printing = '', $jumlah_meter = '', $id = '')
    {
        $printing = new PrintingModel();
        $newData = [
            'tanggal'       => $tanggal,
            'no_ik'         => $no_ik,
            'nama_barang'   => $nama_barang,
            'no_printing'   => $no_printing,
            'jumlah_meter'  => $jumlah_meter,
            'id_user'       => $id
        ];

        // $newData = [
        //     'tanggal'       => $this->request->getVar('tanggal'),
        //     'no_ik'         => $this->request->getVar('no_ik'),
        //     'nama_barang'   => $this->request->getVar('nama_barang'),
        //     'no_printing'   => $this->request->getVar('no_printing'),
        //     'jumlah_meter'  => $this->request->getVar('jumlah_meter'),
        //     'id_user'       => $id
        // ];

        if ($printing->save($newData) === false) {
            // $session->setFlashdata('errorValidationToast', $printing->errors());
            $result = [
                'queryResult' => false,
                'error' => $printing->errors()
            ];
            return $result;
            // return redirect()->to(base_url('user/printing'));
        } else {
            $result = [
                'queryResult' => true
            ];
            return $result;
            // $data = $printing->findAll();
            // $session->setFlashdata('toast', 'Berhasil menyimpan data');
            // $results = json_encode($data);
            // return $results;
            // return redirect()->to(base_url('user/printing'));
        }
    }

    public function getPrintings()
    {
        $printing = new PrintingModel();
        $data['datatable'] = $printing->orderBy('created_at', 'DESC')->findAll();

        $msg['data'] = view('component/table', $data);
        echo json_encode($msg);
    }

    public function getTable()
    {
        $printing = new PrintingModel();
        $data['datatable'] = $printing->orderBy('created_at', 'DESC')->findAll();

        $msg['data'] = view('component/table', $data);
        echo json_encode($msg);
    }

    public function db()
    {
        echo view('pages/access_denied');
    }
}
