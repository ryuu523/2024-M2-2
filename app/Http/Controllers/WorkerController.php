<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Worker::all()->toArray();
        return view("workers/worker")->with("data", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("workers/worker_register");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $worker = new Worker();
            $worker->name = $request->name;
            $worker->email = $request->email;
            $worker->password =Hash::make($request->password) ;
            $worker->save();
            return redirect()->route("worker.create")->with("res", "人材情報が登録されました。");
        } catch (\Throwable $th) {
            return redirect()->route("worker.create")->with("res", "エラーが発生しました。");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Worker $worker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Worker::find($id)->toArray();
        return view("/workers/worker_edit")->with("data", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $worker = Worker::find($id);
        try {
            $worker->update(["worker_id" => $id, "name" => $request->name, "email" => $request->email, "password" => Hash::make($request->password) ]);
            $data = $worker->toArray();
            return redirect()->route("worker.edit", $id)->with(["data" => $data, "res" => "編集に成功しました"]);
        } catch (\Throwable $th) {
            return redirect()->route("worker.edit", $id)->with(["data" => $data, "res" => "編集に失敗しました"]);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $worker = Worker::find($id);
        $worker->delete();
        return redirect()->route("worker.index");

    }
}
