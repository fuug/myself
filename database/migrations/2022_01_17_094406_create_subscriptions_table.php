<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('price');
            $table->integer('session_count')->default(0);

            $table->unsignedBigInteger('performer_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();

            $table->index('performer_id', 'subscription_user_performer_idx');
            $table->index('customer_id', 'subscription_user_customer_idx');

            $table->foreign('performer_id', 'subscription_user_performer_fk')->on('users')->references('id');
            $table->foreign('customer_id', 'subscription_user_customer_fk')->on('users')->references('id');

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
        Schema::dropIfExists('subscriptions');
    }
}
