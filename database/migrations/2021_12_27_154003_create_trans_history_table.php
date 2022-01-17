<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trans_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaction_id');// fk
            $table->unsignedInteger('status_id'); // fk
            $table->unsignedInteger('user_id')->nullable(); // fk
            $table->string('reason')->default('');
            $table->timestamps();

            // fks
            $table->foreign('transaction_id')->references('id')->on('transactions');
            $table->foreign('status_id')->references('id')->on('status');
            $table->foreign('user_id')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trans_history');
    }
}
