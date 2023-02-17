<?php

namespace Tests\Unit;

use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testContact() {
        $response = $this->get('/contact');
        $response->assertOk();       
    }

    public function testHeckout() {
        $response = $this->get('/checkout');
        $response->assertOk();       
    }

    public function testAuth() {
        $this->post('login', [
            'email' => 'litvintsev.danil@inbox.ru',
            'password' => 'danil2003'
        ]);
        $response = $this->get('/');
        $response->assertOk();
    }

}
