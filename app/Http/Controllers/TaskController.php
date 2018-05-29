<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTaskRequest $request)
    {
        $task = Task::create($request->all());
        if ($task) {
            return $this->sendResponse($task, trans('task.messages.create.success'));
        } else {
            return $this->sendError(trans('task.messages.create.failed'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        if ($task) {
            return $this->sendResponse($task, trans('task.messages.read.success'));
        } else {
            return $this->sendError(trans('task.messages.read.failed'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        if ($task) {
            return $this->sendResponse($task, trans('task.messages.read.success'));
        } else {
            return $this->sendError(trans('task.messages.read.failed'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Task $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        if ($task && $task->update($request->all())) {
            return $this->sendResponse($task, trans('task.messages.update.success'));
        } else {
            return $this->sendError(trans('task.messages.update.failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task $task
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Task $task)
    {
        if ($task && $task->delete()) {
            return $this->sendResponse($task, trans('task.messages.update.success'));
        } else {
            return $this->sendError(trans('task.messages.update.failed'));
        }
    }
}
