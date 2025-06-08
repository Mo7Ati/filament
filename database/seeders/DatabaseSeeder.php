<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // $categories = Category::factory(5)->create();
        // Store::factory(10)->create();

        // $products = Product::factory()
        //     ->count(20)
        //     ->has(Category::factory()->count(3))
        //     ->create();

        // foreach (Config::get('abilities') as $index => $value) {
        //     Permission::create(['guard_name' => 'admin', 'name' => $index]);
        // }

        // User::factory()->create([
        //     'name' => 'Dawly',
        //     'email' => 'dawly@ps.com',
        //     'password' => Hash::make('password'),
        // ]);

        // Admin::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@ps.com',
        //     'password' => Hash::make('password'),
        //     'username' => 'Admin',
        //     'phone_number' => '0592381441',
        //     'super_admin' => '1',
        // ]);
    }
}
