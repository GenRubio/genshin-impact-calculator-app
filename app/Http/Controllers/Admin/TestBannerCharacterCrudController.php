<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TestBannerCharacterRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class TestBannerCharacterCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\TestBannerCharacter::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/test-banner-character');
        CRUD::setEntityNameStrings('test character', 'test characters');
    }

    protected function setupListOperation()
    {
        $this->crud->addColumns([
            [
                'name' => 'banner',
                'type' => 'relationship',
                'label' => 'Banner',
            ],
            [
                'name' => 'protogems',
                'label' => 'Protogemas',
                'type' => 'number',
            ],
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(TestBannerCharacterRequest::class);

        $this->crud->addFields([
            [
                'label'     => "Banner",
                'type'      => 'select2',
                'name'      => 'banner_id',
                'entity'    => 'banner',
                'model'     => "App\Models\Banner",
                'attribute' => 'name',
            ],
            [
                'name' => 'protogems',
                'label' => 'Protogemas',
                'type' => 'number',
                'default' => 20
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
