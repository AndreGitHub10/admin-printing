<?php

namespace App\Controllers;

use App\Models\LaminatingModel;
use App\Models\PrintingModel;
use App\Models\SlittingModel;
use App\Models\UserModel;

class AdminController extends BaseController
{
    public function __construct()
    {
        if (session()->get('user_level') != 'admin') {
            echo view('pages/access_denied');
            exit;
        }
    }

    public function index()
    {
        return redirect()->to(base_url('admin/dashboard'));
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
            'name'     => 'admin',
            'password' => password_hash('123', PASSWORD_DEFAULT),
            'level'    => 'admin'
        ];
        $userModel->save($data);
        return redirect()->to(base_url());
    }

    public function printing()
    {
        $data["menu_active"] = 'printing';
        return view('admin/pages/printing', $data);
    }

    public function getPrintings()
    {
        $printing = new PrintingModel();
        $data['datatable'] = $printing->orderBy('created_at', 'DESC')->findAll();

        $msg['data'] = view('admin/component/table', $data);
        echo json_encode($msg);
    }

    public function laminating()
    {
        $data["menu_active"] = 'laminating';
        return view('admin/pages/laminating', $data);
    }

    public function getLaminatings()
    {
        $laminating = new LaminatingModel();
        $data['datatable'] = $laminating->orderBy('created_at', 'DESC')->findAll();

        $msg['data'] = view('admin/component/table_laminating', $data);
        echo json_encode($msg);
    }

    public function slitting()
    {
        $data["menu_active"] = 'slitting';
        return view('admin/pages/slitting', $data);
    }

    public function getSlittings()
    {
        $slitting = new SlittingModel();
        $data['datatable'] = $slitting->orderBy('created_at', 'DESC')->findAll();

        $msg['data'] = view('admin/component/table_slitting', $data);
        echo json_encode($msg);
    }
}
