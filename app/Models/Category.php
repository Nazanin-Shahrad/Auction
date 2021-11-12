<?php
namespace  App\Models;

class Category{
    protected  static  $table_name = "categories";
    protected  $id=0;
    protected $cat;

    public function __construct($cat){
        $this->cat = $cat;

    }

}
