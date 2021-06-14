<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farm_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 225);
            $table->string('email', 255)->unique();
            $table->dateTime('email_verified_at')->nullable();
            $table->string('password');
            $table->string('tel', 255)->unique()->comment('電話番号');
            $table->string('tel', 255)->comment('郵便番号');
            $table->integer('pref_id')->unsigned()->comment('都道府県ID');
            $table->string('municipality' ,255)->comment('市町村');
            $table->string('address' ,255)->comment('番地');
            $table->string('building' ,255)->comment('建物名');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farm_users');
    }
}
