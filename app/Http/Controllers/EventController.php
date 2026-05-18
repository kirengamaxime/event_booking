<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

  public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'date' => 'required',
        'location' => 'required',
        'max_attendees' => 'required|integer',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $data = $request->all();

    // ✅ SAVE IMAGE TO public/images
    if ($request->hasFile('image')) {

        $image = $request->file('image');

        // unique filename
        $imageName = time() . '_' . $image->getClientOriginalName();

        // move image
        $image->move(public_path('images'), $imageName);

        // save filename in database
        $data['image'] = $imageName;
    }

    Event::create($data);

    return redirect()->route('events.index')
        ->with('success', 'Event created!');
}

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    // ✅ EDIT
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    // ✅ UPDATE
   public function update(Request $request, Event $event)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'date' => 'required',
        'location' => 'required',
        'max_attendees' => 'required|integer',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $data = $request->all();

    // ✅ SAVE IMAGE TO public/images
    if ($request->hasFile('image')) {

        $image = $request->file('image');

        // unique filename
        $imageName = time() . '_' . $image->getClientOriginalName();

        // move image
        $image->move(public_path('images'), $imageName);

        // save filename in database
        $data['image'] = $imageName;
    }

    $event->update($data);

    return redirect()->route('events.index')
        ->with('success', 'Event updated!');
}

    // ✅ DELETE
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted!');
    }
}