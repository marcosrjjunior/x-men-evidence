<?php

use Illuminate\Database\Seeder;

class XmenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'wolverine',
            'email' => 'wolverine@xmen.com',
            'picture' => 'pictures/wolverine.jpg',
            'short_description' => 'wolverine powers',
            'password' => bcrypt('wolverine'),
        ]);
    }
}
