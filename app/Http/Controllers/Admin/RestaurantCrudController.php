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
            'label' => 'User',
            'type' => 'select', 
            'name' => 'user_id',
            'entity' => 'user',
            'attribute' => 'email',
            'model' => 'App\Models\User',
            ]);
        CRUD::addColumn([
            'label' => 'Name',
            'type' => 'text', 
            'name' => 'name',
            ]);
        CRUD::addColumn([
            'label' => 'Email',
            'type' => 'email', 
            'name' => 'email',
            ]);
        CRUD::addColumn([
            'label' => 'Phone',
            'type' => 'phone', 
            'name' => 'phone',
            ]);
        CRUD::addColumn([
            'label' => 'Photo',
            'type' => 'image', 
            'name' => 'photo',
            'disk' => 'public',
            ]);
        CRUD::addColumn([
            'label' => 'Address',
            'type' => 'text', 
            'name' => 'address',
            ]);
        CRUD::addColumn([
            'label' => 'ZIP Code',
            'type' => 'number', 
            'name' => 'postal_code',
            ]);
        CRUD::addColumn([
            'label' => 'City',
            'type' => 'text', 
            'name' => 'city',
            ]);
        CRUD::addColumn([
            'label' => 'State',
            'type' => 'text', 
            'name' => 'state',
            ]);
        CRUD::addColumn([
            'label' => 'Country',
            'type' => 'text', 
            'name' => 'country',
            ]);
        CRUD::addColumn([
            'label' => 'Cif',
            'type' => 'text', 
            'name' => 'cif',
            ]);
        CRUD::addColumn([
            'label' => 'Categories',
            'type' => 'select_multiple',
            'name' => 'categories',
            'entity' => 'categories',
            'attribute' => 'name',
            'model' => 'App\Models\Category',
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
            'label' => 'User',
            'type' => 'select2', 
            'name' => 'user_id',
            'entity' => 'user',
            'attribute' => 'email',
            'model' => 'App\Models\User',
            ]);
        CRUD::addField([
            'label' => 'Name',
            'type' => 'text', 
            'name' => 'name',
            ]);
        CRUD::addField([
            'label' => 'Email',
            'type' => 'email', 
            'name' => 'email',
            ]);
        CRUD::addField([
            'label' => 'Phone',
            'type' => 'text', 
            'name' => 'phone',
            ]);
        CRUD::addField([
            'label' => 'Photo',
            'type' => 'image', 
            'name' => 'photo',
            'disk' => 'public',
            ]);
        CRUD::addField([
            'label' => 'Address',
            'type' => 'text', 
            'name' => 'address',
            ]);
        CRUD::addField([
            'label' => 'ZIP Code',
            'type' => 'number', 
            'name' => 'postal_code',
            ]);
        CRUD::addField([
            'label' => 'City',
            'type' => 'text', 
            'name' => 'city',
            ]);
        CRUD::addField([
            'label' => 'State',
            'type' => 'text', 
            'name' => 'state',
            ]);
        CRUD::addField([
            'label' => 'Country',
            'type' => 'text', 
            'name' => 'country',
            ]);
        CRUD::addField([
            'label' => 'Cif',
            'type' => 'text', 
            'name' => 'cif',
            ]);
        CRUD::addField([
            'label' => 'Categories',
            'type' => 'select2_multiple',
            'name' => 'categories',
            'entity' => 'categories',
            'attribute' => 'name',
            'model' => 'App\Models\Category',
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
