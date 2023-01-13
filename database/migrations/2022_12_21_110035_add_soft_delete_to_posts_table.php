<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftDeleteToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Sqlite не позволяет удалить колонку, если есть данные в этой таблице
        // Теоретическое решение:
        // создавать копию данных, копию таблицы, перезаливать это, менять колонки
        // Поэтому в рабочих проектах н еиспользуем Sqlite (либо Москов, либо Постгресс)
        Schema::table('posts', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
