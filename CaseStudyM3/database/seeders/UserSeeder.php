<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use function Symfony\Component\String\u;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('123456');
        $user->role = 'admin';
        $user->save();

        $user=new User();
        $user->name='Tam';
        $user->email = 'tambeo91@gmail.com';
        $user->password = Hash::make('123456');
        $user->role = 'user';
        $user->save();
    }
}
