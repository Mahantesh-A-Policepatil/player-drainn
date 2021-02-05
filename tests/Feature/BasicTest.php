<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;


class BasicTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    /**
     * Team A should contain 5 players
     *
     * @return void
     */
    public function testTeamAValidation()
    {
        $response = $this->artisan('player:start')
        ->expectsQuestion('Enter A Teams players', '11,22')
        ->expectsQuestion('Enter B Teams players', '10,20,30,40,50')
        ->expectsOutput('Team A must have 5 players');
    }
     /**
     * Team B should contain 5 players
     *
     * @return void
     */
    public function testTeamBValidation()
    {
        $response = $this->artisan('player:start')
        ->expectsQuestion('Enter A Teams players', '11,22,33,44,55')
        ->expectsQuestion('Enter B Teams players', '10,20')
        ->expectsOutput('Team B must have 5 players');
    }
    /**
     * Team A win
     *
     * @return void
     */
    public function testTeamAWinDrain()
    {
        $response = $this->artisan('player:start')
        ->expectsQuestion('Enter A Teams players', '11,22,33,44,55')
        ->expectsQuestion('Enter B Teams players', '10,20,30,40,50')
        ->expectsOutput('Win');
    }
     /**
     * Team A Loose
     *
     * @return void
     */
    public function testTeamALooseDrain()
    {
        $response = $this->artisan('player:start')
        ->expectsQuestion('Enter A Teams players', '10,20,30,40,50')
        ->expectsQuestion('Enter B Teams players', '11,22,33,44,55')
        ->expectsOutput('Loose');
    }

}
