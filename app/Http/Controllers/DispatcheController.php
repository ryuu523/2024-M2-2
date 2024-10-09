<?php

namespace App\Http\Controllers;

use App\Models\Dispatche;
use App\Models\Worker;
use App\Models\Event;
use Illuminate\Http\Request;

class DispatcheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Dispatche::all()->toArray();
        $event = Event::all()->toArray();
        $worker = Worker::all()->toArray();
        return view("dispatches/dispatche")->with(["data" => $data, "event" => $event, "worker" => $worker]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $event = Event::all()->toArray();
        $worker = Worker::all()->toArray();
        return view("dispatches/dispatche_register")->with(["event" => $event, "worker" => $worker]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            foreach ($request->worker_id as $w_id) {
                $dispatche = new Dispatche();
                $dispatche->event_id = (int) $request->event_id;
                $dispatche->worker_id = (int) $w_id;
                $dispatche->is_approval = false;
                $dispatche->save();
            }
            return redirect()->route("dispatche.create")->with("res", "人材情報が登録されました。");
        } catch (\Throwable $th) {
            return redirect()->route("dispatche.create")->with("res", "エラーが発生しました。");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Dispatche $dispatche)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Dispatche::find($id)->toArray();
        $event = Event::all()->toArray();
        $worker = Worker::all()->toArray();
        return view("/dispatches/dispatche_edit")->with(["data" => $data, "event" => $event, "worker" => $worker]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $dispatche = Dispatche::find($id);
        try {
            $dispatche->update(["dispatche_id" => $id, "event_id" => $request->event_id, "worker_id" => $request->worker_id,]);
            $data = $dispatche->toArray();
            return redirect()->route("dispatche.edit", $id)->with(["data" => $data, "res" => "編集に成功しました"]);
        } catch (\Throwable $th) {

            return redirect()->route("dispatche.edit", $id)->with(["data" => $data, "res" => "編集に失敗しました"]);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dispatche = Dispatche::find($id);
        $dispatche->delete();
        return redirect()->route("dispatche.index");
    }
}
