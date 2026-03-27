<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'キウイ',
                'price' => 800,
                'description' => 'キウイは甘みと酸味のバランスが絶妙なフルーツです。ビタミンCなどの栄養素も豊富なため、美肌効果や疲労回復効果も期待できます。もぎたてフルーツのスムージーをお召し上がりください！',
                'image' => 'img/kiwi.png',
            ],
            [
                'name' => 'ストロベリー',
                'price' => 1200,
                'description' => '大人から子供まで大人気のストロベリー。当店では鮮度抜群の完熟いちごを使用しています。ビタミンCはもちろん食物繊維も豊富なため、腸内環境の改善も期待できます。',
                'image' => 'img/strawberry.png',
            ],
            [
                'name' => 'オレンジ',
                'price' => 850,
                'description' => '当店では酸味と甘みのバランスが抜群のネーブルオレンジを使用しています。酸味は控えめで、甘さと濃厚な果汁が魅力の商品です。',
                'image' => 'img/orange.png',
            ],
            [
                'name' => 'スイカ',
                'price' => 700,
                'description' => '甘くてシャリシャリ食感が魅力のスイカ。全体の90%が水分のため、暑い日の水分補給や熱中症予防にもおすすめです。',
                'image' => 'img/watermelon.png',
            ],
            [
                'name' => 'ピーチ',
                'price' => 1000,
                'description' => '豊潤な香りととろけるような甘さが魅力のピーチ。見た目の可愛さも抜群の商品です。',
                'image' => 'img/peach.png',
            ],
            [
                'name' => 'シャインマスカット',
                'price' => 1400,
                'description' => '爽やかな香りと上品な甘みが特徴のシャインマスカット。大人から子どもまで大人気のフルーツです。',
                'image' => 'img/muscat.png',
            ],
            [
                'name' => 'パイナップル',
                'price' => 800,
                'description' => '甘酸っぱさとトロピカルな香りが特徴のパイナップル。バランスの良い味わいです。',
                'image' => 'img/pineapple.png',
            ],
            [
                'name' => 'ブドウ',
                'price' => 1100,
                'description' => '高い糖度と適度な酸味が魅力の国産ブドウ。見た目も鮮やかで人気です。',
                'image' => 'img/grapes.png',
            ],
            [
                'name' => 'バナナ',
                'price' => 600,
                'description' => '低カロリーで栄養満点のバナナ。エネルギー補給にも最適です。',
                'image' => 'img/banana.png',
            ],
            [
                'name' => 'メロン',
                'price' => 900,
                'description' => 'ジューシーで品のある甘さが人気のメロン。むくみ解消にも効果的です。',
                'image' => 'img/melon.png',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}