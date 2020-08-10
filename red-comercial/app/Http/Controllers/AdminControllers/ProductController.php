<?php
namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\AdminController;
use App\Objects\Product;
use App\Objects\ProductCategory;

class ProductController extends AdminController
{
    public function initListing()
    {
        $this->initProcessFilter();

        $product = Product::select('id','title','codigo','url','precio_max','stock','stock_status','published')->orderBy('id', 'desc');

        if ($this->filter) {
            $product->where($this->filter_search);
        }

        $this->obj = $product->paginate($this->paginate);

        $keys = [
              'id' => [
                  'text' => 'ID',
                  'filter' => true
              ],
              'title' => [
                  'text' => 'Título',
                  'filter' => true
              ],
              'codigo' => [
                  'text' => 'Cód. de producto',
                  'filter' => true
              ],
              'url' => [
                  'text' => 'URL',
                  'filter' => false
              ],
              'precio_max' => [
                  'text' => 'Precio',
                  'filter' => false
              ],
              'stock' => [
                  'text' => 'Stock',
                  'filter' => false
              ],
              'stock_status' => [
                  'text' => 'Disponible',
                  'filter' => false,
                  'switch' => true
              ],
              'published' => [
                  'text' => 'Publicado',
                  'filter' => false,
                  'switch' => true
              ]
        ];

        return array(
            'obj' => $this->obj,
            'keys' => $keys
        );
    }

    public function initContentCreate($id = null)
    {
        $this->obj = new Product;
        $this->obj->selected_category = array();

        if ($id) {
            $this->obj = $this->obj->find($id);
            $this->obj->selected_category = $this->obj->product_category()->pluck('product_category.id')->toArray();

            if ($this->obj->image) {
                $this->obj->image->url = $this->obj->image->retrieve(250, 250, false);
            }
        }

        $this->obj->category = ProductCategory::select('id', 'title as name')->orderBy('id', 'desc')->get();

        return array(
          'product' => $this->obj
        );

    }

    public function initProcessCreate($id = null){

        $this->obj = new Product;

        if ($id) {
          $this->obj = $this->obj->find($id);
        }

        if (request()->input('display_home')) {
          $display_home = 1;
        } else {
          $display_home = 0;
        }

        if (request()->input('main_product')) {
          $main_product = 1;
        } else {
          $main_product = 0;
        }

        $data = $this->obj;
        $data->title = ucwords(request()->input('title'));
        $data->url = \Str::slug(request()->input('url'));
        $data->content = protectedString(request()->input('content'));
        $data->id_author = \Auth::guard('admin_user')->user()->id;
        
        $data->codigo  = request()->input('codigo');
        $data->precio_max = floatval( request()->input('precio_max') );
        $data->stock = intval( request()->input('stock') );
        $data->stock_status = (bool) request()->input('stock_status');
        
        $data->meta_title = request()->input('meta_title');
        $data->meta_description = request()->input('meta_description');
        $data->id_media = request()->input('id_media');
        $data->post_date = request()->input('post_date');
        $data->published = (bool) request()->input('published');

        $data->save();

        if( request()->input('category') ){

          if ($id) {
            \App\Objects\ProductCategoryAssigned::where('id_product', $data->id)->forceDelete();
          }

          foreach (request()->input('category') as $input) {
              $re = new \App\Objects\ProductCategoryAssigned;
              $re->id_category = $input;
              $re->id_product = $data->id;
              $re->save();
          }

        }
        
        if (!$id) {
            return json('redirect', 'edit/' . $data->id);
        }

        return json('success', t('El producto se ha actualizado.'));
    }

    public function initProcessDelete($id = null)
    {

    }

}
