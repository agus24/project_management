<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TruncateAll::class);
        $this->call(user_seeder::class);
        $this->call(project_seeder::class);
        $this->call(task_seeder::class);
        $this->call(UtilityData::class);
    }
}
