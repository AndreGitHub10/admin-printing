<?php

namespace App\Controllers;

use App\Models\SlittingModel;

class SlittingController extends BaseController
{
    protected $slitting;

    public function __construct()
    {
        $this->slitting = new SlittingModel();
    }

    public function index()
    {
        $data["menu_active"] = 'slitting';
        return view('pages/slitting', $data);
    }

    public function getSlittings()
    {
        $data['datatable'] = $this->slitting->orderBy('created_at', 'DESC')->findAll();

        $msg['data'] = view('component/table_slitting', $data);
        echo json_encode($msg);
    }
}
