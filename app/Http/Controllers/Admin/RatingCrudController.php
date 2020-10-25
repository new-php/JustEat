<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RatingRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

/**
 * Class RatingCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class RatingCrudController extends CrudController
{
    use ListOperation, CreateOperation, UpdateOperation, DeleteOperation, ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Rating::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/rating');
        CRUD::setEntityNameStrings('rating', 'ratings');
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
            'label' => 'Restaurant',
            'type' => 'select', 
            'name' => 'restaurant_id',
            'entity' => 'restaurant',
            'attribute' => 'name',
            'model' => 'App\Models\Restaurant',
            ]);
        CRUD::addColumn([
            'label' => 'Score',
            'type' => 'number',
            'name' => 'score',
            'decimals' => 1, 
            ]);
        CRUD::addColumn([
            'label' => 'Comments',
            'type' => 'text', 
            'name' => 'comments',
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
        CRUD::setValidation(RatingRequest::class);

        CRUD::addField([
            'label' => 'User',
            'type' => 'select2',
            'name' => 'user_id',
            'entity' => 'user',
            'attribute' => 'email',
            'model' => 'App\Models\User',
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
            'name' => 'score',
            'label' => 'Score',
            'type' => 'number', 
            'attributes' => ["step" => "any"]
            ]);
        CRUD::addField([
            'name' => 'comments',
            'label' => 'Comments',
            'type' => 'text', 
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
