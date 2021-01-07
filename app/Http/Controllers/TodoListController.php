<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;
use App\Http\Resources\ListResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\ListResourceCollection;

class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ListResourceCollection
     */
    public function index(): ListResourceCollection
    {
        return new ListResourceCollection(TodoList::paginate(10));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return ListResource
     */
    public function store(Request $request)
    {
        //validate the requests
        $request->validate([
            'name' => 'required',
            'user_id' => 'required',
        ]);
        //create the new user
        $todolist = TodoList::create($request->all());
        return new ListResource($todolist);
    }

    /**
     * Display the specified resource.
     *
     * @param  TodoList  $todolist
     * @return ListResource
     */
    public function show(TodoList $todolist): ListResource
    {
        return new ListResource($todolist);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  TodoList  $todolist
     * @return ListResource
     */
    public function update(Request $request, TodoList $todolist): ListResource
    {
        //validate the requests
        $request->validate([
            'name' => 'required',
        ]);
        //update a user
        $todolist->update($request->all());
        return new ListResource($todolist);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  TodoList  $todolist
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(TodoList $todolist)
    {
        $todolist->delete();
        return response()->json();
    }
}
