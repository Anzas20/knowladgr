<?php

use Illuminate\Database\Seeder;
use App\Dosen;

class DosenTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Dosen::create([
            'nip'                    =>      '1705002',
            'password'               =>      Hash::make('password'),
            'remember_token'         =>      str_random(10),
        ]);
    }
}
