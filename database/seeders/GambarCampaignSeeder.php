<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GambarCampaign;

class GambarCampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GambarCampaign::insert([
            [
                'campaign_id' => 1,
                'gambar' => 'https://vphoto.vietnam.vn/thumb/640x360/vietnam/resource/IMAGE/2025/5/18/dbf5293517d642f1be1208d9a05c2352',
                'isCover' => true,
            ],
            [
                'campaign_id' => 2,
                'gambar' => 'https://www.giving.sg/res/GetCampaignImage/54b75e67-34cc-4431-b99d-8d6dd775af07.jpg',
                'isCover' => true,
            ],
            [
                'campaign_id' => 3,
                'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_1Ruhv_fKxqhd5bt7-Q6LFrhH8PmL9TjIZQ&s',
                'isCover' => true,
            ],
            [
                'campaign_id' => 4,
                'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXI0zMKALhBBuCH7n_jzZlO8rX8AW7Oc3H8A&s',
                'isCover' => true,


            ],
            [
                'campaign_id' => 5,
                'gambar' => 'https://images.unsplash.com/photo-1661405001746-264a95ad6fea?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'isCover' => true,
            ],
            [
                'campaign_id' => 6,
                'gambar' => 'https://images.unsplash.com/photo-1625314563148-572c6af9e9d5?q=80&w=2046&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'isCover' => true,
            ],
            [
                'campaign_id' => 7,
                'gambar' => 'https://images.unsplash.com/photo-1643213379811-17f8c9ec7b66?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'isCover' => true,
            ],
            [
                'campaign_id' => 8,
                'gambar' => 'https://images.unsplash.com/photo-1650234856233-63058d00ba52?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'isCover' => true,
            ],
            [
                'campaign_id' => 9,
                'gambar' => 'https://images.unsplash.com/photo-1607536143324-9ea8ceaecdbf?q=80&w=1965&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'isCover' => true,
            ],
            [
                'campaign_id' => 10,
                'gambar' => 'https://images.unsplash.com/photo-1587585113851-269ef0e07d9c?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'isCover' => true,
            ],
        ]);
    }
}
