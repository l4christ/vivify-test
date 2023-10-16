<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

class createTaskTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Create new task
     */
    public function test_create_new_task(): void
    {
        $this->assertEquals(0, Task::count());

        Task::factory()->create();
 
        $this->assertEquals(1, Task::count());
    }
}
