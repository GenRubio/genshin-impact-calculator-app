<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Repositories\Event\EventRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class EventService
 * @package App\Services\Event
 */
class EventService extends Controller
{
    private $eventRepository;
    /**
     * EventService constructor.
     * @param Event $Event
     */
    public function __construct()
    {
        $this->eventRepository = new EventRepository();
    }

    public function getCurrent()
    {
        return $this->eventRepository->getCurrent();
    }
}
