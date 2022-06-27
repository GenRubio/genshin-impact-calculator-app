<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BannerRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class BannerCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Banner::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/banner');
        CRUD::setEntityNameStrings('banner', 'banners');
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
                'name' => 'start_date',
                'label' => 'Fecha inicio',
            ],
            [
                'name' => 'end_date',
                'label' => 'Fecha final',
            ],
            [
                'name' => 'daily_quests_protogems',
                'label' => 'Misiones diarias protos',
            ],
            [
                'name' => 'lunar_blessing_protogems',
                'label' => 'Bendición Lunar  protos',
            ],
            [
                'name' => 'test_banner_characters_protogems',
                'label' => 'Banner prueba personajes protos',
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
        CRUD::setValidation(BannerRequest::class);

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
