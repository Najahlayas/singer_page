<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NewsArticle;
use Carbon\Carbon;

class NewsChartSeeder extends Seeder
{
    public function run()
    {
        $days = [
            0 => 1, // السبت
            1 => 3, // الأحد
            2 => 5, // الاثنين
            3 => 2, // الثلاثاء
            4 => 6, // الأربعاء
            5 => 4, // الخميس
            6 => 1, // الجمعة
        ];


        foreach ($days as $day => $count) {

            for ($i = 1; $i <= $count; $i++) {

                $date = Carbon::now()
                    ->startOfWeek()
                    ->addDays($day)
                    ->setTime($i, 0);


                NewsArticle::create([

                    'title' => "خبر اليوم رقم {$i}",

                    'body' => "محتوى تجريبي للخبر رقم {$i}",

                    'created_at' => $date,

                    'updated_at' => $date,

                ]);

            }

        }
    }
}
