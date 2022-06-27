<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EventRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class EventCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Event::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/event');
        CRUD::setEntityNameStrings('event', 'events');
    }

    protected function setupListOperation()
    {
        $this->crud->addColumns([
            [
                'name' => 'id',
                'label' => 'ID',
            ],
            [
                'name' => 'image',
                'label' => 'Imagen',
                'type' => 'image',
            ],
            [
                'name' => 'name',
                'label' => 'Nombre',
            ],
            [
                'name' => 'protogems',
                'label' => 'Protogemas',
            ],
            [
                'name' => 'start_date',
                'label' => 'Fecha inicio',
            ],
            [
                'name' => 'end_date',
                'label' => 'Fecha final',
            ],
            [
                'name' => 'active',
                'label' => 'Activo',
                'type'  => 'check'
            ],
        ]);

    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(EventRequest::class);

        $this->crud->addFields([
            [
                'name' => 'name',
                'label' => 'Nombre',
            ],
            [
                'name' => 'image',
                'label' => 'Imagen',
                'type' => 'image',
            ],
            [
                'name' => 'start_date',
                'label' => 'Fecha inicio',
                'type' => 'date'
            ],
            [
                'name' => 'end_date',
                'label' => 'Fecha final',
                'type' => 'date'
            ],
            [
                'name' => 'protogems',
                'label' => 'Protogemas',
                'type' => 'number',
                'default' => 0
            ],
            [
                'name' => 'active',
                'label' => 'Activo',
                'type'  => 'checkbox'
            ],
        ]);

    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
