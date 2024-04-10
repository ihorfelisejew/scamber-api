<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = Worker::all();
        return response()->json($workers);
    }

    public function show($id)
    {
        $worker = Worker::find($id);
        if (!$worker) {
            return response()->json(['message' => 'Worker not found'], 404);
        }
        return response()->json($worker);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name_of_worker' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'appointment_date' => 'required',
            'date_of_birth' => 'required',
            'position_id' => 'required',
            'showroom_id' => 'required',
            'login' => 'required',
            'password' => 'required',
        ]);

        $worker = Worker::create($request->all());

        return response()->json($worker, 201);
    }

    public function update(Request $request, $id)
    {
        $worker = Worker::find($id);
        if (!$worker) {
            return response()->json(['message' => 'Worker not found'], 404);
        }

        $this->validate($request, [
            'name_of_worker' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'appointment_date' => 'required',
            'date_of_birth' => 'required',
            'position_id' => 'required',
            'showroom_id' => 'required',
            'login' => 'required',
            'password' => 'required',
        ]);

        $worker->update($request->all());

        return response()->json($worker);
    }

    public function destroy($id)
    {
        $worker = Worker::find($id);
        if (!$worker) {
            return response()->json(['message' => 'Worker not found'], 404);
        }

        $worker->delete();

        return response()->json(['message' => 'Worker deleted']);
    }
}
