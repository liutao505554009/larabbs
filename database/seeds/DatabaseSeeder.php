<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    // 简单的数据填充. 直接在本类中写一个方法来加载就行


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $this->seedUser();
        $this->seedTopic();
        $this->seedReply();


    }

    protected function seedUser()
    {
        $now = \Carbon\Carbon::now();

        \Illuminate\Database\Eloquent\Model::unguard();

        // use the faker library to mock some data
        $faker = Faker\Factory::create();

        // 头像假数据
        $avatars = [
            'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/s5ehp11z6s.png?imageView2/1/w/200/h/200',
            'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/Lhd1SHqu86.png?imageView2/1/w/200/h/200',
            'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/LOnMrqbHJn.png?imageView2/1/w/200/h/200',
            'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/xAuDMxteQy.png?imageView2/1/w/200/h/200',
            'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/ZqM7iaP4CR.png?imageView2/1/w/200/h/200',
            'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/NDnzMutoxX.png?imageView2/1/w/200/h/200',
        ];

        // create 30 articles
        foreach(range(1, 30) as $index) {
            \App\Models\User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('123456qq'),
                'avatar' => $faker->randomElement($avatars),
//            'remember_token' => str_random(10),
                'introduction' => $faker->sentence(),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        \Illuminate\Database\Eloquent\Model::unguard();

        // 单独处理第一个用户的数据
        $user = \App\Models\User::find(1);
        $user->name = 'liutao';
        $user->email = 'liutao@qq.com';
        $user->avatar = 'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/ZqM7iaP4CR.png?imageView2/1/w/200/h/200';
        $user->save();

    }

    protected function seedTopic()
    {

//        \Illuminate\Database\Eloquent\Model::unguard();

        // use the faker library to mock some data
        $faker = Faker\Factory::create();

        // 随机取一个月以内的时间
        $updated_at = $faker->dateTimeThisMonth();
        // 传参为生成最大时间不超过，创建时间永远比更改时间要早
        $created_at = $faker->dateTimeThisMonth($updated_at);

        // create 30 articles
        foreach(range(1, 30) as $index) {
            \App\Models\Topic::create([
                'title' => $faker->sentence(),
                'body' => $faker->text(),
                'excerpt' => $faker->sentence(),
                'user_id' => rand(1, 10),
                'category_id' => rand(1, 4),
                'created_at' => $created_at,
                'updated_at' => $updated_at,
            ]);
        }

//        \Illuminate\Database\Eloquent\Model::unguard();
    }


    protected function seedReply()
    {
        // use the faker library to mock some data
        $faker = Faker\Factory::create();

        $time = $faker->dateTimeThisMonth();

        // 所有用户 ID 数组，如：[1,2,3,4]
        $user_ids = \App\Models\User::all()->pluck('id')->toArray();

        // 所有话题 ID 数组，如：[1,2,3,4]
        $topic_ids = \App\Models\Topic::all()->pluck('id')->toArray();

        // use the faker library to mock some data
        $faker = Faker\Factory::create();

        // create 30
        foreach(range(1, 30) as $index) {
            \App\Models\Reply::create([
                'content' => $faker->sentence(),
                'created_at' => $time,
                'updated_at' => $time,
                'user_id'    => $faker->randomElement($user_ids),
                'topic_id'    => $faker->randomElement($topic_ids),
            ]);
        }

    }

}
