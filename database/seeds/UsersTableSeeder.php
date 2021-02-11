<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'first_name' => 'John',
        'last_name' => 'Deer',
        'email' => 'john@mail.net',
        'user_name' => 'john',
        'password' => 'tractors',
        'city' => 'Chicago',
        'country' => 'United States',
      ]);

      DB::table('users')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'first_name' => 'Jane',
        'last_name' => 'Doe',
        'email' => 'jane@mail.net',
        'user_name' => 'jane',
        'password' => 'grass',
        'city' => 'Toronto',
        'country' => 'Canada',
      ]);

      $user = \App\User::firstOrCreate(['user_name' => 'jill']);
      $user->first_name = 'Jill';
      $user->last_name = 'Last';
      $user->email = 'jill@harvard.edu';
      $user->user_name = 'jill';
      $user->password = \Hash::make('helloworld');
      $user->city = 'Boston';
      $user->country = 'United States';
      $user->save();

      $user = \App\User::firstOrCreate(['user_name' => 'jamal']);
      $user->first_name = 'Jamal';
      $user->last_name = 'Last';
      $user->email = 'jamal@harvard.edu';
      $user->user_name = 'jamal';
      $user->password = \Hash::make('helloworld');
      $user->city = 'Rome';
      $user->country = 'Italy';
      $user->save();
    }
}
