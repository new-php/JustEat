<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrderItemRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

/**
 * Class OrderItemCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class OrderItemCrudController extends CrudController
{
    use ListOperation, CreateOperation, UpdateOperation, DeleteOperation, ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\OrderItem::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/orderitem');
        CRUD::setEntityNameStrings('orderitem', 'order_items');
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
            'label' => 'Order',
            'type' => 'select', 
            'name' => 'order_id',
            'entity' => 'order',
            'attribute' => 'id',
            'model' => 'App\Models\Order',
            ]);
        CRUD::addColumn([
            'label' => 'Product',
            'type' => 'select',
            'name' => 'product_id',
            'entity' => 'product',
            'attribute' => 'name',
            'model' => 'App\Models\Product',
            ]);
        CRUD::addColumn([
            'label' => 'Quantity',
            'type' => 'number', 
            'name' => 'quantity',
            ]);
        CRUD::addColumn([
            'label' => 'Price',
            'type' => 'number', 
            'name' => 'price',
            'decimals' => 2,
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
        CRUD::setValidation(OrderItemRequest::class);

        CRUD::addField([
            'label' => 'Order',
            'type' => 'select', 
            'name' => 'order_id',
            'entity' => 'order',
            'attribute' => 'id',
            'model' => 'App\Models\Order',
            ]);
        CRUD::addField([
            'label' => 'Product',
            'type' => 'select',
            'name' => 'product_id',
            'entity' => 'product',
            'attribute' => 'name',
            'model' => 'App\Models\Product',
            ]);
        CRUD::addField([
            'name' => 'quantity',
            'label' => 'Quantity',
            'type' => 'number', 
            ]);
        CRUD::addField([
            'name' => 'price',
            'label' => 'Price',
            'type' => 'number', 
            'decimals' => 2,
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
