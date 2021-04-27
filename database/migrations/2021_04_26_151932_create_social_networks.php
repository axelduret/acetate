<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialNetworks extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('social_networks', function (Blueprint $table) {
      $table->id();
      $table->enum('type', ['twitter', 'facebook', 'instagram', 'linkedin', 'youtube', 'twitch', 'tiktok', 'snapchat']);

      $table->unsignedBigInteger('website_id');
      $table->foreign('website_id')
        ->references('id')
        ->on('websites')
        ->onDelete('cascade')
        ->onUpdate('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('social_networks');
  }
}
