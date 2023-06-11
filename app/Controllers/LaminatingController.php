<?php

namespace App\Controllers;

use App\Models\LaminatingModel;

class LaminatingController extends BaseController
{
    protected $laminating;

    public function __construct()
    {
        $this->laminating = new LaminatingModel();
    }

    public function index()
    {
        $data["menu_active"] = 'slam';
        return view('pages/slam', $data);
    }

    public function getLaminatings()
    {
        $data['datatable'] = $this->laminating->orderBy('created_at', 'DESC')->findAll();

        $msg['data'] = view('component/table_laminating', $data);
        echo json_encode($msg);
    }
}
