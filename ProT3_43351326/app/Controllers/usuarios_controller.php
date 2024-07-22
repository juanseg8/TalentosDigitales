<?php

namespace App\Controllers;

use App\Models\usuarios_model;
use CodeIgniter\Controller;

class usuarios_controller extends Controller
{

    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function index()
    {
        $usuariosModel = new usuarios_model();
        $data['usuarios'] = $usuariosModel->findAll();

        $data['titulo'] = 'Lista de Usuarios';
        echo view('front/head_view', $data);
        echo view('back/usuarios/index', $data);
    }

    public function create()
    {
        $data['titulo'] = 'Registro';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuarios/registro');
        echo view('front/footer_view');
    }

    public function formValidation()
    {
        $input = $this->validate([
            'nombre' => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'usuario' => 'required|min_length[3]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'pass' => 'required|min_length[3]|max_length[10]',
        ]);

        $formModel = new usuarios_model();

        if (!$input) {
            $data['titulo'] = 'Registro';
            echo view('front/head_view', $data);
            echo view('front/navbar_view');
            echo view('back/usuarios/registro', ['validation' => $this->validator]);
            echo view('front/footer_view');
        } else {
            $formModel->save([
                'nombre' => $this->request->getVar('nombre'),
                'apellido' => $this->request->getVar('apellido'),
                'usuario' => $this->request->getVar('usuario'),
                'email' => $this->request->getVar('email'),
                'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
            ]);

            session()->setFlashdata('success', 'Usuario registrado con éxito');
            return redirect()->to('/login');
        }
    }

    public function edit($id)
    {
        $input = $this->validate([
            'nombre' => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'usuario' => 'required|min_length[3]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email',
            'pass' => 'required|min_length[3]|max_length[10]',
        ]);

        if (!$input) {
            $usuariosModel = new usuarios_model();
            $data['usuario'] = $usuariosModel->find($id);
            $data['titulo'] = 'Editar Usuario';

            echo view('front/head_view', $data);
            echo view('front/navbar_view');
            echo view('back/usuarios/editar', ['validation' => $this->validator]);
            echo view('front/footer_view');
        } else {
            $usuariosModel = new usuarios_model();

            $usuariosModel->update($id, [
                'nombre' => $this->request->getVar('nombre'),
                'apellido' => $this->request->getVar('apellido'),
                'usuario' => $this->request->getVar('usuario'),
                'email' => $this->request->getVar('email'),
                'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
            ]);

            session()->setFlashdata('success', 'Usuario actualizado con éxito');
            return redirect()->to('/usuarios');
        }
    }

    public function delete($id)
    {
        $usuariosModel = new usuarios_model();
        $usuariosModel->delete($id);

        session()->setFlashdata('success', 'Usuario eliminado con éxito');
        return redirect()->to('/usuarios');
    }
}
