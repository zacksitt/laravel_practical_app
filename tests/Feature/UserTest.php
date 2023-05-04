<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
     /**
     * register api test.
     */
    public function test_register_returns_a_successful_response(): void
    {
        $response = $this->call('POST','/api/register',[

            "name"              => "Test",
            "password"          => "asdf1234",
            "email"             => $this->generateRandomString() . "@rznet.com",
            "phone"             => $this->generateRandomString(10,true),
            "gender"            => "male",
            "date_of_birth"     => "02/22/1989"
        ])->json();
        
        $this->assertEquals([
            "msg"   => "register_success",
            "status"    => 1
        ],$response);
    }

    /**
     * login api test.
     */
    public function test_login_returns_a_successful_response(): void
    {
        $user = User::orderBy("id","DESC")->first();
        $response = $this->call('POST','/api/login',[
            "email"     => $user->email,
            "password" => "asdf1234"
        ])->json();
        $this->assertEquals(1,$response["status"]);
        $this->assertEquals("login_success",$response["msg"]);

    }

    function generateRandomString(int $length = 10,bool $justNumber = false):string {
        
        if($justNumber){
            $characters = '0123456789';
        }else{
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
