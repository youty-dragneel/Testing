<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'Item';
    public function getTotalPage(){
    	$total = Item::get()->count();
    	return $total;
    }
}
