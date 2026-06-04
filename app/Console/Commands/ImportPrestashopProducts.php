<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ImportPrestashopProducts extends Command
{
    protected $signature = 'import:prestashop-products';
    protected $description = 'Import Prestashop products';

    public function handle()
    {
        $file = fopen(storage_path('app/p.csv'), 'r');

        // Skip header
        $header = fgetcsv($file);

        while (($row = fgetcsv($file, 0, ',')) !== false) {

            /*
            CSV INDEXES
            0 => id_product
            1 => product_name
            2 => reference
            3 => price
            4 => quantity
            5 => parent_category
            6 => parent_category_id
            7 => child_category
            8 => child_category_id
            9 => brand_name
            10 => brand_id
            11 => id_image
            */

            $title = trim($row[1]);

            if (!$title) {
                continue;
            }

            // =========================
            // CATEGORY
            // =========================

            $cat_id = DB::table('categories')
                ->where('title', trim($row[5]))
                ->value('id');

            // =========================
            // SUB CATEGORY
            // =========================

            $child_cat_id = DB::table('categories')
                ->where('title', trim($row[7]))
                ->where('parent_id', $cat_id)
                ->value('id');

            // =========================
            // BRAND
            // =========================

            $brand_id = DB::table('brands')
                ->where('title', trim($row[9]))
                ->value('id');

            // =========================
            // IMAGE URL
            // =========================

            $image = $this->getImageUrl($row[11]);

            // =========================
            // INSERT PRODUCT
            // =========================

            DB::table('products')->updateOrInsert(

                [
                    'slug' => Str::slug($title)
                ],

                [
                    'title' => $title,

                    'slug' => Str::slug($title),

                    'summary' => $title,

                    'description' => $title,

                    'part_number' => trim($row[2]),

                    'model_number' => trim($row[2]),

                    'photo' => $image,

                    'stock' => (int)$row[4],

                    'status' => $row[3] > 0 ? 'active' : 'inactive',

                    'price' => (float)$row[3],

                    'discount' => 0,

                    'is_featured' => 0,

                    'cat_id' => $cat_id,

                    'child_cat_id' => $child_cat_id,

                    'brand_id' => $brand_id,

                    'created_at' => now(),

                    'updated_at' => now(),
                ]
            );

            $this->info("Imported: " . $title);
        }

        fclose($file);

        $this->info('✅ Import completed successfully!');
    }

    // ======================================
    // GENERATE PRESTASHOP IMAGE URL
    // ======================================

    private function getImageUrl($id)
    {
        if (!$id) {
            return null;
        }

        $path = implode('/', str_split($id));

        return "https://petchemparts.com/img/p/$path/$id.jpg";
    }
}