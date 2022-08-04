<?php

class App{
    // Mendeklarasikan index untuk controller, method, dan parameters
    protected $controller = "home";
    protected $method = "index";
    protected $params = [];
    public function __construct(){
        // Mengambil url yang sudah dibersihkan di parseURL
        $url = $this->parseURL();
        // Mengecek apakah class controller ada di dalam folder controllers
        if(isset($url)){
            if(file_exists('../app/controllers/' . $url[0] .'.php')){
            $this->controller = $url[0];
            unset($url[0]);
            }
        }   

        // Menginisialiasi class dari file class yang ada dalam folder controller
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // Mengecek apakah method yang ada di dalam url tersedia atau tidak
        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // Mengisi data pada variabel parameter jika ada data yang dimasukkan
        if(!empty($url)){
            $this->params = array_values($url);
        }

        // Menjalankan controller dari variabel yang sudah divalidasi
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL(){
        if(isset($_GET['url'])){
            // Menghapus tanda slash di akhir
            $url = rtrim($_GET['url'], '/');
            // Membersihkan dari karakter asing
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // Dipecah berdasarkan tanda slash
            $url = explode('/', $url);
            return $url;
        }
    }
}