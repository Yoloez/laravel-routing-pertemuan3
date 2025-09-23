<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OddyModel;

class OddySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1; $i <= 10; $i++){
            OddyModel::create([
                'nama' => fake() -> name(),
                'alamat' => fake() -> address(),
                'pekerjaan' => fake() -> jobTitle()
            ]);
        }
    }
}
