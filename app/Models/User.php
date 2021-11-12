<?php

namespace  App\Models;

class User {
    protected  static  $table_name = "users";
    protected  $id=0;
    protected $username;
    protected $password;
    protected  $email;
    protected  $verify="";
    protected  $active =0;

    public function __construct($username,$password,$email){
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }
}

