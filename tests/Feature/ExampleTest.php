<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }

    public function testLoginCsrf()
    {
        $response = $this->post('/login', ["email" => "test@email.com", "password" => "0000"]);


        $response->assertStatus(419);
    }

    public function testLoginForm()
    {
        $response = $this->get('/login');
        $response->assertSee('<input id="email" type="email" class="form-control " name="email" value="" required autocomplete="email" autofocus>', $escaped = false);
    }

    public function testMainPage()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/');
        $response->assertStatus(200);
    }

    public function testMainPageProductExists()
    {
        $user = User::factory()->create();
        Project::factory()->create();
        Technology::factory()->create();
        $response = $this->actingAs($user)->get('/');
        $response->assertSee('<input name="projects[]"', $escaped = false);
    }


}
