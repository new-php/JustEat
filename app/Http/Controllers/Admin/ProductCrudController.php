<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

/**
 * Class ProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProductCrudController extends CrudController
{
    use ListOperation, CreateOperation, UpdateOperation, DeleteOperation, ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Product::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/product');
        CRUD::setEntityNameStrings('product', 'products');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn([
            'label' => 'Restaurant',
            'type' => 'select',
            'name' => 'restaurant_id',
            'entity' => 'restaurant',
            'attribute' => 'name',
            'model' => 'App\Models\Restaurant',
            ]);
        CRUD::addColumn([
            'label' => 'Name',
            'type' => 'text', 
            'name' => 'name',
            ]);
        CRUD::addColumn([
            'label' => 'Price',
            'type' => 'number', 
            'name' => 'price',
            'decimals' => 2,
            ]);
        CRUD::addColumn([
            'label' => 'Available',
            'type' => 'boolean', 
            'name' => 'available',
            ]);
        CRUD::addColumn([
            'label' => 'Photo',
            'type' => 'image', 
            'name' => 'photo',
            'disk' => 'public',
            ]);
        CRUD::addColumn([
            'label' => 'Description',
            'type' => 'text', 
            'name' => 'description',
            ]);
        CRUD::addColumn([
            'label' => 'Product Categories',
            'type' => 'select_multiple',
            'name' => 'productCategories',
            'entity' => 'productCategories',
            'attribute' => 'name',
            'model' => 'App\Models\ProductCategory',
            ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ProductRequest::class);

        CRUD::addField([
            'label' => 'Restaurant',
            'type' => 'select',
            'name' => 'restaurant_id',
            'entity' => 'restaurant',
            'attribute' => 'name',
            'model' => 'App\Models\Restaurant',
            ]);
        CRUD::addField([
            'label' => 'Name',
            'type' => 'text', 
            'name' => 'name',
            ]);
        CRUD::addField([
            'label' => 'Price',
            'type' => 'number', 
            'name' => 'price',
            'decimals' => 2,
            ]);
        CRUD::addField([
            'label' => 'Available',
            'type' => 'checkbox', 
            'name' => 'available',
            'default' => true,
            ]);
        CRUD::addField([
            'label' => 'Photo',
            'type' => 'image', 
            'name' => 'photo',
            'disk' => 'public',
            ]);
        CRUD::addField([
            'label' => 'Description',
            'type' => 'text', 
            'name' => 'description',
            ]);
        CRUD::addField([
            'label' => 'Product Categories',
            'type' => 'select2_multiple',
            'name' => 'productCategories',
            'entity' => 'productCategories',
            'attribute' => 'name',
            'model' => 'App\Models\ProductCategory',
            'pivot' => true,
            ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
