<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Task;
use App\Models\User;
use Livewire\Livewire;
use App\Livewire\TaskManagement;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskManagementTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Return a list of tasks
     */
    public function test_return_a_list_of_tasks(): void
    {
        Livewire::test(TaskManagement::class)->assertStatus(200);
    }
    
    public function test_task_management_exists_on_the_dashboard_route(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        $response = $this->actingAs($user)->get('/dashboard');

        $response
        ->assertSeeLivewire(TaskManagement::class)
            ->assertStatus(200);
    }
}
