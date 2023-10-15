<?php

namespace App\Livewire;

use Livewire\Component;

class TaskManagement extends Component
{
    public function render()
    {
        return view('livewire.task-management');
    }

    /**
     * Open new task modal
     *
     * @return void
     */
    public function newTaskModal(): void
    {
        $this->dispatch('open-modal', 'new-task');
    }
}
