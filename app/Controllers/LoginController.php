<?php

namespace App\Controllers;

use App\Models\UserModel;

class LoginController extends BaseController
{
    public function index()
    {
        return view('pages/login');
    }

    public function loginUser()
    {
        $session = session();
        $userModel = new UserModel();
        $name = $this->request->getVar('usernameUser');
        $password = $this->request->getVar('passwordUser');

        $data = $userModel->where('name', $name)->first();

        if ($data) {
            if ($data['level'] == 'user') {
                $pass = $data['password'];
                $authenticatePassword = password_verify($password, $pass);
                if ($authenticatePassword) {
                    $ses_data = [
                        'id_user' => $data['id_user'],
                        'name' => $data['name'],
                        'user_level' => $data['level'],
                        'isLoggedIn' => TRUE
                    ];
                    $session->set($ses_data);
                    $session->setFlashdata('toast', 'Login berhasil, Selamat Datang!');
                    return redirect()->to(base_url('user/printing'));
                } else {
                    $session->setFlashdata('msg', 'Password is incorrect.');
                    return redirect()->to(base_url('/login'));
                }
            } else {
                $session->setFlashdata('msgadmin', 'Akun admin tidak dapat mengakses.');
                return redirect()->to(base_url('/login'));
            }
        } else {
            $session->setFlashdata('msg', 'Username tidak terdaftar');
            return redirect()->to(base_url('/login'));
        }
    }

    public function loginAdmin()
    {
        $session = session();
        $userModel = new UserModel();
        $name = $this->request->getVar('usernameAdmin');
        $password = $this->request->getVar('passwordAdmin');

        $data = $userModel->where('name', $name)->first();

        if ($data) {
            if ($data['level'] == 'admin') {
                $pass = $data['password'];
                $authenticatePassword = password_verify($password, $pass);
                if ($authenticatePassword) {
                    $ses_data = [
                        'id_user' => $data['id_user'],
                        'name' => $data['name'],
                        'user_level' => $data['level'],
                        'isLoggedIn' => TRUE
                    ];
                    $session->set($ses_data);
                    return redirect()->to(base_url('admin/printing'));
                } else {
                    $session->setFlashdata('msgadmin', 'Password is incorrect.');
                    return redirect()->to(base_url('/login'));
                }
            } else {
                $session->setFlashdata('msgadmin', 'Akun non-admin tidak dapat mengakses.');
                return redirect()->to(base_url('/login'));
            }
        } else {
            $session->setFlashdata('msgadmin', 'Username tidak terdaftar');
            return redirect()->to(base_url('/login'));
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('login'));
    }
}
