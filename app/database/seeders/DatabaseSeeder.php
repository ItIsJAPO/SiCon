<?php

namespace Database\Seeders;

use App\Models\UnidadAdministrativa;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        \App\Models\UnidadAdministrativa::factory()->create();
        \App\Models\User::factory()->create(
            [
                'name' => 'Jose Pino',
                'email' => 'japo@example.com',
                'cargo' => "jefe de departamento",
                'user_type' => 1,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            ]
        );
        \App\Models\User::factory()->count(99)->has(UnidadAdministrativa::factory())->create();
    }
}
