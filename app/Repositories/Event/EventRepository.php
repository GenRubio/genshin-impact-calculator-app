<?php

namespace App\Repositories\Event;

use App\Models\Event;
use App\Repositories\Repository;
use Illuminate\Support\Facades\Hash;

/**
 * Class EventRepository
 * @package App\Repositories\Event
 */
class EventRepository extends Repository implements EventRepositoryInterface
{
    /**
     * @var Event
     */
    protected $model;

    /**
     * EventRepository constructor.
     */
    public function __construct()
    {
        $this->model = new Event();
        parent::__construct($this->model);
    }

    public function getCurrent()
    {
        return $this->model->current()->get();
    }
}
