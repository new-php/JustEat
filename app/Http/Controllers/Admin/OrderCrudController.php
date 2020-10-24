<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrderRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class OrderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class OrderCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

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
        CRUD::column([
            'name' => 'user_id',
            'label' => 'User id',
            'type' => 'relationship', 
            ]);
        CRUD::column([
            'name' => 'address_id',
            'label' => 'Address id',
            'type' => 'relationship', 
            ]);
        CRUD::column([
            'name' => 'restaurant_id',
            'label' => 'Restaurant id',
            'type' => 'relationship', 
            ]);
        CRUD::column([
            'name' => 'details',
            'label' => 'Details',
            'type' => 'text', 
            ]);
        CRUD::column([
            'name' => 'shipping',
            'label' => 'Shipping',
            'type' => 'text', 
            ]);
        CRUD::column([
            'name' => 'total',
            'label' => 'Total',
            'type' => 'text', 
            ]);
        CRUD::column([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'text', 
            ]);
        CRUD::column([
            'name' => 'rider_id',
            'label' => 'Rider id',
            'type' => 'number', 
            ]);
        CRUD::column([
            'name' => 'delivery_mode',
            'label' => 'Delivery mode',
            'type' => 'text', 
            ]);
        /*CRUD::column([
           // n-n relationship (with pivot table)
           'label'     => 'Roles', // Table column heading
           'type'      => 'select_multiple',
           'name'      => 'roles', // the method that defines the relationship in your Model
           'entity'    => 'roles', // the method that defines the relationship in your Model
           'attribute' => 'name', // foreign key attribute that is shown to user
           'model'     => 'App\Models\Roles', // foreign key model
        ]);*/

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
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

        CRUD::field([
            'name' => 'user_id',
            'label' => 'User id',
            'type' => 'number', 
            ]);
        CRUD::field([
            'name' => 'address_id',
            'label' => 'Address id',
            'type' => 'number', 
            ]);
        CRUD::field([
            'name' => 'restaurant_id',
            'label' => 'Restaurant id',
            'type' => 'number', 
            ]);
        CRUD::field([
            'name' => 'details',
            'label' => 'Details',
            'type' => 'text', 
            ]);
        CRUD::field([
            'name' => 'shipping',
            'label' => 'Shipping',
            'type' => 'number', 
            'decimals' => 2,
            ]);
        CRUD::field([
            'name' => 'total',
            'label' => 'Total',
            'type' => 'number', 
            'decimals' => 2,
            ]);
        CRUD::field([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'select2_from_array', 
            'options' => ['received' => 'Received', 'delivered' => 'Delivered'],

            ]);
        CRUD::field([
            'name' => 'rider_id',
            'label' => 'Rider id',
            'type' => 'number', 
            ]);
        CRUD::field([
            'name' => 'delivery_mode',
            'label' => 'Delivery mode',
            'type' => 'select2_from_array', 
            'options' => ['pick_up' => 'Pick-up', 'home_delivery' => 'Home delivery'],
            ]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
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
