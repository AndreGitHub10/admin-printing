<?php

namespace App\Controllers;

use App\Models\LaminatingModel;
use App\Models\PrintingModel;
use App\Models\SlittingModel;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function __construct()
    {
        if (session()->get('user_level') != 'user') {
            echo view('pages/access_denied');
            exit;
        }
    }

    public function index()
    {
        return redirect()->to(base_url('user/dashboard'));
    }

    public function dashboard()
    {
        $printing = new PrintingModel();
        $laminating = new LaminatingModel();
        $slitting = new SlittingModel();
        $data["menu_active"] = 'dashboard';
        $data["printing"] = $printing->select('tanggal')->selectCount('id', 'num')->groupBy('tanggal')->findAll();
        $data["laminating"] = $laminating->select('tanggal')->selectCount('id', 'num')->groupBy('tanggal')->findAll();
        $data["slitting"] = $slitting->select('tanggal')->selectCount('id', 'num')->groupBy('tanggal')->findAll();
        // dd($data);
        return view('pages/dashboard', $data);
    }

    public function store()
    {
        $userModel = new UserModel();
        $data = [
            'name'     => 'fiki',
            'password' => password_hash('123', PASSWORD_DEFAULT)
        ];
        $userModel->save($data);
        return redirect()->to(base_url());
    }

    public function printing()
    {
        $data["menu_active"] = 'printing';
        return view('pages/printing', $data);
    }

    public function getPrintings()
    {
        $printing = new PrintingModel();
        $data['datatable'] = $printing->orderBy('created_at', 'DESC')->findAll();

        $msg['data'] = view('component/table', $data);
        echo json_encode($msg);
    }

    public function getPrinting($id = null)
    {
        $printing = new PrintingModel();
        if ($id == null) {
            return $this->response->setStatusCode(400);
        }
        $dt = $printing->find($id);
        if ($dt) {
            return $this->response->setStatusCode(200)->appendBody(json_encode($dt));
        } else {
            return $this->response->setStatusCode(400);
        }
    }

    public function addPrinting()
    {
        $printing = new PrintingModel();
        $newData = [
            'tanggal'       => $this->request->getVar('tanggal'),
            'no_ik'         => $this->request->getVar('no_ik'),
            'nama_barang'   => $this->request->getVar('nama_barang'),
            'no_printing'   => $this->request->getVar('no_printing'),
            'jumlah_meter'  => $this->request->getVar('jumlah_meter'),
            'keterangan'  => $this->request->getVar('keterangan'),
            'id_user'       => session()->get('id_user'),
        ];

        if ($printing->save($newData) === false) {
            return $this->response->setStatusCode(400);
        } else {
            return $this->response->setStatusCode(200);
        }
    }

    public function updatePrinting($id = null)
    {
        $printing = new PrintingModel();
        if ($id == null) {
            return $this->response->setStatusCode(400);
        } elseif ($printing->where('id', $id)) {
            $printing->update($id, [
                'tanggal'       => $this->request->getVar('tanggal'),
                'no_ik'         => $this->request->getVar('no_ik'),
                'nama_barang'   => $this->request->getVar('nama_barang'),
                'no_printing'   => $this->request->getVar('no_printing'),
                'jumlah_meter'  => $this->request->getVar('jumlah_meter'),
                'keterangan'  => $this->request->getVar('keterangan'),
                'id_user'       => session()->get('id_user'),
            ]);
            // if ($deletedPrinting) {
            return $this->response->setStatusCode(200);
            // } else {
            //     return $this->response->setStatusCode(402);
            // }
        } else {
            return $this->response->setStatusCode(400);
        }
    }

    public function deletePrinting($id = null)
    {
        $printing = new PrintingModel();
        if ($id == null) {
            return $this->response->setStatusCode(400);
        } elseif ($printing->where('id', $id)) {
            $deletedPrinting = $printing->delete($id);
            if ($deletedPrinting) {
                return $this->response->setStatusCode(200);
            } else {
                return $this->response->setStatusCode(400);
            }
        } else {
            return $this->response->setStatusCode(400);
        }
    }

    public function laminating()
    {
        $data["menu_active"] = 'laminating';
        return view('pages/laminating', $data);
    }

    public function getLaminatings()
    {
        $laminating = new LaminatingModel();
        $data['datatable'] = $laminating->orderBy('created_at', 'DESC')->findAll();

        $msg['data'] = view('component/table_laminating', $data);
        echo json_encode($msg);
    }

    public function getLaminating($id = null)
    {
        $laminating = new LaminatingModel();
        if ($id == null) {
            return $this->response->setStatusCode(400);
        }
        $dt = $laminating->find($id);
        if ($dt) {
            return $this->response->setStatusCode(200)->appendBody(json_encode($dt));
        } else {
            return $this->response->setStatusCode(400);
        }
    }

    public function addLaminating()
    {
        $laminating = new LaminatingModel();
        $newData = [
            'tanggal'       => $this->request->getVar('tanggal'),
            'no_ik'         => $this->request->getVar('no_ik'),
            'nama_barang'   => $this->request->getVar('nama_barang'),
            'no_laminating'   => $this->request->getVar('no_laminating'),
            'jumlah_meter'  => $this->request->getVar('jumlah_meter'),
            'keterangan'  => $this->request->getVar('keterangan'),
            'id_user'       => session()->get('id_user'),
        ];

        if ($laminating->save($newData) === false) {
            return $this->response->setStatusCode(400);
        } else {
            return $this->response->setStatusCode(200);
        }
    }

    public function updateLaminating($id = null)
    {
        $laminating = new LaminatingModel();
        if ($id == null) {
            return $this->response->setStatusCode(400);
        } elseif ($laminating->where('id', $id)) {
            $laminating->update($id, [
                'tanggal'       => $this->request->getVar('tanggal'),
                'no_ik'         => $this->request->getVar('no_ik'),
                'nama_barang'   => $this->request->getVar('nama_barang'),
                'no_laminating'   => $this->request->getVar('no_laminating'),
                'jumlah_meter'  => $this->request->getVar('jumlah_meter'),
                'keterangan'  => $this->request->getVar('keterangan'),
                'id_user'       => session()->get('id_user'),
            ]);
            // if ($deletedPrinting) {
            return $this->response->setStatusCode(200);
            // } else {
            //     return $this->response->setStatusCode(402);
            // }
        } else {
            return $this->response->setStatusCode(400);
        }
    }

    public function deleteLaminating($id = null)
    {
        $laminating = new LaminatingModel();
        if ($id == null) {
            return $this->response->setStatusCode(400);
        } elseif ($laminating->where('id', $id)) {
            $deletedLaminating = $laminating->delete($id);
            if ($deletedLaminating) {
                return $this->response->setStatusCode(200);
            } else {
                return $this->response->setStatusCode(400);
            }
        } else {
            return $this->response->setStatusCode(400);
        }
    }

    public function slitting()
    {
        $data["menu_active"] = 'slitting';
        return view('pages/slitting', $data);
    }

    public function getSlittings()
    {
        $slitting = new SlittingModel();
        $data['datatable'] = $slitting->orderBy('created_at', 'DESC')->findAll();

        $msg['data'] = view('component/table_slitting', $data);
        echo json_encode($msg);
    }

    public function getSlitting($id = null)
    {
        $slitting = new SlittingModel();
        if ($id == null) {
            return $this->response->setStatusCode(400);
        }
        $dt = $slitting->find($id);
        if ($dt) {
            return $this->response->setStatusCode(200)->appendBody(json_encode($dt));
        } else {
            return $this->response->setStatusCode(400);
        }
    }

    public function addSlitting()
    {
        $slitting = new SlittingModel();
        $newData = [
            'tanggal'       => $this->request->getVar('tanggal'),
            'no_ik'         => $this->request->getVar('no_ik'),
            'barang_jadi'   => $this->request->getVar('barang_jadi'),
            'no_slitting'   => $this->request->getVar('no_slitting'),
            'jumlah_meter'  => $this->request->getVar('jumlah_meter'),
            'hasil_fg_utuh'  => $this->request->getVar('hasil_fg_utuh'),
            'hasil_fg_riwen'  => $this->request->getVar('hasil_fg_riwen'),
            'keterangan'    => $this->request->getVar('keterangan'),
            'id_user'       => session()->get('id_user'),
        ];

        if ($slitting->save($newData) === false) {
            $msg = $slitting->errors();
            return $this->response->setStatusCode(400)->setBody($msg);
        } else {
            return $this->response->setStatusCode(200);
        }
    }

    public function updateSlitting($id = null)
    {
        $slitting = new SlittingModel();
        if ($id == null) {
            return $this->response->setStatusCode(400);
        } elseif ($slitting->where('id', $id)) {
            $slitting->update($id, [
                'tanggal'       => $this->request->getVar('tanggal'),
                'no_ik'         => $this->request->getVar('no_ik'),
                'barang_jadi'   => $this->request->getVar('barang_jadi'),
                'no_slitting'   => $this->request->getVar('no_slitting'),
                'jumlah_meter'  => $this->request->getVar('jumlah_meter'),
                'hasil_fg_utuh'  => $this->request->getVar('hasil_fg_utuh'),
                'hasil_fg_riwen'  => $this->request->getVar('hasil_fg_riwen'),
                'keterangan'    => $this->request->getVar('keterangan'),
                'id_user'       => session()->get('id_user'),
            ]);
            // if ($deletedPrinting) {
            return $this->response->setStatusCode(200);
            // } else {
            //     return $this->response->setStatusCode(402);
            // }
        } else {
            return $this->response->setStatusCode(400);
        }
    }

    public function deleteSlitting($id = null)
    {
        $slitting = new SlittingModel();
        if ($id == null) {
            return $this->response->setStatusCode(400);
        } elseif ($slitting->where('id', $id)) {
            $deletedSlitting = $slitting->delete($id);
            if ($deletedSlitting) {
                return $this->response->setStatusCode(200);
            } else {
                return $this->response->setStatusCode(400);
            }
        } else {
            return $this->response->setStatusCode(400);
        }
    }
}
