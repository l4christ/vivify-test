<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;

class TaskManagement extends Component
{
    use WithPagination;
    public $task_id, $search;
    
    #[Rule('required|min:3')]
    public $title;
   
    #[Rule('required|string|min:3')]
    public $description;
    
    #[Rule('required|string|min:3')]
    public $status;

    public function mount($search = null){
        $this->search = $search;
    }

    public function render()
    {
        // Create a query to fetch tasks and order them by ID in descending order
        $query = Task::orderBy('id', 'desc');
    
        // Apply search filter if the search term is provided
        if ($this->search) {
            $query->where(function ($query) {
                $query->where('title', 'like', "%{$this->search}%")
                    ->orWhere('description', 'like', "%{$this->search}%");
            });
        }

        return view('livewire.task-management', [
            'tasks' => $query->paginate(5)
        ]);
        
    }

    /**
     * Open new task modal
     *
     * @return void
     */
    public function newTaskModal()
    {
        // Reset form fields and open the new task modal
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
        // Validate input and create a new task
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
        // Populate fields with task data and open the view task modal
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
        // Populate fields with task data and open the edit task modal
        $this->dispatch('open-modal', 'edit-task');
        $this->title = $task->title;
        $this->description = $task->description;
        $this->status = $task->status;
        $this->task_id = $task->id;
    }
    
    /**
     * updateTask
     *
     * @param  mixed $task
     * @return void
     */
    public function updateTask(Task $task)
    {
        // Validate input and update the task
        $this->validate();
        $task->update([
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status
        ]);
        $this->dispatch('close-modal', 'new-task');
    }

    /**
     * Delete Task
     *
     * @param  mixed $task
     * @return void
     */
    public function deleteTask(Task $task)
    {
        // Delete the task
        $task->delete();
    }
}
