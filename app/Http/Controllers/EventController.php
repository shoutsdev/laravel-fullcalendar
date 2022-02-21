<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EventController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $events = Event::all();

            return response()->json($events);
        }

        return view('calendar');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'start' => 'required',
            'end' => 'required'
        ]);

        Event::create($request->all());


        return true;
    }

    public function show(Event $event)
    {
        //
    }

    public function edit(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = [
            'event' => Event::find($request->id),
            'success' => true,
        ];
        return response()->json($data);
    }

    public function update(Request $request, Event $event): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'title' => 'required',
            'start' => 'required',
            'end' => 'required'
        ]);

        $data = [
            'event' => Event::where('id',$request->id)->update($request->all()),
            'success' => true,
        ];
        return response()->json($data);
    }

    public function destroy(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = [
            'event' => Event::destroy($request->id),
            'success' => true,
        ];
        return response()->json($data);
    }
}
