<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * @middleware(App\Http\Middleware\CorsMiddleware::class)
     */
     
  public function getevents()
  {
   
    $events = Event::all()->toArray();
    return response()->json($events);
  }
  public function geteventbyid($id)
    {
        $events =  Event::where('id', $id)->get()->toArray();

        if (count($events) > 0) {

            array_walk_recursive($events, function (&$item) {
                $item = null === $item ? '' : $item;
            });

            return response()->json(['data' => $events], 200);
        } else {
            return response()->json(['message' => 'No events found'], 200);
        }
    }
    public function index()
    {
        $events = Event::all()->toArray();
        return response()->json($events);

    }
}
