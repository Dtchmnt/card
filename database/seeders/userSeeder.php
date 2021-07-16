<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 1,
            'name' => 'admin',
            'password' => Hash::make('password'),
        ])->assignRole('admin')->id
        and
        Media::create([
            'user_id' => 1,
            'slug' => 'admin',
            'img' => 'no-avatar.png',
        ]);;
    }
}
