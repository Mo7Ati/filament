<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
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

        $categories = Category::factory(5)->create();
        Store::factory(10)->create();
        Product::factory()
            ->count(20)
            ->hasAttached(collect($categories)->random(2))
            ->create();



        foreach (Config::get('abilities') as $index => $value) {
            Permission::create(['guard_name' => 'admin', 'name' => $index]);
        }

        Admin::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@ps.com',
            'password' => Hash::make('password'),
            'username' => 'Admin',
            'phone_number' => '05999999',
            'super_admin' => '1',
        ]);
    }
}
