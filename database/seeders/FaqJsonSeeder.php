<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Category;

class FaqJsonSeeder extends Seeder
{
    public function run()
    {
        // JSON-Datei laden
        $json = File::get(database_path('seeders/data/fragen-antworten.json'));
        $items = json_decode($json, true);

        foreach ($items as $i => $item) {
            $category = Category::where('name', $item['category'])->first();
            if (! $category) {
                $categoryId = DB::table('categories')->insertGetId([
                    'name'       => $item['category'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                $categoryId = $category->id;
            }

            // FAQ anlegen
            $faqId = DB::table('faqs')->insertGetId([
                'question'    => $item['question'],
                'answer'      => $item['answer'],
                'category_id' => $categoryId,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
