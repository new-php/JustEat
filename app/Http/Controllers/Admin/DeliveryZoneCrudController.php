<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DeliveryZoneRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

/**
 * Class DeliveryZoneCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DeliveryZoneCrudController extends CrudController
{
    use ListOperation, CreateOperation, UpdateOperation, DeleteOperation, ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\DeliveryZone::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/deliveryzone');
        CRUD::setEntityNameStrings('deliveryzone', 'delivery_zones');
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
            'label' => 'ZIP Code',
            'type' => 'text',
            'name' => 'postal_code',
            ]);
        CRUD::addColumn([
            'label' => 'Min order price',
            'type' => 'number',
            'name' => 'min_order_price',
            ]);
        CRUD::addColumn([
            'label' => 'Delivery price',
            'type' => 'number',
            'name' => 'delivery_price',
            ]);
        CRUD::addColumn([
            'label' => 'Delivery time',
            'type' => 'number',
            'name' => 'delivery_time',
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
        CRUD::setValidation(DeliveryZoneRequest::class);

        CRUD::addField([
            'label' => 'Restaurant',
            'type' => 'select2',
            'name' => 'restaurant_id',
            'entity' => 'restaurant',
            'attribute' => 'name',
            'model' => 'App\Models\Restaurant',
            ]);
        CRUD::addField([
            'name' => 'postal_code',
            'label' => 'ZIP Code',
            'type' => 'text',
            ]);
        CRUD::addField([
            'name' => 'min_order_price',
            'label' => 'Min order price',
            'type' => 'number',
            ]);
        CRUD::addField([
            'name' => 'delivery_price',
            'label' => 'Delivery price',
            'type' => 'number',
            'attributes' => ["step" => "any"],
            ]);
        CRUD::addField([
            'name' => 'delivery_time',
            'label' => 'Delivery time',
            'type' => 'number',
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
