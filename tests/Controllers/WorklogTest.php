<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;

class WorklogTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {

        $this->flushSession();

        // użytkownik nie zalogowany oczekiwany 302
        $res = $this->call('GET', '/res/worklog');
        $this->assertResponseStatus(302);

        $user = new User(array('name' => 'John'));
        $this->be($user); //You are now authenticated

        $res = $this->call('GET', '/res/worklog');
        $this->seeJsonStructure(['data', 'meta', 'status']);
        $this->assertResponseStatus(200);

        $res = $this->call('POST', '/res/worklog', [1,2,3,4]);

        echo $res->getContent();

        $this->seeJsonStructure(['data', 'meta', 'status']);
        $this->assertResponseStatus(200);

    }

    public function testCreateUser() {

        $this->flushSession();

        $res = $this->call('POST', '/register', [
            'name' => 'Jan Nowak',
            'email' => 'jn@o2.pl',
            'password' => 'passwd',
            'password_confirmation' => 'passwd'
        ]);

        echo $res->getContent();
    }
}
