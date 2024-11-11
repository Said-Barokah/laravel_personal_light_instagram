<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Feed;
use Illuminate\Support\Facades\DB;

class FeedSeeder extends Seeder
{
    public function run()
    {
        $mediaPaths = [
            'feed/image_1.jpg',
            'feed/image_2.jpg',
            'feed/video_1.mp4',
            'feed/video_2.mp4'
        ];

        $data = [];
        for ($i = 1; $i <= 20; $i++) {
            $mediaPath = $mediaPaths[array_rand($mediaPaths)];
            $mediaType = str_contains($mediaPath, 'video') ? 'video' : 'image';

            $data[] = [
                'user_id' => 1, // Sesuaikan dengan ID pengguna yang ada
                'media_path' => $mediaPath,
                'media_type' => $mediaType,
                'caption' => 'Caption for feed item ' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('feeds')->insert($data);
    }
}
