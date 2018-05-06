<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AnswerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSave()
    {
        $user = $user = factory(\App\User::class)->make();
        $user->save();
        $question = factory(\App\Question::class)->make();
        $question->user()->associate($user);
        $question->save();
        $answer = factory(\App\Answer::class)->make();
        $answer->user()->associate($user);
        $answer->question()->associate($question);
        $this->assertTrue($answer->save());
    }

    public function testDeleteCascade()
    {
        $user = $user = factory(\App\User::class)->make();
        $user->save();
        $question = factory(\App\Question::class)->make();
        $question->user()->associate($user);
        $question->save();
        $answer1 = factory(\App\Answer::class)->make();
        $answer1->user()->associate($user);
        $answer1->question()->associate($question);
        $this->assertTrue($answer1->save());

        $answer2 = factory(\App\Answer::class)->make();
        $answer2->user()->associate($user);
        $answer2->question()->associate($question);
        $this->assertTrue($answer2->save());

        $answ1 = \App\Answer::find($answer1->id);
        $answ2 = \App\Answer::find($answer2->id);
        $this->assertNotNull($answ1);
        $this->assertNotNull($answ2);

        $isdeleted=\App\Question::find($question->id)->delete();
        $this->assertTrue($isdeleted);

        $answ1 = \App\Answer::find($answer1->id);
        $answ2 = \App\Answer::find($answer2->id);

        $this->assertNull($answ1);
        $this->assertNull($answ2);
    }
}
