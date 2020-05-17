<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeywordRecruitmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keyword_recruitment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('keyword_id')->comment('外部key');
            $table->unsignedBigInteger('recruitment_id')->comment('外部key');
            $table->timestamps();
            $table->foreign('keyword_id')->references('id')->on('keywords')->onDelete('cascade');
            $table->foreign('recruitment_id')->references('id')->on('recruitments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keyword_recruitment');
    }
}
