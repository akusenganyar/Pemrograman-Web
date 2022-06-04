<?php

// 1. Buat 1 parent class yang berisikan 2method
class agoda{
    function agoda_method1(){
        echo "ini agoda method 1" . PHP_EOL;
    }

    function agoda_method2(){
        echo "ini agoda method 2" . PHP_EOL;
    }
}

// 2. Buat 1 abstract class yang berisikan 2 abstract method.
abstract class agoda_akomodasi {
    abstract function akomodasi_pesawat($name);
    abstract function akomodasi_hotel($name);
}

// 3. Buat 1 child class yang mengextend abstract class yang telah dibuat.

class user extends agoda_akomodasi{
    public function akomodasi_pesawat($name){
        echo "pengguna akomodasi pesawat : " . $name . PHP_EOL;
    }

    public function akomodasi_hotel($name){
        echo "pengguna akomodasi hotel : " . $name . PHP_EOL;
    }
}

// 4. Buat trait untuk masing-masing abstract method yang telah dibuattadi.
trait agoda_akomodasi_trait{
    public function akomodasi_pesawat($name){
        echo "pengguna akomodasi pesawat : " . $name . PHP_EOL;
    }

    public function akomodasi_hotel($name){
        echo "pengguna akomodasi hotel : " . $name . PHP_EOL;
    }
}

class _user {
    use agoda_akomodasi_trait;
}