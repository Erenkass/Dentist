<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('users')->insert([
          [
              'name'=>'Eren',
              'email'=>'eren@kas.com',
              'password'=>bcrypt('123456789'),
              'role' => 'admin'
          ],
          [
              'name'=>'Kerem',
              'email'=>'kerem@kul.com',
              'password'=>bcrypt('123456789'),
              'role' => 'admin'
          ]
      ]);
    }
}
