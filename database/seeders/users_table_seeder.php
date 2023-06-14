<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class users_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
             'name'=>'Admin',
            'email'=>'admin@app.com',
            'password'=>bcrypt('password'),
            'email_verified_at' => now(),
            'isAdmin'=>true
        ]);
    }
}
