<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Event::all()->toArray();
        return view("events/event")->with("data", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("events/event_register");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $event = new Event();
            $event->name = $request->name;
            $event->place = $request->place;
            $event->open_date = $request->open_date;
            $event->save();
            return redirect()->route("event.create")->with("res", "イベント情報が登録されました。");
        } catch (\Throwable $th) {
            return redirect()->route("event.create")->with("res", "エラーが発生しました。");
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Event::find($id)->toArray();
        return view("/events/event_edit")->with("data", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        try {
            $event->update(["event_id" => $id, "name" => $request->name, "place" => $request->place, "open_date" => $request->open_date]);
            $data = $event->toArray();
            return redirect()->route("event.edit", $id)->with(["data" => $data, "res" => "編集に成功しました"]);
        } catch (\Throwable $th) {
            return redirect()->route("event.edit", $id)->with(["data" => $data, "res" => "編集に失敗しました"]);

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $event = Event::find($id);
        $event->delete();
        return redirect()->route("event.index");

    }
}
