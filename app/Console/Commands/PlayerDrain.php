<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PlayerDrain extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'player:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $a = $this->ask('Enter A Teams players');
        $b = $this->ask('Enter B Teams players');

        $teamA = (explode(',',$a));
        $teamB = (explode(',',$b));


        if((count($teamA) < 5) || (count($teamA) > 5)){
            $this->info("Team A must have 5 players");
        }

        if((count($teamB) < 5) || (count($teamB) > 5)){
            $this->info("Team B must have 5 players");
        }
        if( (count($teamA) < 5) || (count($teamA) > 5) || (count($teamB) < 5) || (count($teamB) > 5) ){
            return 1;
        }


        $teamARearranged = array();
        sort($teamA);

        start:
        for($i=0; $i<count($teamB); $i++){

            for($j=0; $j<count($teamA); $j++){

                if($teamA[$j] > $teamB[$i]){
                    if(!in_array($teamA[$j], $teamARearranged)){
                        //$teamARearranged[$teamB[$i]] = $teamA[$j];
                        $teamARearranged[$i] = $teamA[$j];
                        break;
                    }

                }else{
                    $teamARearranged[$i] = $teamA[$j];
                }

            }
        }

        $result = '';
        for($i=0; $i<5; $i++){
            if($teamARearranged[$i] > $teamB[$i]){
                $result = "Win";
                continue;
            }
            else{
                $result = "Loose";
                break;
            }
        }

        $this->info($result);
    }

}
