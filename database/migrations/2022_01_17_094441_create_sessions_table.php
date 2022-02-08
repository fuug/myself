<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->boolean('is_done')->default(0);
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();

            $table->unsignedBigInteger('subscription_id')->nullable();
            $table->unsignedBigInteger('performer_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();

            $table->index('performer_id', 'session_user_performer_idx');
            $table->index('customer_id', 'session_user_customer_idx');
            $table->index('subscription_id', 'session_subscription_idx');

            $table->foreign('performer_id', 'session_user_performer_fk')->on('users')->references('id');
            $table->foreign('customer_id', 'session_user_customer_fk')->on('users')->references('id');
            $table->foreign('subscription_id', 'session_subscription_fk')->on('subscriptions')->references('id');

            $table->softDeletes();
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
        Schema::dropIfExists('sessions');
    }
}
