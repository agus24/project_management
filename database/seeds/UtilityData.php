<?php

use Illuminate\Database\Seeder;

class UtilityData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('utl_data')->insert([
            ["name"=>'type_task', "value"=>1, "text"=>'Issue'],
            ["name"=>'type_task', "value"=>2, "text"=>'Bug'],
            ["name"=>'type_task', "value"=>3, "text"=>'Improvement'],
            ["name"=>'type_task', "value"=>4, "text"=>'New Feature'],
            ["name"=>'priority', "value"=>1, "text"=>'High'],
            ["name"=>'priority', "value"=>2, "text"=>'Medium'],
            ["name"=> 'priority', "value"=>3, "text"=>'Low'],
        ]);
    }
}
