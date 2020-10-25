<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrderRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

/**
 * Class OrderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class OrderCrudController extends CrudController
{
    use ListOperation, CreateOperation, UpdateOperation, DeleteOperation, ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Order::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/order');
        CRUD::setEntityNameStrings('order', 'orders');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
/**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn([
            'label' => 'User',
            'type' => 'select',
            'name' => 'user_id',
            'entity' => 'user',
            'attribute' => 'email',
            'model' => 'App\Models\User', 
            ]);
        CRUD::addColumn([
            'label' => 'Address',
            'type' => 'select', 
            'name' => 'address_id',
            'entity' => 'address',
            'attribute' => 'address_name',
            'model' => 'App\Models\Address',
            ]);
        CRUD::addColumn([
            'label' => 'Restaurant',
            'type' => 'select', 
            'name' => 'restaurant_id',
            'entity' => 'restaurant',
            'attribute' => 'name',
            'model' => 'App\Models\Restaurant',
            ]);
        CRUD::addColumn([
            'name' => 'details',
            'label' => 'Details',
            'type' => 'text', 
            ]);
        CRUD::addColumn([
            'label' => 'Shipping',
            'type' => 'number',
            'name' => 'shipping',
            'decimals' => 2,
            ]);
        CRUD::addColumn([
            'label' => 'Total',
            'type' => 'number',
            'name' => 'total',
            'decimals' => 2, 
            ]);
        CRUD::addColumn([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'text', 
            ]);
        CRUD::addColumn([
            'label' => 'Rider id',
            'type' => 'select', 
            'name' => 'rider_id',
            'entity' => 'rider',
            'attribute' => 'name',
            'model' => 'App\Models\User',
            ]);
        CRUD::addColumn([
            'name' => 'delivery_mode',
            'label' => 'Delivery mode',
            'type' => 'text', 
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
        CRUD::setValidation(OrderRequest::class);

        CRUD::addField([
            'label' => 'User',
            'type' => 'select2',
            'name' => 'user_id',
            'entity' => 'user',
            'attribute' => 'email',
            'model' => 'App\Models\User', 
            ]);
        CRUD::addField([
            'label' => 'Address',
            'type' => 'select2', 
            'name' => 'address_id',
            'entity' => 'address',
            'attribute' => 'address_name',
            'model' => 'App\Models\Address',
            ]);
        CRUD::addField([
            'label' => 'Restaurant',
            'type' => 'select2', 
            'name' => 'restaurant_id',
            'entity' => 'restaurant',
            'attribute' => 'name',
            'model' => 'App\Models\Restaurant',
            ]);
        CRUD::addField([
            'name' => 'details',
            'label' => 'Details',
            'type' => 'text', 
            ]);
        CRUD::addField([
            'label' => 'Shipping',
            'type' => 'number',
            'name' => 'shipping',
            'decimals' => 2,
            ]);
        CRUD::addField([
            'label' => 'Total',
            'type' => 'number',
            'name' => 'total',
            'decimals' => 2, 
            ]);
        CRUD::addField([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'select2_from_array', 
            'options' => ['error' => 'Error', 'cancelled' => 'Cancelled', 'received' => 'Received', 'preparing' => 'Preparing', 'prepared' => 'Prepared', 'picked' => 'Picked', 'delivered' => 'Delivered'],

            ]);
        CRUD::addField([
            'label' => 'Rider id',
            'type' => 'select', 
            'name' => 'rider_id',
            'entity' => 'rider',
            'attribute' => 'name',
            'model' => 'App\Models\User',
            ]);
        CRUD::addField([
            'name' => 'delivery_mode',
            'label' => 'Delivery mode',
            'type' => 'select2_from_array', 
            'options' => ['pick_up' => 'Pick-up', 'home_delivery' => 'Home delivery'],
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
