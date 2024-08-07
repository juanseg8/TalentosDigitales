<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['titulo'] = 'InnovaWeb Labs';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/principal');
        echo view('front/footer_view');
    }

    public function quienes_somos()
    {
        $data['titulo'] = 'Quienes somos';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/quienes_somos');
        echo view('front/footer_view');
    }

    public function acerca_de()
    {
        $data['titulo'] = 'Acerca de';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/acerca_de');
        echo view('front/footer_view');
    }

    public function login()
    {
        $data['titulo'] = 'Inicio de sesion';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuarios/login');
        echo view('front/footer_view');
    }

    public function registro()
    {
        $data['titulo'] = 'Registro';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuarios/registro');
        echo view('front/footer_view');
    }
}
