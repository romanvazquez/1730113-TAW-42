<?php
namespace App\Objects;

use App\Objects\IDB;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends IDB{
    use SoftDeletes;

    protected $table = 'product_category';

    public function products(){
        return $this->belongsToMany('App\Objects\Product', 'product_category_assigned', 'id_category', 'id_product');
    }
}