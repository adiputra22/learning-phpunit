<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    protected $user;

    public function setUp()
    {
        $this->user = new \App\Models\User;
    }

    public function test_that_we_can_get_the_first_name()
    {
        $this->user->setFirstName('Billy');

        $this->assertEquals($this->user->getFirstName(), 'Billy');
    }

    public function testThatWeCanGetTheLastName()
    {
        $this->user->setLastName('Billy');

        $this->assertEquals($this->user->getLastName(), 'Billy');
    }

    public function testThatWeCanGetTheEmail()
    {
        $this->user->setEmail('billy@mail.com');

        $this->assertEquals($this->user->getEmail(), 'billy@mail.com');
    }

    public function testThatWeCanGetData() {
        $this->user->setFirstName('billy');
        $this->user->setLastName('orami');
        $this->user->setEmail('billy@mail.com');

        $data = $this->user->getData();

        $this->assertArrayHasKey('full_name', $data);
        $this->assertArrayHasKey('email', $data);

        $this->assertEquals($data['full_name'], 'billy orami');
        $this->assertEquals($data['email'], 'billy@mail.com');
    }
}