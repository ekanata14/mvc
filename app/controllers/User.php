<?php

// Membuat class/controller user
class User extends Controller{

    // Method default dari class/controller user
    public function index(){
        $data['judul'] = 'User Page';
        $this->view("components/header", $data);
        $this->view("user/indexUser");
        $this->view("components/footer");
    }

    // Method optional untuk class/controller user
    public function profile($user = "Linux", $role = "Devs"){
        $data['judul'] = 'User Page';
        $data['user'] = $user;
        $data['role'] = $role;

        $this->view("components/header", $data);
        $this->view("user/profile", $data);
        $this->view("components/footer");
    }

    // Method penjumlahan untuk class/controller user
    public function sum($firstNum = 0, $secondNum = 0){

        $data['judul'] = 'User Page';
        $data['firstNum'] = $firstNum;
        $data['secondNum'] = $secondNum;
        $data['result'] = $firstNum * $secondNum;
        $this->view("components/header", $data);
        $this->view("user/sum", $data);
        $this->view("components/footer");
    }
}