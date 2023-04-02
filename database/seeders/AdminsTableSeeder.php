<?php

namespace Database\Seeders;

use App\Models\AdminsProperty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            [
                'name' => 'Admin 1',
                'phone_number' => '088232175054',

            ],
            [
                'name' => 'Admin 2',
                'phone_number' => '088232175',
            ],
            [
                'name' => 'Admin 3',
                'phone_number' => '088232',
            ],
            [
                'name' => 'Admin 4',
                'phone_number' => '0882',
            ],

        ];
        foreach ($admin as $key => $value) {
            AdminsProperty::create($value);
        }
    }
}
