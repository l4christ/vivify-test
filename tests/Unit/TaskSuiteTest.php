<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Task;
use Livewire\Livewire;
use App\Livewire\TaskManagement;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskSuiteTest extends TestCase
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
    
    
    public function test_user_can_update_task()
    {
        

        $task = Task::factory()->create();

        Livewire::test(TaskManagement::class)
            ->set('title', 'another title')
            ->set('description', 'another description')
            ->set('status', 'done')
            ->call('updateTask', $task);

        $updatedTask = Task::first();

        $this->assertEquals('another title', $updatedTask->title);
        $this->assertEquals('another description', $updatedTask->description);
        $this->assertEquals('done', $updatedTask->status);
    }
    
    public function test_user_can_view_task()
    {

        Task::create([
            'title' => 'title one',
            'description' => 'dummy description',
            'status' => 'todo'
        ]);

        Livewire::test(TaskManagement::class)
            ->assertSee('title one')
            ->assertSee('dummy description')
            ->assertSee('todo')
            ->assertStatus(200);
    }
}
