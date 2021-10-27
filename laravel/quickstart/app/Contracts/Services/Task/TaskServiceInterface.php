<?php

namespace App\Contracts\Services\Task;
use Illuminate\Http\Request;

/**
 * Interface for task service
 */
interface TaskServiceInterface
{
    /**
     * To get task list
     * @return taskList
     */
    public function getTask();

    /**
     * To save task
     * @param object $request Validated values from request
     * @return Object created task object
     */
    public function addTask($request);

    /**
     * To delete task
     * @param string $id task id
     * @return 
     */
    public function deleteTask($id);
}