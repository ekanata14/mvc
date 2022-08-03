<?php

// Membuat class/controller user
class User{

    // Method default dari class/controller user
    public function index(){
        echo "User/index";
    }

    // Method optional untuk class/controller user
    public function profile($user = "Linux", $role = "Devs"){
        echo "Selamat datang $user, Anda adalah seorang $role";
    }

    // Method penjumlahan untuk class/controller user
    public function sum($firstNum = 0, $secondNum = 0){
        $result = $firstNum + $secondNum;
        echo "$firstNum + $secondNum = $result"; 
    }
}