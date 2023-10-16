<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Task;
use Livewire\Livewire;
use App\Livewire\TaskManagement;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskManagementTest extends TestCase
{
    use RefreshDatabase;

    
    public function test_title_field_is_required_and_valid()
    {
        Livewire::test(TaskManagement::class)
            ->set('title', '')
            ->call('createNewTask')
            ->assertHasErrors('title');
    }
    
    public function test_description_field_is_required_and_valid()
    {
        Livewire::test(TaskManagement::class)
            ->set('description', '')
            ->call('createNewTask')
            ->assertHasErrors('description');
    }
    
    public function test_status_field_is_required_and_valid()
    {
        Livewire::test(TaskManagement::class)
            ->set('status', '')
            ->call('createNewTask')
            ->assertHasErrors('status');
    }
    public function test_user_can_create_task()
    {
        $this->assertEquals(0, Task::count());
 
        Livewire::test(TaskManagement::class)
            ->set('title', fake()->sentence(3))
            ->set('description', fake()->sentence(10))
            ->set('status', 'todo')
            ->call('createNewTask');
 
        $this->assertEquals(1, Task::count());
    }
    
    public function test_user_can_delete_task()
    {
        $this->assertEquals(0, Task::count());

        Livewire::test(TaskManagement::class)
            ->set('title', fake()->sentence(3))
            ->set('description', fake()->sentence(10))
            ->set('status', 'todo')
            ->call('createNewTask');
 
        Livewire::test(TaskManagement::class)
            ->call('deleteTask', 1);
 
        $this->assertEquals(0, Task::count());
    }
    
    
}
