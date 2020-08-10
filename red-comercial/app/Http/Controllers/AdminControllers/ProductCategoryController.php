<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\AdminController;
use App\Objects\ProductCategory;

class ProductCategoryController extends AdminController{

  public function initListing(){
      $this->initProcessFilter();

      $product_category = ProductCategory::select('id', 'title', 'status')->orderBy('id', 'desc');

      if ($this->filter) {
          $product_category->where($this->filter_search);
      }

      $this->obj = $product_category->paginate($this->paginate);

      $keys = [
            'id' => [
                'text' => 'ID',
                'filter' => true
            ],
            'title' => [
                'text' => 'Titulo',
                'filter' => true
            ],
            'status' => [
                'text' => 'Status',
                'filter' => false,
                'switch' => true
            ]
      ];

      return array(
          'obj' => $this->obj,
          'keys' => $keys
      );
  }

  public function initContentCreate($id = null){
    $this->obj = new ProductCategory;
    if ($id) {
      $this->obj = $this->obj->find($id);
    }

    return array(
      'product_category' => $this->obj
    );
  }

  public function initProcessCreate($id = null){

    $this->obj = new ProductCategory;

    if ($id) {
      $this->obj = $this->obj->find($id);
    }

    if (request()->input('status')) {
      $status = 1;
    } else {
      $status = 0;
    }

    $data = $this->obj;
    $data->title = request()->input('name');
    $data->url = \Str::slug(request()->input('url'));
    $data->status = $status;
    $data->meta_title = request()->input('meta_title');
    $data->meta_description = request()->input('meta_description');
    $data->save();

    if (!$id) {
      return json('redirect', 'edit/' . $data->id);
    }

    return json('success', t('La categoía de prouductos ha sido actualizada.'));
  }

  public function initProcessDelete($id = null)
  { }
}