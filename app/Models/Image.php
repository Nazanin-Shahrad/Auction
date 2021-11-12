<?php

namespace  App\Models;

class Image
{
    protected static $table_name = "images";
    protected $id = 0;
    protected $item_id;
    protected $name;

    public function __construct($item_id,$name)
    {
        $this->item_id = $item_id;
        $this->name = $name;

    }
}
