<?php

namespace Database\Seeders;

use App\Models\NewsArticle;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test Admin',
            'password' => bcrypt('password'),
            'email' => 'admin@email.com',
        ]);

        NewsArticle::factory(3)->create([
        'image' => 'https://placehold.co/500/blue/yellow',
        'title' => 'seed news batch  1',
        'body' => 'Irure excepteur ut aliqua aliqua sint ea ipsum. Est voluptate sint quis culpa nulla fugiat tempor occaecat enim culpa anim enim. In elit aliqua pariatur excepteur ad consectetur cillum commodo nulla eiusmod commodo cupidatat tempor. Nulla aliquip do excepteur nulla veniam. Eiusmod duis do cillum adipisicing. Duis in aliqua quis dolore aliqua nisi adipisicing ex excepteur labore esse. Amet ullamco sit laborum quis eiusmod esse dolore dolor non adipisicing aute.

Reprehenderit tempor veniam deserunt eu fugiat aliqua ad incididunt fugiat laborum nostrud do. Amet aliqua deserunt veniam officia consectetur. Fugiat eu nulla consectetur deserunt cillum officia. Est aliqua reprehenderit consequat id commodo velit sunt occaecat nulla eu velit ut. Fugiat veniam commodo nulla magna dolor dolore dolore velit tempor ut ut esse. Mollit veniam consectetur in labore amet. Aliqua reprehenderit elit eiusmod amet culpa mollit.

Et laborum et minim aliquip pariatur cupidatat sint. Eu laborum Lorem dolore ipsum et sit incididunt excepteur ea labore deserunt fugiat. Ea do reprehenderit culpa dolore nisi. Sit ex eu aute adipisicing incididunt mollit irure ea reprehenderit quis proident veniam. Adipisicing sint nisi incididunt nulla enim nulla ipsum.

Tempor nulla aliqua enim proident duis ea adipisicing ea. In nostrud consequat exercitation magna incididunt velit consectetur exercitation nisi minim quis. Id tempor id aliquip enim. Eu laboris in ipsum adipisicing velit consectetur ad quis commodo nulla nostrud velit exercitation non. Cillum Lorem esse sunt nulla esse laboris pariatur minim cillum elit ea.

Cupidatat eu consectetur occaecat eu anim eu tempor eiusmod eiusmod ea id aliquip laboris. Laborum est ad elit consequat eu ex laborum aute commodo consectetur adipisicing incididunt. Cupidatat adipisicing sunt ad nulla ut cupidatat ex veniam do aliquip veniam tempor minim.',
        ]);


        NewsArticle::factory(3)->create([
        'image' => 'https://placehold.co/600/black/pink',
        'title' => 'seed news batch  2',
        'body' => 'Incididunt nulla tempor aliquip quis veniam reprehenderit minim culpa irure sit ut sint non. Ipsum fugiat mollit velit mollit amet laborum sint laboris quis ex nostrud. Ipsum irure fugiat laborum dolor sit aliquip deserunt ea exercitation labore eu elit. In cupidatat elit mollit sit esse. Sit nulla adipisicing velit dolore anim culpa dolore do.

Adipisicing esse dolor voluptate esse eiusmod duis ad nulla ipsum do eiusmod excepteur duis. Ullamco quis quis aliquip exercitation et commodo quis laborum incididunt occaecat. Culpa sint nisi pariatur qui et. Consequat veniam consectetur in sit labore quis.

Velit et consectetur reprehenderit dolore eiusmod do voluptate in qui ullamco id labore nisi irure. Ea et velit nostrud do reprehenderit reprehenderit voluptate anim nulla. Quis minim ea laborum proident sunt quis dolor commodo. Mollit cupidatat ullamco cupidatat enim officia. Anim dolore pariatur cillum consequat ea labore mollit voluptate et eu anim sint ad pariatur. Quis qui ipsum quis labore enim excepteur ad cupidatat consequat sunt amet adipisicing tempor.

Nostrud do eu ut mollit. Non officia excepteur minim ullamco ex labore nisi commodo. Deserunt dolor id ad id fugiat veniam aliquip reprehenderit et. Veniam nisi voluptate id mollit duis reprehenderit veniam elit ex nisi laborum pariatur. Commodo veniam incididunt officia incididunt.',
        ]);


        NewsArticle::factory(3)->create([
        'image' => 'https://placehold.co/200/red/purple',
        'title' => 'seed news batch  3',
    'body' => 'Esse laborum aliquip dolore enim. Exercitation occaecat officia culpa commodo occaecat elit qui nisi mollit aliqua laborum ut. Nisi voluptate quis mollit dolore et.

Officia ea est dolore consectetur laborum do fugiat do consequat officia ea. Enim cillum cupidatat enim laboris consectetur esse nisi. Excepteur laboris elit nostrud exercitation aliquip mollit irure. Est sit sunt dolor Lorem ea ut duis dolor.

Ipsum laborum excepteur est sunt dolore est mollit excepteur adipisicing officia et non ullamco. Dolor tempor sit ea adipisicing laboris ad id aliqua nostrud. Cupidatat mollit tempor deserunt ipsum eu veniam.'
        ]);
    }
}
