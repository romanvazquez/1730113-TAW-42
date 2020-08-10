<?php
namespace App\Objects;

use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends IDB{
    
    use SoftDeletes;

    protected $table = 'product';

    public function product_category(){
        return $this->belongsToMany('App\Objects\ProductCategory', 'product_category_assign', 'id_product', 'id_category');
    }

    public function image(){
        return $this->belongsTo('App\Objects\Media', 'id_media');
    }

    public function author(){
        return $this->belongsTo('App\Objects\AdminUser', 'id_author');
    }
}