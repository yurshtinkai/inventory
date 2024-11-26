<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category; 
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['CategoryName' => 'Monitor']);
        Category::create(['CategoryName' => 'Mouse']);
        Category::create(['CategoryName' => 'AVR']);
        Category::create(['CategoryName' => 'Keyboard']);
        Category::create(['CategoryName' => 'System Unit']);
        Category::create(['CategoryName' => 'System Unit-CPU']);
        Category::create(['CategoryName' => 'System Unit-Power Supply']);
        Category::create(['CategoryName' => 'System Unit-RAM']);
        Category::create(['CategoryName' => 'System Unit-MotherBoard']);
        Category::create(['CategoryName' => 'System Unit-Cooling Fan']);
        Category::create(['CategoryName' => 'System Unit-SSD']);
    }
}
