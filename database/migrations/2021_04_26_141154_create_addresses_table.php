<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('addresses', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->enum('type', ['main', 'secondary', 'tertiary', 'company', 'event', 'venue', 'person'])->default('main');
      $table->string('street1', 100);
      $table->string('street2', 100)->nullable();
      $table->string('zip', 10);
      $table->enum('canton', [
        'Appenzell Inner-Rhodes', 'Appenzell Outer-Rhodes', 'Argovia', 'Basel-City', 'Basel-Country', 'Berne', 'Friburg',
        'Geneva', 'Glarus', 'Grisons', 'Jura', 'Lucerne', 'Neuchâtel', 'Nidwald', 'Obwald', 'Schaffhouse', 'Schwyz', 'Soleure', 'St. Gall', 'Tessin',
        'Thurgovia', 'Uri', 'Vaud', 'Wallis', 'Zoug', 'Zurich'
      ])->nullable();
      $table->string('region', 30)->nullable();
      $table->string('city', 30);
      $table->string('country', 30);
      $table->string('firstname', 30)->nullable();
      $table->string('lastname', 30)->nullable();
      $table->string('longitude', 30)->nullable();
      $table->string('latitude', 30)->nullable();
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
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('addresses');
  }
}
