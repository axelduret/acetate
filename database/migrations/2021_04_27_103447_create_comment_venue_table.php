<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentVenueTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('comment_venue', function (Blueprint $table) {

      $table->unsignedBigInteger('comment_id')->index();
      $table->foreign('comment_id')
        ->references('id')
        ->on('comments')
        ->onDelete('restrict')
        ->onUpdate('restrict');

      $table->unsignedBigInteger('venue_id')->index();
      $table->foreign('venue_id')
        ->references('id')
        ->on('venues')
        ->onDelete('restrict')
        ->onUpdate('restrict');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('comment_venue');
  }
}
