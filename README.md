##This is a test assignment.
-------------------------------------------------------------
#Description
-------------------------------------------------------------
Let's imagine we have a game two teams, each team have 5 players, every player have drain (level to measure player strength). 
Below given numbers in brackets represent drain of each players. 
Team A [35, 100, 20, 50, 40] 
Team B [35, 10, 30, 20, 90]  
You need to assign team A player in a way where it exceed team B player’s drain. 
Even if one player loses the battle then team A will not win. 
The solution for the above result will be Team A [40, 20, 35, 50, 100] Team B [35, 10, 30, 20, 90]  
Input: should be from artisan command to collect all the players data comma separated. 
Example artisan should promote Enter A Teams players: 30, 100, 20, 50, 40 
Enter B team players: 35, 10, 30, 20, 90  
If A team can win than the output will be: Win 
If A team lose than the output will be: Lose 
-------------------------------------------------------------
#Expectations 
-------------------------------------------------------------
- Create an artisan command to start the game and import the players. 
- Write at least 3 test cases which can be in unit testing, feature testing, TDD or BDD. 
- Coding standards like PSR-4, Laravel should be maintained. 
- Coding Principles like SOLID or DRY should be well used. 
- Code should be descriptive so that no comment block is required in method.
-------------------------------------------------------------
#Execute following commands
-------------------------------------------------------------
    1)composer install
    2)copy .env.example .env
    3)php artisan key:generate
-------------------------------------------------------------
- To execute artisan command use the following command 
    `php artisan player:start` 
- To PHPUnit test artisan command use the following command for linux 
    `vendor/bin/phpunit` 
- To PHPUnit test artisan command use the following command for windows  
    `vendor\bin\phpunit` 
- Or Use following command 
    `php artisan test`
-------------------------------------------------------------