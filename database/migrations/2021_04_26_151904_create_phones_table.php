<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhonesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('phones', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->enum('type', ['mobile', 'home', 'pro'])->default('mobile');
      $table->string('number', 30);
      $table->string('firstname', 30);
      $table->string('lastname', 30);
      $table->string('company', 30)->nullable();

      $table->unsignedBigInteger('user_id')->nullable();
      $table->foreign('user_id')
        ->references('id')
        ->on('users')
        ->onDelete('cascade')
        ->onUpdate('cascade');

      $table->unsignedBigInteger('event_id')->nullable();
      $table->foreign('event_id')
        ->references('id')
        ->on('events')
        ->onDelete('cascade')
        ->onUpdate('cascade');

      $table->unsignedBigInteger('person_id')->nullable();
      $table->foreign('person_id')
        ->references('id')
        ->on('people')
        ->onDelete('cascade')
        ->onUpdate('cascade');

      $table->unsignedBigInteger('venue_id')->nullable();
      $table->foreign('venue_id')
        ->references('id')
        ->on('venues')
        ->onDelete('cascade')
        ->onUpdate('cascade');

      $table->unsignedBigInteger('ticket_id')->nullable();
      $table->foreign('ticket_id')
        ->references('id')
        ->on('tickets')
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
    Schema::dropIfExists('phones');
  }
}
