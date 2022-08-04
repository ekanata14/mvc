<?php

// Membuat class/controller home
class Home extends Controller{
    public function index(){
        $data['judul'] = "Home Page";
        $this->view('components/header', $data);
        $this->view('home/index');
        $this->view('components/footer');
    }
}