<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    Page::truncate();
              $page = [
                ['title' => 'About Us', 'slug' => 'about-us', 'published' => '1','group_by'=>'general'],
          ];
      Page::insert($page);
    }
    }
