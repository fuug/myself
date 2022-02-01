<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();

            $table->unsignedBigInteger('performer_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();

            $table->index('performer_id', 'event_user_performer_idx');
            $table->index('customer_id', 'event_user_customer_idx');

            $table->foreign('performer_id', 'event_user_performer_fk')->on('users')->references('id');
            $table->foreign('customer_id', 'event_user_customer_fk')->on('users')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
