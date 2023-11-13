<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialListUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_list_user', function (Blueprint $table) {
            $table->unsignedBigInteger('social_list_id');
            $table->unsignedBigInteger('user_id');
        
            $table->foreign('social_list_id')->references('id')->on('social_lists');
            $table->foreign('user_id')->references('id')->on('users');
        
            $table->primary(['social_list_id', 'user_id']); 
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('social_list_user');
    }
}
