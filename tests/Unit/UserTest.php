<?php

namespace Tests\Unit;

use Tests\TestCase;
//use PHPUnit\Framework\TestCase;
use App\Models\User;


class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_login_form()
    {
		$response = $this->get('/login');

        $response->assertStatus(200);
    }
	
	
	public function test_user_duplication()
	{
		$user1 = User::make([
			'name' => 'John Doe',
			'email' => 'johndoe@gmail.com'
			]);
			
		$user2 = User::make([
			'name' => 'Garry',
			'email' => 'garry@gmail.com'
			]);
		
		$this->assertTrue($user1->name != $user2->name);
		
	}
	
	public function test_it_stores_new_users()
	{
		$response = $this->post('/register', [
			'name' => 'Garry2',
			'email' => 'garry@gmail.com',
			'password' => '12345678'
		]);
		$response->assertRedirect('/');
	}
	
	public function test_database()
	{
		$this->assertDatabaseHas('users', [
			'name' => 'Garry'
		]);
	}
	
	public function test_database_missing()
	{
		$this->assertDatabaseMissing('users', [
			'name' => 'John'
		]);
	}
	
}
