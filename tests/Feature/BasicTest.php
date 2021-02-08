<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;

/**
 * PHPUnit test for Player drain
 */
class BasicTest extends TestCase
{

    /**
     * Team A should contain 5 players
     *
     * @return void
     */
    public function testTeamAValidation()
    {
        $this->artisan('player:start')
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
        $this->artisan('player:start')
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
        $this->artisan('player:start')
            ->expectsQuestion('Enter A Teams players', '35, 100, 20, 50, 40')
            ->expectsQuestion('Enter B Teams players', '35, 10, 30, 20, 90')
            ->expectsOutput('Win');
    }
    /**
     * Team A Loose
     *
     * @return void
     */
    public function testTeamALooseDrain()
    {
        $this->artisan('player:start')
            ->expectsQuestion('Enter A Teams players', '35, 100, 20, 50, 40')
            ->expectsQuestion('Enter B Teams players', '35, 10, 30, 20, 900')
            ->expectsOutput('Loose');
    }
}
