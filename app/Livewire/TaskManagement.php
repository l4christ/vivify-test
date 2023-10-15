<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Livewire\Attributes\Rule;

class TaskManagement extends Component
{
    public $task_id;
    
    #[Rule('required|min:3')]
    public $title;
   
    #[Rule('required|string|min:3')]
    public $description;
    
    #[Rule('required|string|min:3')]
    public $status;

    public function render()
    {
        return view('livewire.task-management', ['tasks' => Task::query()->paginate(5)]);
    }

    /**
     * Open new task modal
     *
     * @return void
     */
    public function newTaskModal(): void
    {
        $this->title = '';
        $this->description = '';
        $this->status = '';
        $this->task_id = '';
        $this->dispatch('open-modal', 'new-task');
    }

    /**
     * Create New Task
     *
     * @return void
     */
    public function createNewTask()
    {
        $this->validate();
        Task::create([
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status
        ]);
        $this->dispatch('close-modal', 'new-task');
    }
    
    /**
     * viewTask
     *
     * @param  mixed $task
     * @return void
     */
    public function viewTask(Task $task)
    {
        $this->dispatch('open-modal', 'view-task');
        $this->title = $task->title;
        $this->description = $task->description;
        $this->status = $task->status;
    }
    
    /**
     * editTask
     *
     * @param  mixed $task
     * @return void
     */
    public function editTask(Task $task)
    {
        $this->dispatch('open-modal', 'edit-task');
        $this->title = $task->title;
        $this->description = $task->description;
        $this->status = $task->status;
        $this->task_id = $task->id;
    }
}
