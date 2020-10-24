<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RestaurantRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

/**
 * Class RestaurantCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class RestaurantCrudController extends CrudController
{
    use ListOperation, CreateOperation, UpdateOperation, DeleteOperation, ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Restaurant::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/restaurant');
        CRUD::setEntityNameStrings('restaurant', 'restaurants');
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
            'name' => 'user_id',
            'label' => 'User id',
            'type' => 'relationship', 
            ]);
        CRUD::addColumn([
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text', 
            ]);
        CRUD::addColumn([
            'name' => 'email',
            'label' => 'Email',
            'type' => 'email', 
            ]);
        CRUD::addColumn([
            'name' => 'phone',
            'label' => 'Phone',
            'type' => 'phone', 
            ]);
        CRUD::addColumn([
            'name' => 'photo',
            'label' => 'Photo',
            'type' => 'image', 
            ]);
        CRUD::addColumn([
            'name' => 'address',
            'label' => 'Address',
            'type' => 'text', 
            ]);
        CRUD::addColumn([
            'name' => 'postal_code',
            'label' => 'ZIP Code',
            'type' => 'text', 
            ]);
        CRUD::addColumn([
            'name' => 'city',
            'label' => 'City',
            'type' => 'text', 
            ]);
        CRUD::addColumn([
            'name' => 'state',
            'label' => 'State',
            'type' => 'text', 
            ]);
        CRUD::addColumn([
            'name' => 'country',
            'label' => 'Country',
            'type' => 'text', 
            ]);
        CRUD::addColumn([
            'name' => 'cif',
            'label' => 'Cif',
            'type' => 'number', 
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
        CRUD::setValidation(RestaurantRequest::class);

        CRUD::addField([
            'name' => 'user_id',
            'label' => 'User id',
            'type' => 'number', 
            ]);
        CRUD::addField([
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text', 
            ]);
        CRUD::addField([
            'name' => 'email',
            'label' => 'Email',
            'type' => 'text', 
            ]);
        CRUD::addField([
            'name' => 'phone',
            'label' => 'Phone',
            'type' => 'phone', 
            ]);
        CRUD::addField([
            'name' => 'photo',
            'label' => 'Photo',
            'type' => 'image', 
            ]);
        CRUD::addField([
            'name' => 'address',
            'label' => 'Address',
            'type' => 'text', 
            ]);
        CRUD::addField([
            'name' => 'postal_code',
            'label' => 'ZIP Code',
            'type' => 'text', 
            ]);
        CRUD::addField([
            'name' => 'city',
            'label' => 'City',
            'type' => 'text', 
            ]);
        CRUD::addField([
            'name' => 'state',
            'label' => 'State',
            'type' => 'text', 
            ]);
        CRUD::addField([
            'name' => 'country',
            'label' => 'Country',
            'type' => 'text', 
            ]);
        CRUD::addField([
            'name' => 'cif',
            'label' => 'Cif',
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
