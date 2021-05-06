<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBulletinBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulletin_boards', function (Blueprint $table) {
            //言語、悩みの内容、画像url、投稿時間
            $table->id();
            $table->string('language_type',12);
            $table->string('trouble_contents','2000');
            //nullが入力されてもDBに保存される
            $table->longText('url')->nullable($value = true);
            //投稿時間
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bulletin_boards');
    }
}
