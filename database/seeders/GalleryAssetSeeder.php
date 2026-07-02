<?php

namespace Database\Seeders;

use App\Models\GalleryAsset;
use Illuminate\Database\Seeder;

class GalleryAssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GalleryAsset::truncate();

        GalleryAsset::create([
            'category' => 'Research',
            'media_type' => 'image',
            'upload_method' => 'link',
            'external_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAxR3DZ3pvj7Viuv0dRg5asdZ0QF0B2WFC_0Ii9djLCwNs60Pq9u11FB4SNZGzCmU2c-_8zLyrDQ_tPxAJ_MlUPvAqwJ2Z-eQASjSwKrXyhlpT9h1FVG3FOx1GZfnaXdp-gk2-1pEiXHMUm8qeDnoWGHbaQNszPJZtUrQ2p3F2c30LcVj_72aLNK5pKDzeQsCY0hZFBSiEyZiCAnKBk_-w9L6iiYIi_rEXOPo9cb8DaZEt2PC25Lfmg4qQch7T2sJLSHL4C3PNM1u9e',
            'title' => 'Decentralized Neural Fabric Mockup',
            'description' => 'Architectural visual of collaborative sandboxed agent pools syncing database workloads.',
            'is_featured' => true,
        ]);

        GalleryAsset::create([
            'category' => 'Telemetry',
            'media_type' => 'image',
            'upload_method' => 'link',
            'external_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBsc6C1AKSAiGZL6EMB_oXGr7BnYqNWFSsj4Vs4-YC5_vhBepEIuGOHgIn2ShsKi3RPJoQnXpQk9wk3I1KL_qaSeLNy8KerG3Mbtgd0Aq2Fum2Y9zkB1VRPb_JaLZT6w0G5HPbEPJN4nvcC0BhbdVXsnAiSa_6KHx96MUsIa6GWtiXwf1vXBl1A1j3i3ajUibzfFLFQoC6PC5fe9v6AdruTSLY-LrLAZagqA11uxEasK7kdeyCSsAzObpT5qMzusqUZdZVVVI52Poc4',
            'title' => 'Multi-Database Telemetry Cluster',
            'description' => 'Continuous integrity monitoring graphs displaying latency peaks and automated failovers.',
            'is_featured' => true,
        ]);
    }
}
