<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('prices', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->enum('type', ['adult', 'child', 'family', 'group', 'primary', 'secondary']);
      $table->string('name', 30);
      $table->text('description')->nullable();
      $table->string('cost', 10, 2);

      $table->unsignedBigInteger('event_id');
      $table->foreign('event_id')
        ->references('id')
        ->on('events')
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
    Schema::dropIfExists('prices');
  }
}
