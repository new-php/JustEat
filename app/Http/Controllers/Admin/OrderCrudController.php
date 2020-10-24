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
            'name' => 'user_id',
            'label' => 'User id',
            'type' => 'relationship', 
            ]);
        CRUD::addColumn([
            'name' => 'address_id',
            'label' => 'Address id',
            'type' => 'relationship', 
            ]);
        CRUD::addColumn([
            'name' => 'restaurant_id',
            'label' => 'Restaurant id',
            'type' => 'relationship', 
            ]);
        CRUD::addColumn([
            'name' => 'details',
            'label' => 'Details',
            'type' => 'text', 
            ]);
        CRUD::addColumn([
            'name' => 'shipping',
            'label' => 'Shipping',
            'type' => 'text', 
            ]);
        CRUD::addColumn([
            'name' => 'total',
            'label' => 'Total',
            'type' => 'text', 
            ]);
        CRUD::addColumn([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'text', 
            ]);
        CRUD::addColumn([
            'name' => 'rider_id',
            'label' => 'Rider id',
            'type' => 'number', 
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
            'name' => 'user_id',
            'label' => 'User id',
            'type' => 'number', 
            ]);
        CRUD::addField([
            'name' => 'address_id',
            'label' => 'Address id',
            'type' => 'number', 
            ]);
        CRUD::addField([
            'name' => 'restaurant_id',
            'label' => 'Restaurant id',
            'type' => 'number', 
            ]);
        CRUD::addField([
            'name' => 'details',
            'label' => 'Details',
            'type' => 'text', 
            ]);
        CRUD::addField([
            'name' => 'shipping',
            'label' => 'Shipping',
            'type' => 'number', 
            'decimals' => 2,
            ]);
        CRUD::addField([
            'name' => 'total',
            'label' => 'Total',
            'type' => 'number', 
            'decimals' => 2,
            ]);
        CRUD::addField([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'select2_from_array', 
            'options' => ['received' => 'Received', 'delivered' => 'Delivered'],

            ]);
        CRUD::addField([
            'name' => 'rider_id',
            'label' => 'Rider id',
            'type' => 'number', 
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
