<?php

namespace Tests\Unit;


use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLoadHomePage()
    {
        $response = $this->get('/posts');

        $response->assertOk();
    }

    public function testAuthorize(){
        $this->post('/login', [
            'email' => 'admin@admin',
            'password'=>'admin'
        ]);

        $response = $this->get('/admin');
        $response->assertOk();
    }

    public function testNonAuthorize(){
        $this->post('/login', [
            'email' => 'rerer@gmail.com',
            'password'=>'rferf'
        ]);

        $response = $this->get('/admin');
        $this->assertEquals(302, $response->status());
    }
    public function testNonAuthorizeComment(){
        $response = $this->post('/posts/1/comments', ['message'=>'sdfsdfsd']);
        $response->assertRedirect('/login');
    }

    public function testAuthorizeComment(){
        $this->post('/login', [
            'email' => 'admin@admin',
            'password'=>'admin'
        ]);

        $response = $this->post('/posts/1/comments', ['message'=>'sdfsdfsd']);
        $response->assertRedirect('/posts/1');
    }
}
