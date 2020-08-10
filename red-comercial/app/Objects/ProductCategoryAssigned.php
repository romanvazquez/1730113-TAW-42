<?php
namespace App\Objects;

use App\Objects\IDB;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategoryAssigned extends IDB{
    
    use SoftDeletes;

    protected $table = 'product_category_assign';

    public function product(){
        return $this->belongsTo('App\Objects\Product', 'id_product');
    }

    public function category(){
        return $this->belongsTo('App\Objects\ProductCategory', 'id_product');
    }
}