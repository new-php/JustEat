<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RestaurantRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class RestaurantCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class RestaurantCrudController extends CrudController
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
        CRUD::column([
            'name' => 'user_id',
            'label' => 'User id',
            'type' => 'relationship', 
            ]);
        CRUD::column([
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text', 
            ]);
        CRUD::column([
            'name' => 'email',
            'label' => 'Email',
            'type' => 'email', 
            ]);
        CRUD::column([
            'name' => 'phone',
            'label' => 'Phone',
            'type' => 'phone', 
            ]);
        CRUD::column([
            'name' => 'photo',
            'label' => 'Photo',
            'type' => 'image', 
            ]);
        CRUD::column([
            'name' => 'address',
            'label' => 'Address',
            'type' => 'text', 
            ]);
        CRUD::column([
            'name' => 'postal_code',
            'label' => 'ZIP Code',
            'type' => 'text', 
            ]);
        CRUD::column([
            'name' => 'city',
            'label' => 'City',
            'type' => 'text', 
            ]);
        CRUD::column([
            'name' => 'state',
            'label' => 'State',
            'type' => 'text', 
            ]);
        CRUD::column([
            'name' => 'country',
            'label' => 'Country',
            'type' => 'text', 
            ]);
        CRUD::column([
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

        CRUD::field([
            'name' => 'user_id',
            'label' => 'User id',
            'type' => 'number', 
            ]);
        CRUD::field([
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text', 
            ]);
        CRUD::field([
            'name' => 'email',
            'label' => 'Email',
            'type' => 'text', 
            ]);
        CRUD::field([
            'name' => 'phone',
            'label' => 'Phone',
            'type' => 'phone', 
            ]);
        CRUD::field([
            'name' => 'photo',
            'label' => 'Photo',
            'type' => 'image', 
            ]);
        CRUD::field([
            'name' => 'address',
            'label' => 'Address',
            'type' => 'text', 
            ]);
        CRUD::field([
            'name' => 'postal_code',
            'label' => 'ZIP Code',
            'type' => 'text', 
            ]);
        CRUD::field([
            'name' => 'city',
            'label' => 'City',
            'type' => 'text', 
            ]);
        CRUD::field([
            'name' => 'state',
            'label' => 'State',
            'type' => 'text', 
            ]);
        CRUD::field([
            'name' => 'country',
            'label' => 'Country',
            'type' => 'text', 
            ]);
        CRUD::field([
            'name' => 'cif',
            'label' => 'Cif',
            'type' => 'number', 
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
