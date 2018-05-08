<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Profile;

class profileTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSave()
    {
        $user = factory(User::class)->make();
        $user->save();
        $profile = factory(Profile::class)->make();
        $profile->user()->associate($user);
        $this->assertTrue($profile->save());
    }

    public function testDeleteCascade()
    {
        $user = $user = factory(\App\User::class)->make();
        $user->save();
        $profile = factory(\App\Profile::class)->make();
        $profile->user()->associate($user);
        $this->assertTrue($profile->save());
        $prof = \App\Profile::find($profile->id);
        $this->assertNotNull($prof);


        $isdeleted = \App\User::find($user->id)->delete();
        $this->assertTrue($isdeleted);
        $prof = \App\Profile::find($profile->id);

        $this->assertNull($prof);


    }
}
