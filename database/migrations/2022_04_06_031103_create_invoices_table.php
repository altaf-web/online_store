<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_id");
            $table->unsignedBigInteger("user_id");
            $table->string("pay_to",40);
            $table->string("pay_from",40);
            $table->unsignedFloat("credit_amount",15,2);
            $table->float("quantity", 15,2);
            $table->unsignedTinyInteger("payment_type")->comment("1=>cash, 2=>cheque_no");
            $table->dateTime("payment_date_time");
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
        Schema::dropIfExists('invoices');
    }
};
