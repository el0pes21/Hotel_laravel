<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('bkg_customer_id');
            $table->string('name')->nullable();
            $table->string('item')->nullable();
            $table->string('purchase_from')->nullable();
            $table->string('purchase_date')->nullable();
            $table->string('purchase_by')->nullable();
            $table->string('amount')->nullable();
            $table->string('paid_by')->nullable();

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
        Schema::dropIfExists('expenses');
    }
};
