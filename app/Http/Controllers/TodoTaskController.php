<?php

namespace App\Http\Controllers;

use App\Models\TodoTask;
use Illuminate\Http\Request;
use App\Http\Resources\TaskResource;
use App\Http\Resources\TaskResourceCollection;

class TodoTaskController extends Controller
{
    /**
     * Display a tasking of the resource.
     *
     * @return TaskResourceCollection
     */
    public function index(): TaskResourceCollection
    {
        return new TaskResourceCollection(TodoTask::paginate(10));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return TaskResource
     */
    public function store(Request $request)
    {
        //validate the requests
        $request->validate([
            'name' => 'required',
            'todo_list_id' => 'required',
        ]);
        //create the new user
        $todotask = TodoTask::create($request->all());
        return new TaskResource($todotask);
    }

    /**
     * Display the specified resource.
     *
     * @param  TodoTask  $todotask
     * @return TaskResource
     */
    public function show(TodoTask $todotask): TaskResource
    {
        return new TaskResource($todotask);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  TodoTask  $todotask
     * @return TaskResource
     */
    public function update(Request $request, TodoTask $todotask): TaskResource
    {
        //validate the requests
        $request->validate([
            'name' => 'required',
            'todo_list_id' => 'required',
        ]);
        //update a user
        $todotask->update($request->all());
        return new TaskResource($todotask);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  TodoTask  $todotask
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(TodoTask $todotask)
    {
        $todotask->delete();
        return response()->json();
    }
}
