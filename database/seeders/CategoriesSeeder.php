<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'السيارات' => 'sedan.png',
            'العقارات' => 'office-building.png',
            'معدات ثقيلة' => 'pliers.png',
            'قطع الغيار' => 'Maintenance tools.png',
            'ملابس' => 'clothes-hanger.png',
            'أحذية' => 'running-shoe.png',
            'قوارب' => 'ship.png',
            'ملابس' => 'shirt.png',
            'أشخاص متخصصين' => 'business-card.png',
            'خدمات' => 'digital-services.png',
            'ألعاب واقعية' => 'game-controller.png',
            'المستلزمات الصحية' => 'health-check.png',
            'أجهزة إلكترونية' => 'responsive.png',
            'دراجات' => 'mountain-bike.png',
            'حيوانات' => 'whale.png',
            'البلاستيك' => 'plastic.png',
        ];

        foreach ($categories as $key => $value) {
            $category = Category::create([
                'category_name' => $key,
                'category_image' => $value
            ]);
        }
    }
}
