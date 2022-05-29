<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Articles extends Seeder
{
    public function run()
    {
        //
        $datas = [
            // [
            //     'title' => 'Twitter Diakuisisi Elon Musk',
            //     'content' => 'Jakarta, sebagian besar saham twitter baru-baru ini dibeli oleh orang terkaya sedunia yaitu Elon Musk',
            //     'author_id' => 1,
            //     'slug' => 'twitter-diakuisisi-elon-musk',
            //     'status' => 'publish',
            //     'category_id' => 1
            // ],
            // [
            //     'title' => 'Film Wuxia Terbaru',
            //     'content' => 'Who Rules The Word akan dirilis bulan Mei ini oleh Tencen Picture, menampilkan Yang-Yang dan Zhao Luci',
            //     'author_id' => 2,
            //     'slug' => 'film-wuxia-terbaru', 
            //     'category_id' => 2
            // ]
        ];

        for ($i = 0; $i <= 15; $i++) {
            $arr = [
                'title' => 'Twitter Diakuisisi Elon Musk' . $i,
                'content' => 'Jakarta, sebagian besar saham twitter baru-baru ini dibeli oleh orang terkaya sedunia yaitu Elon Musk',
                'author_id' => 1,
                'slug' => 'twitter-diakuisisi-elon-musk',
                'status' => 'publish',
                'category_id' => 1
            ];

            array_push($datas, $arr);
            // echo $num[$i];
        }

        foreach ($datas as $data) {
            $this->db->table('articles')->insert($data);
        };
    }
}
