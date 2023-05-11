<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $user = User::create([
        'name' => 'Admin',
        'email' => 'ahsoka.tano@q.agency',
        'password' => bcrypt('Kryze4President'),
      ]);
    }
}