<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CvsTableSeeder extends Seeder
{
    public function run()
    {
        // truncate data
        DB::table('cvs')->truncate();

        $this->command->getOutput()->progressStart(7);

        // 1
        DB::table('cvs')->insert([
            'id' => 6,
            'user_id' => 2,
            'title' => 'C++ Developer',
            'lang' => 'en',
            'firstname' => 'Alexander',
            'lastname' => 'Kuziv',
            'gender' => 'man',
            'birthday' => '411868800',

            'email' => 'makklays@gmail.com',
            'phone' => '+38 098 870 5397',
            'city' => 'Белая Церковь',
            'site' => 'makklays.com.ua',
            'citizenship' => 'ukrainian',
            'typejob' => 2,
            'otrasl' => 2,
            'salary' => 1100,
            'currency' => 'eur',
            'about' => 'description text. description text. ',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        $this->command->getOutput()->progressAdvance();

        // 2
        DB::table('cvs')->insert([
            'id' => 7,
            'user_id' => 3,
            'title' => 'C# Developer',
            'lang' => 'en',
            'firstname' => 'Alexander',
            'lastname' => 'Kuziv',
            'gender' => 'man',
            'birthday' => '411868800',
            'email' => 'makklays@gmail.com',
            'phone' => '+38 098 870 5397',
            'city' => 'Белая Церковь',
            'site' => 'makklays.com.ua',
            'citizenship' => 'ukrainian',
            'typejob' => 1,
            'otrasl' => 1,
            'salary' => 1500,
            'currency' => 'eur',
            'about' => 'description text. description text. ',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        $this->command->getOutput()->progressAdvance();

        // 3
        DB::table('cvs')->insert([
            'id' => 8,
            'user_id' => 1,
            'title' => 'PHP Developer',
            'lang' => 'en',
            'firstname' => 'Alexander',
            'lastname' => 'Kuziv',
            'gender' => 'man',
            'birthday' => '411868800',
            'email' => 'phpdevops@gmail.com',
            'phone' => '+38 098 870 5397',
            'city' => 'Белая Церковь',
            'site' => 'makklays.com.ua',
            'citizenship' => 'ukrainian',
            'typejob' => 1,
            'otrasl' => 3,
            'salary' => 2000,
            'currency' => 'eur',
            'about' => 'description text. description text. ',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        $this->command->getOutput()->progressAdvance();

        // 4
        DB::table('cvs')->insert([
            'id' => 9,
            'user_id' => 1,
            'title' => 'PHP Middle Developer',
            'lang' => 'en',
            'firstname' => 'Alexander',
            'lastname' => 'Kuziv',
            'gender' => 'man',
            'birthday' => '411868800',
            'email' => 'phpdevops@gmail.com',
            'phone' => '+38 098 870 5397',
            'city' => 'Белая Церковь',
            'site' => 'makklays.com.ua',
            'citizenship' => 'ukrainian',
            'typejob' => 1,
            'otrasl' => 2,
            'salary' => 2000,
            'currency' => 'eur',
            'about' => 'description text. description text. ',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        $this->command->getOutput()->progressAdvance();

        // 5
        DB::table('cvs')->insert([
            'id' => 10,
            'user_id' => 1,
            'title' => 'PHP Senior Developer',
            'lang' => 'en',
            'firstname' => 'Alexander',
            'lastname' => 'Kuziv',
            'gender' => 'man',
            'birthday' => '411868800',
            'email' => 'phpdevops@gmail.com',
            'phone' => '+38 098 870 5397',
            'city' => 'Белая Церковь',
            'site' => 'makklays.com.ua',
            'citizenship' => 'ukrainian',
            'typejob' => 1,
            'otrasl' => 2,
            'salary' => 2300,
            'currency' => 'eur',
            'about' => 'description text. description text. ',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        $this->command->getOutput()->progressAdvance();

        // 6
        DB::table('cvs')->insert([
            'id' => 11,
            'user_id' => 1,
            'title' => 'C++ Developer',
            'lang' => 'en',
            'firstname' => 'Alexander',
            'lastname' => 'Kuziv',
            'gender' => 'man',
            'birthday' => '411868800',
            'email' => 'makklays@gmail.com',
            'phone' => '+38 098 870 5397',
            'city' => 'Белая Церковь',
            'site' => 'makklays.com.ua',
            'citizenship' => 'ukrainian',
            'typejob' => 2,
            'otrasl' => 2,
            'salary' => 1100,
            'currency' => 'eur',
            'about' => 'description text. description text. ',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        $this->command->getOutput()->progressAdvance();

        // 7
        DB::table('cvs')->insert([
            'id' => 12,
            'user_id' => 1,
            'title' => 'C# Developer',
            'lang' => 'en',
            'firstname' => 'Alexander',
            'lastname' => 'Kuziv',
            'gender' => 'man',
            'birthday' => '411868800',
            'email' => 'makklays@gmail.com',
            'phone' => '+38 098 870 5397',
            'city' => 'Белая Церковь',
            'site' => 'makklays.com.ua',
            'citizenship' => 'ukrainian',
            'typejob' => 1,
            'otrasl' => 2,
            'salary' => 1500,
            'currency' => 'eur',
            'about' => 'description text. description text. ',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
        $this->command->getOutput()->progressAdvance();

        $this->command->getOutput()->progressFinish();
    }
}
