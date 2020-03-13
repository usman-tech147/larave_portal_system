<?php

use Illuminate\Database\Seeder;
use App\Models\Hr\ManageProgram\School;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schools = [
            [
                'name' => 'school of science and tech',
            ],
            [
                'name' => 'school of medical',
            ],
            [
                'name' => 'school of commerce',
            ],
            [
                'name' => 'school of aviation',
            ],
        ];

        foreach ($schools as $school) {
            School::create($school);
        }
    }
}
