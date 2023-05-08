<?php

use App\Controllers\Users;
use App\Models\UserModel;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

class UsersTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    public function testIndex()
    {
        $result = $this->call('get', '/users');
        $this->assertContains('<title>Users</title>', $result->getBody());
    }

    public function testStore()
    {
        $data = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'mobile' => '1234567890',
            'username' => 'johndoe',
            'password' => 'password',
            'is_active' => 1
        ];

        $result = $this->post('users/store', $data);
        $result->assertRedirect('users/create');

        $userModel = new UserModel();
        $user = $userModel->where('email', $data['email'])->first();
        $this->assertNotNull($user);
        $this->assertEquals($data['first_name'], $user->first_name);
        $this->assertEquals($data['last_name'], $user->last_name);
        $this->assertEquals($data['email'], $user->email);
        $this->assertEquals($data['mobile'], $user->mobile);
        $this->assertEquals($data['username'], $user->username);
        $this->assertTrue(password_verify($data['password'], $user->password));
        $this->assertEquals($data['is_active'], $user->is_active);
    }
}