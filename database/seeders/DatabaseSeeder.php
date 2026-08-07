<?php

namespace Database\Seeders;

use App\Models\NewsArticle;
use App\Models\User;
use App\Models\Work;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
        ]);

Work::factory(3)->create([
        // {{-- album art, Song image, album title, song title, audio url --}}
        'album_art' => 'album_arts/album_art.jpg',
        'song_image' => 'song_images/song_image.jpg',
        'album_title' => 'البوم اختبار 1',
        'song_title' => 'اغنية اختبار 1',
        'audio_url' => 'audio_files/song_url.mp3',
        ]);

        Work::factory(3)->create([
        // {{-- album art, Song image, album title, song title, audio url --}}
        'album_art' => 'album_arts/album_art.jpg',
        'song_image' => 'song_images/song_image.jpg',
        'album_title' => 'البوم اختبار 2',
        'song_title' => 'اغنية اختبار 2',
        'audio_url' => 'audio_files/song_url.mp3',
        ]);

        Work::factory(3)->create([
        // {{-- album art, Song image, album title, song title, audio url --}}
        'album_art' => 'album_arts/album_art.jpg',
        'song_image' => 'song_images/song_image.jpg',
        'album_title' => 'البوم اختبار 3',
        'song_title' => 'اغنية اختبار 3',
        'audio_url' => 'audio_files/song_url.mp3',
        ]);


NewsArticle::factory(3)->create([
    'image' => 'news/news_cover.jpg',
    'title' => 'لوريم إيبسوم نص افتراضي 1',
    'body' => 'لوريم إيبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريق وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعة أو نماذج مواقع إنترنت.

عندما بدأ الرسامون والمصممين في استخدام نصوص لوريم إيبسوم، كانت الفكرة تكمن في توزيع الحروف بشكل عشوائي ليعطي انطباعاً كأن النص حقيقي. ومنذ ذلك الوقت، أصبح هذا النص معياراً للنص الصوري في الصناعة.

ولقد نجت هذه التقنية ليس فقط لخمسة قرون، بل اجتاحت أيضاً عالم المنشورات الإلكترونية وبقيت كما هي دون تغيير يذكر. لقد انتشرت بشكل كبير في الستينات من هذا القرن مع إصدار رقائق "ليتراسيت" التي تحتوي على مقاطع من لوريم إيبسوم.

وفي الآونة الأخيرة، عاد هذا النص للظهور مرة أخرى مع برامج النشر المكتبي مثل "ألدوس بايج ميكر" والتي تضمنت نسخاً من هذا النص الشهير.',
]);


NewsArticle::factory(3)->create([
    'image' => 'news/news_cover.jpg',
    'title' => 'لوريم إيبسوم نص افتراضي 2',
    'body' => 'لكن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول استنكار النشوة وتمجيد الألم نشأت نتيجة لنظام هجين. سأعرض لك التفاصيل لتوضيح كيف نشأت هذه الفكرة العلمية حول السعادة القصوى.

لا أحد يرفض أو يكره أو يتجنب السعادة في حد ذاتها، ولكن لأن الذين لا يعرفون كيف يتابعون السعادة بعقلانية يواجهون عواقب مؤلمة للغاية. وبالمثل، لا يوجد أحد يحب الألم لذاته أو يسعى إليه.

في سياق متصل، من الواجب علينا أن نبحث في الأسباب التي تجعل البعض يفضلون المعاناة على الراحة في حالات معينة. إن المهام التي نضطلع بها يومياً تتطلب قدراً من التركيز والصبر، وهذا ما يوفره لنا هذا النص الافتراضي لاختبار قدرات العرض البصري.

هناك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض الكلمات العشوائية التي لا تبدو منطقية على الإطلاق.',
]);


NewsArticle::factory(3)->create([
    'image' => 'news/news_cover.jpg',
    'title' => 'لوريم إيبسوم نص افتراضي 3',
    'body' => 'أبجد هوز حطي كلمن سعفص قرشت ثخذ ضظغ. هذا نص تجريبي لاختبار شكل الخط وحجمه والمسافات بين الفقرات. يستخدم هذا النص في مطابع التصميم والمكاتب الفنية منذ زمن بعيد.

يتكون هذا النص من مجموعة من الجمل العشوائية التي لا تحمل معنى محدداً، والهدف منها هو إظهار جماليات التنسيق اللغوي وتوزيع الكتل النصية في الصفحة بشكل متوازن.

يعتبر نص لوريم إيبسوم العربي وسيلة ممتازة للمصممين والمطورين لملء المساحات الفارغة قبل اعتماد المحتوى النهائي من قبل كاتب المحتوى أو العميل، لضمان جودة التصميم النهائي.'
]);

        // المدير
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('password'),
            'status' => 'active',
        ]);

        $admin->assignRole('admin');


        // المستخدمون
        $users = [
            [
                'name' => 'Ahmed Ali',
                'email' => 'ahmed@email.com',
            ],
            [
                'name' => 'Mohamed Salem',
                'email' => 'mohamed@email.com',
            ],
            [
                'name' => 'Sara Ahmed',
                'email' => 'sara@email.com',
            ],
            [
                'name' => 'Fatima Ali',
                'email' => 'fatima@email.com',
            ],
            [
                'name' => 'Omar Khaled',
                'email' => 'omar@email.com',
            ],
            [
                'name' => 'Nour Hassan',
                'email' => 'nour@email.com',
            ],
        ];


        foreach ($users as $data) {

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make('password'),
                'status' => 'active',
            ]);

            $user->assignRole('user');
        }
    }

}
