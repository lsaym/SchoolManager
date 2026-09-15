<?php

namespace Database\Seeders;

use App\Models\AlunoModel;
use Illuminate\Database\Seeder;

class AlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AlunoModel::factory(500)->create();
    }
}
