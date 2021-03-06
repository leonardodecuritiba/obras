<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisitionBuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisition_buys', function (Blueprint $table) {
            $table->increments('id');

	        $table->unsignedInteger('requisition_budget_id');
	        $table->foreign('requisition_budget_id')->references('id')->on('requisition_budgets')->onDelete('cascade');
	        $table->unsignedInteger('supplier_id');
	        $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
	        $table->unsignedInteger('brand_id')->nullable();
	        $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');

	        $table->decimal('quantity',20,2);
	        $table->decimal('value',20,2);
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
        Schema::dropIfExists('requisition_buys');
    }
}
