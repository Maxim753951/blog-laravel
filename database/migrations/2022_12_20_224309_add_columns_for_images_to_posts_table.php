<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsForImagesToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('preview_image')->nullable();
            $table->string('main_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // лёгенький чит с делением операции dropColumn на 2 части, так как вместе не работает
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('preview_image');
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('main_image');
        });
    }
}