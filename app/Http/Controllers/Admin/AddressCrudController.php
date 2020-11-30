<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddressRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
/**
 * Class AddressCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AddressCrudController extends CrudController
{
    use ListOperation, CreateOperation, UpdateOperation, DeleteOperation, ShowOperation;

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
            'label' => 'Address name',
            'type' => 'text',
            'name' => 'address_name',
            ]);
        CRUD::addColumn([
            'label' => 'Phone',
            'type' => 'text',
            'name' => 'phone',
            ]);
        CRUD::addColumn([
            'label' => 'Address line 1',
            'type' => 'text',
            'name' => 'address_line_1',
            ]);
        CRUD::addColumn([
            'label' => 'Address line 2',
            'type' => 'text',
            'name' => 'address_line_2',
            ]);
        CRUD::addColumn([
            'label' => 'Observations',
            'type' => 'text',
            'name' => 'observations',
            ]);
        CRUD::addColumn([
            'label' => 'City',
            'type' => 'text',
            'name' => 'city',
            ]);
        CRUD::addColumn([
            'label' => 'ZIP Code',
            'type' => 'number',
            'name' => 'text',
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
        CRUD::setValidation(AddressRequest::class);

        CRUD::addField([
            'label' => 'User',
            'type' => 'select2',
            'name' => 'user_id',
            'entity' => 'user',
            'attribute' => 'email',
            'model' => 'App\Models\User',
        ]);
        CRUD::addField([
            'label' => 'Address name',
            'type' => 'text',
            'name' => 'address_name',
            ]);
        CRUD::addField([
            'label' => 'Name',
            'type' => 'text',
            'name' => 'name',
            ]);
        CRUD::addField([
            'label' => 'Phone',
            'type' => 'text',
            'name' => 'phone',
        ]);
        CRUD::addField([
            'label' => 'Address line 1',
            'type' => 'text',
            'name' => 'address_line_1',
            ]);
        CRUD::addField([
            'label' => 'Address line 2',
            'type' => 'text',
            'name' => 'address_line_2',
            ]);
        CRUD::addField([
            'label' => 'Observations',
            'type' => 'text',
            'name' => 'observations',
            ]);
        CRUD::addField([
            'label' => 'City',
            'type' => 'text',
            'name' => 'city',
            ]);
        CRUD::addField([
            'label' => 'ZIP Code',
            'type' => 'number',
            'name' => 'text',
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
