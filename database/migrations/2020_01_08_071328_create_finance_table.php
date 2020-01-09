<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_finance_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code');
            $table->integer('vch_id',11)->nullable();
            $table->string('customer_name')->nullable();
            $table->string('guranter_name')->nullable();
            $table->string('customer_address')->nullable();
            $table->string('guranter_address')->nullable();
            $table->integer('customer_state_id',11)->nullable();
            $table->integer('guranter_state_id',11)->nullable();
            $table->integer('customer_city_id',11)->nullable();
            $table->integer('guranter_city_id',11)->nullable();
            $table->string('contract_no')->nullable();
            $table->date('contract_date')->nullable();
            $table->integer('contract_period',11)->nullable();
            $table->date('expair_date')->nullable();
            $table->integer('finance_rate',11)->nullable();
            $table->string('moratorium')->nullable();
            $table->string('product_model')->nullable();
            $table->string('engine_no')->nullable();
            $table->string('chassis_no')->nullable();
            $table->string('reg_no')->nullable();
            $table->string('finance_com_name')->nullable();
            $table->decimal('finance_amount',10,2)->nullable();
            $table->decimal('total_amount',10,2)->nullable();
            $table->decimal('interest_charges',10,2)->nullable();
            $table->decimal('paid',10,2)->nullable();
            $table->decimal('documentation_charge',10,2)->nullable();
            $table->decimal('balance',10,2)->nullable();
            $table->decimal('first_year_insurance',10,2)->nullable();
            $table->decimal('expanse1',10,2)->nullable();
            $table->decimal('expanse2',10,2)->nullable();
            $table->decimal('expanse3',10,2)->nullable();
            $table->string('remark1')->nullable();
            $table->string('remark2')->nullable();
            $table->string('remark3')->nullable();
            $table->decimal('agreement_value',10,2)->nullable();
            $table->integer('installment_no',11)->nullable();
            $table->decimal('per_installment_amount',10,2)->nullable();
            $table->date('first_installment_date')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamps();
        });

        Schema::create('vehicle_finance_installment_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code');
            $table->string('request_id')->nullable();
            $table->string('vch_id')->nullable();
            $table->date('fist_ins_date_lst')->nullable();
            $table->decimal('per_ins_amt_lst',10,2)->nullable();
            $table->decimal('agreement_value_lst',10,2)->nullable();;
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('vehicle_finance_details');
        Schema::dropIfExists('vehicle_finance_installment_details');
        Schema::dropIfExists('finance');
    }
}
