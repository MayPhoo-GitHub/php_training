<?php

namespace App\Services\Task;

use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Contracts\Services\Task\TaskServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Service class for task.
 */
class TaskService implements TaskServiceInterface
{
    /**
     * post dao
     */
    private $taskDao;
    /**
     * Class Constructor
     * @param TaskDaoInterface
     * @return
     */
    public function __construct(TaskDaoInterface $taskDao)
    {
        $this->taskDao = $taskDao;
    }

    /**
     * To get task list
     * @return taskList
     */
    public function getTask() {
        return $this->taskDao->getTask();
    }

    /**
     * To save task
     * @param object $request request value to validate
     * @return Object created task object
     */
    public function addTask($request) {
        return $this->taskDao->addTask($request);
    }

    /**
     * To delete task
     * @param string $id task id
     * @return 
     */
    public function deleteTask($id) {
        $this->taskDao->deleteTask($id);
    }
}