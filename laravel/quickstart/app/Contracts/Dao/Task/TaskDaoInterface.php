<?php

namespace App\Contracts\Dao\Task;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Post
 */
interface TaskDaoInterface
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