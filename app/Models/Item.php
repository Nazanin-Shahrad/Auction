<?php
namespace  App\Models;

class Item {
    protected  static  $table_name = "items";
    protected  $id=0;
    protected $user_id;
    protected $cat_id;
    protected  $name;
    protected $price;
    protected $description;
    protected $date;
    protected $notified=0;



    public function __construct($user_id,$cat_id,$name,$price,$description,$date){

        $this->user_id = $user_id;
        $this->cat_id = $cat_id;
        $this->name = $name;
        $this->price = $price;
        $this->description=$description;
        $this->date=$date;



    }
}
