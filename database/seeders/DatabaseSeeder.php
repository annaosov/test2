<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        $this->call(ProductTableSeeder::class);
        $this->command->info('Данные загружены в таблицу товаров.');

        $this->call(UserTableSeeder::class);
        $this->command->info('Данные загружены в таблицу покупателей.');

        $this->call(OrderTableSeeder::class);
        $this->command->info('Данные загружены в таблицу заказов.');

        $this->call(OrderItemTableSeeder::class);
        $this->command->info('Данные загружены в таблицу заказанных товаров.');
    }
}