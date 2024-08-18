<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

use Modules\Shop\Database\Seeders\ShopDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        if ($this->command->confirm('Apakah anda ingin refresh table?')) {
            $this->command->call('migrate:fresh');
            $this->command->info('Berhasil dijalankan, Database kosong.');
        }

        User::factory()->create();
        $this->command->info('Data user ditambahkan.');

        if ($this->command->confirm('Apakah anda ingin menambahkan sample data produk?')) {
            $this->call([
                ShopDatabaseSeeder::class,
            ]);
        }
    }
}
