<?php

namespace Tests\Unit;

use Livewire\Livewire;
use PHPUnit\Framework\TestCase;
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
}
