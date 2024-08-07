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
        echo view('front/navbar_view');
        echo view('back/usuarios/index', $data);
        echo view('front/footer_view');
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

    public function delete($id)
    {
        $usuariosModel = new usuarios_model();
        $usuariosModel->delete($id);

        session()->setFlashdata('success', 'Usuario eliminado con éxito');
        return redirect()->to('/usuarios');
    }

    public function edit($id)
    {
        $crudModel = new usuarios_model();
        $data['usuario'] = $crudModel->find($id);

        if (empty($data['usuario'])) {
            return redirect()->to('/usuarios')->with('fail', 'Usuario no encontrado.');
        }

        $data['titulo'] = 'Editar Usuario';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuarios/editar', $data);
        echo view('front/footer_view');
    }

    public function update()
    {
        $formModel = new usuarios_model();

        $input = $this->validate([
            'nombre' => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email',
            'usuario' => 'required|min_length[3]',
            'pass' => 'permit_empty|min_length[5]|max_length[20]'
        ]);

        if (!$input) {
            $data['titulo'] = 'Editar Usuario';
            echo view('front/head_view', $data);
            echo view('front/navbar_view');
            echo view('back/usuarios/editar', ['validation' => $this->validator, 'usuario' => $this->request->getPost()]);
            echo view('front/footer_view');
        } else {
            $id = $this->request->getVar('id_usuario');
            $nombre = $this->request->getVar('nombre');
            $apellido = $this->request->getVar('apellido');
            $email = $this->request->getVar('email');
            $usuario = $this->request->getVar('usuario');
            $pass = $this->request->getVar('pass');


            $newData = [
                'nombre' => $nombre,
                'apellido' => $apellido,
                'email' => $email,
                'usuario' => $usuario
            ];


            if (!empty($pass)) {
                $newData['pass'] = password_hash($pass, PASSWORD_DEFAULT);
            }

            $formModel->update($id, $newData);

            return redirect()->to('usuarios')->with('success', 'Usuario actualizado correctamente.');
        }
    }
}
