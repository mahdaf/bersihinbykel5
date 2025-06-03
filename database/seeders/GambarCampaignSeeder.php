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
        ]);
    }
}
