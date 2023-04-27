<?php

namespace Tests\Feature;

use Database\Factories\AndersenTaskFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AndersenTaskTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_can_view_andersen_tasks_page()
    {
        // Create a fake AndersenTask record
        $andersenTasks = AndersenTaskFactory::times(5)->create();

        // Make a GET request to the route
        $response = $this->get(route('andersen-tasks.show'));

        // Assert that the response is successful
        $response->assertStatus(200);

        // Assert that the response contains the name of each AndersenTask instance
        foreach ($andersenTasks as $andersenTask) {
            $response->assertSee($andersenTask->name);
        }
    }

    public function test_can_create_new_andersen_task()
    {
        // Generate fake data for the task
        $taskData = [
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'message' => $this->faker->paragraph(),
        ];

        // Make a POST request to the route with the fake data
        $response = $this->post(route('andersen-tasks.store'), $taskData);

        // Assert that the response is a redirect
        $response->assertRedirect();

        // Assert that a new task was created in the database
        $this->assertDatabaseHas('andersen_tasks', $taskData);
    }
}
