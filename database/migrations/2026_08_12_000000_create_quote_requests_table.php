<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuoteRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quote_requests', function (Blueprint $table) {
            $table->id();
            $table->string('quote_no')->unique();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('company_name')->nullable();
            $table->text('message')->nullable();
            $table->enum('status', ['pending', 'contacted', 'completed', 'cancelled'])->default('pending');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
        });

        Schema::create('quote_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quote_request_id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('product_name');
            $table->string('part_number')->nullable();
            $table->string('model_number')->nullable();
            $table->string('manufacturer_name')->nullable();
            $table->integer('quantity')->default(1);
            $table->decimal('unit_price', 12, 2)->default(0);
            $table->decimal('total_price', 12, 2)->default(0);
            $table->timestamps();

            $table->foreign('quote_request_id')->references('id')->on('quote_requests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quote_items');
        Schema::dropIfExists('quote_requests');
    }
}
