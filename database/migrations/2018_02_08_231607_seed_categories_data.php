<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $now = \Carbon\Carbon::now();
        $categories = [
            [
                'name'        => '分享',
                'description' => '分享创造，分享发现',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'        => '教程',
                'description' => '开发技巧、推荐扩展包等',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'        => '问答',
                'description' => '请保持友善，互帮互助',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name'        => '公告',
                'description' => '站点公告',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        DB::table('categories')->truncate();
    }
}
