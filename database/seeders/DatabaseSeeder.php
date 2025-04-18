<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Product;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Customer::create([
            'name' => 'John',
            'lastname' => 'Doe Smith',
            'email' => 'john@doe.com',
            'phone' => '512752531',
            'address' => '123 Main St',
            'website' => 'https://johndoe.com',
            'active' => true,
        ]);

        Customer::create([
            'name' => 'Jane',
            'lastname' => 'Doe Smith',
            'email' => 'jane@doe.com',
            'phone' => '846438818',
            'address' => '321 Main St',
            'website' => 'https://janedoe.com',
            'active' => true,
        ]);

        Customer::create([
            'name' => '                john',
            'lastname' => '        smith Doe',
            'email' => 'john@smith.com',
            'phone' => '172453858',
            'address' => '123 Main St',
            'website' => 'https://johnsmith.com',
            'active' => true,
        ]);

        Product::create([
            'name' => 'Product 1',
            'price' => 10.99,
            'image' => 'products/1.jpg',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'stock' => 10,
            'active' => true,
        ]);

        Product::create([
            'name' => 'Product 2',
            'price' => 20.99,
            'image' => 'products/2.jpg',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'stock' => 20,
            'active' => true,
        ]);

        Product::create([
            'name' => 'Product 3',
            'price' => 30.99,
            'image' => 'products/3.jpg',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'stock' => 30,
            'active' => true,
        ]);

        Product::create([
            'name' => 'Product 4',
            'price' => 40.99,
            'image' => 'products/4.jpg',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
            'stock' => 40,
            'active' => true,
        ]);
    }
}
