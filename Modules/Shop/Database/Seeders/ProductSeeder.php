<?php

namespace Modules\Shop\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use Modules\Shop\App\Models\{
    Attribute,
    Category,
    Product,
    ProductAttributes,
    ProductInventory,
    Tag,
};

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();

        Attribute::setDefaultAttributes();
        $this->command->info('Data default berhasil ditambahkan.');
        $attributeWeight = Attribute::where('code', Attribute::ATTR_WEIGHT)->first();

        Category::factory()->count(10)->create();
        $this->command->info('Seed kategori berhasil');
        $randomCategoryIDs = Category::all()->random()->limit(2)->pluck('id');

        Tag::factory()->count(10)->create();
        $this->command->info('Seed tag berhasil');
        $randomTagIDs = Tag::all()->random()->limit(2)->pluck('id');

        for ($i=1; $i <= 10 ; $i++) { 
            $manageStock = (bool)random_int(0, 1);

            $product = Product::factory()->create([
                'user_id' => $user->id,
                'manage_stock' => $manageStock,
            ]);

            $product->categories()->sync($randomCategoryIDs);
            $product->tags()->sync($randomTagIDs);

            ProductAttributes::create([
                'product_id' => $product->id,
                'attribute_id' => $attributeWeight->id,
                'integer_value' => random_int(200, 2000),
            ]);

            if ($manageStock) {
                ProductInventory::create([
                    'product_id' => $product->id,
                    'qty' => random_int(3, 20),
                    'low_stock_threshold' => random_int(1, 3),
                ]);
            }
        }
        $this->command->info('Sample data produk berhasil ditambahkan.');
    }
}
