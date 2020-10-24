<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddressRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class AddressCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AddressCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Address::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/address');
        CRUD::setEntityNameStrings('address', 'addresses');
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
            'name' => 'address_name',
            'label' => 'Address name',
            'type' => 'text', 
            ]);
        CRUD::column([
            'name' => 'address_line_1',
            'label' => 'Address line 1',
            'type' => 'text', 
            ]);
        CRUD::column([
            'name' => 'address_line_2',
            'label' => 'Address line 2',
            'type' => 'text', 
            ]);
        CRUD::column([
            'name' => 'observations',
            'label' => 'Observations',
            'type' => 'text', 
            ]);
        CRUD::column([
            'name' => 'city',
            'label' => 'City',
            'type' => 'text', 
            ]);
        CRUD::column([
            'name' => 'postal_code',
            'label' => 'ZIP Code',
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
        CRUD::setValidation(AddressRequest::class);

        CRUD::field([
            'name' => 'address_name',
            'label' => 'Address name',
            'type' => 'text', 
            ]);
        CRUD::field([
            'name' => 'address_line_1',
            'label' => 'Address line 1',
            'type' => 'text', 
            ]);
        CRUD::field([
            'name' => 'address_line_2',
            'label' => 'Address line 2',
            'type' => 'text', 
            ]);
        CRUD::field([
            'name' => 'observations',
            'label' => 'Observations',
            'type' => 'text', 
            ]);
        CRUD::field([
            'name' => 'city',
            'label' => 'City',
            'type' => 'text', 
            ]);
        CRUD::field([
            'name' => 'postal_code',
            'label' => 'ZIP Code',
            'type' => 'text', 
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
