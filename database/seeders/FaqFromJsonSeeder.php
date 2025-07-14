<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class FaqFromJsonSeeder extends Seeder
{
    public function run()
    {
        // load JSON file 
        $json = File::get(database_path('seeders/data/fragen-antworten.json'));
        $items = json_decode($json, true);

        // extract categories/tags
        $tagIds = [];
        foreach (collect($items)->pluck('category')->unique() as $category) {
            $tagIds[$category] = DB::table('tags')->insertGetId([
                'name'       => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // insert faqs
        foreach ($items as $i => $faq) {
            DB::table('faqs')->insert([
                'question'   => $faq['question'],
                'answer'     => $faq['answer'],
                'tag_id'     => $tagIds[$faq['category']],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
