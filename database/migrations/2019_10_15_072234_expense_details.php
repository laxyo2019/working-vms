<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExpenseDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_entry', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code',100);
            $table->string('serial_no')->nullable();
            $table->date('serial_date')->nullable();
            $table->string('job_by')->nullable();
            $table->string('address')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('tin_no')->nullable();
            $table->string('bill_no')->nullable();
            $table->date('bill_date')->nullable();
            $table->string('expense_type')->nullable();
            $table->string('vehicle_no')->nullable();
            $table->decimal('total_qty',10,2)->nullable();
            $table->decimal('total_amount',10,2)->nullable();
            $table->decimal('service_tax_amount',10,2)->nullable();
            $table->decimal('vat_tax_amount',10,2)->nullable();
            $table->decimal('net_amt_sum',10,2)->nullable();
            $table->string('payment_mode')->nullable();
            $table->string('pay_no')->nullable();
            $table->date('pay_dt')->nullable();
            $table->string('pay_bank')->nullable();
            $table->string('pay_branch')->nullable();
            $table->string('remark ')->nullable();
            $table->string('created_by ')->nullable();
            $table->timestamps();
        });

        Schema::create('expense_entry_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code',100);
            $table->string('serial_no')->nullable();
            $table->date('serial_date')->nullable();
            $table->string('entry_id')->nullable();
            $table->string('expense_details')->nullable();
            $table->string('vehicle_id')->nullable();
            $table->string('expense_type_id')->nullable();
            $table->string('job_by')->nullable();
            $table->decimal('qty',10,2)->nullable();
            $table->decimal('rate',10,2)->nullable();
            $table->decimal('amt',10,2)->nullable();
            $table->decimal('service_tax',10,2)->nullable();
            $table->decimal('service_tax_amt_t',10,2)->nullable();
            $table->decimal('vat_tax',10,2)->nullable();
            $table->decimal('vat_tax_amt_t',10,2)->nullable();
            $table->decimal('net_amt',10,2)->nullable();
            $table->string('created_by ')->nullable();
            $table->timestamps();
        });

        Schema::create('expense_payment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code',100);
            $table->string('entry_no')->nullable();
            $table->date('entry_date')->nullable();
            $table->string('job_done_by')->nullable();
            $table->string('address')->nullable();
            $table->decimal('total_balance_amount',10,2)->nullable();
            $table->decimal('total_paid_amount',10,2)->nullable();
            $table->decimal('total_remaining_amount',10,2)->nullable();
            $table->string('paid_by')->nullable();
            $table->string('payment_mode')->nullable();
            $table->string('pay_no')->nullable();
            $table->date('pay_dt')->nullable();
            $table->string('pay_bank')->nullable();
            $table->string('pay_branch')->nullable();
            $table->string('remark ')->nullable();
            $table->string('created_by ')->nullable();
            $table->timestamps();
        });

        Schema::create('expense_payment_item_entry', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code',100);
            $table->string('serial_no')->nullable();
            $table->date('serial_date')->nullable();
            $table->string('request_id')->nullable();
            $table->string('bill_no')->nullable();
            $table->date('bill_date')->nullable();
            $table->string('vch_id')->nullable();
            $table->string('job_by')->nullable();
            $table->string('paid_by')->nullable();
            $table->string('expense_type_id')->nullable();
            $table->decimal('qty',10,2)->nullable();
            $table->decimal('rate',10,2)->nullable();
            $table->decimal('amt',10,2)->nullable();
            $table->decimal('service_tax',10,2)->nullable();
            $table->decimal('service_tax_amt_t',10,2)->nullable();
            $table->decimal('vat_tax',10,2)->nullable();
            $table->decimal('vat_tax_amt_t',10,2)->nullable();
            $table->decimal('net_amt',10,2)->nullable();
            $table->decimal('paid_amt',10,2)->nullable();
            $table->decimal('remaining_amt',10,2)->nullable();
            $table->string('created_by ')->nullable();
            $table->timestamps();
        });

        Schema::create('accident_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code',100);
            $table->string('accident_no')->nullable();
            $table->date('entry_date')->nullable();
            $table->string('case_no')->nullable();
            $table->string('vehicle_no')->nullable();
            $table->date('accident_date')->nullable();
            $table->string('accident_city')->nullable();
            $table->string('address')->nullable();
            $table->string('driver_name')->nullable();
            $table->decimal('total_damage',10,2)->nullable();
            $table->string('paid_by')->nullable();
            $table->decimal('total_claim_amount',10,2)->nullable();
            $table->date('claim_date')->nullable();
            $table->decimal('net_damage',10,2)->nullable();
            $table->date('paid_date')->nullable();
            $table->string('remarks ')->nullable();
            $table->string('doc_file ')->nullable();
            $table->string('created_by ')->nullable();
            $table->timestamps();
        });

        Schema::create('expense_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code',100);
            $table->unsignedInteger('type_id');
            $table->unsignedInteger('mode_id');
            $table->decimal('exp_amt',10,2);
            $table->date('exp_dt');
            $table->timestamps();
        });

        Schema::create('expense_catg_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code',100);
            $table->string('catg_name',10);
            $table->string('catg_desc',10);
            $table->timestamps();
        });

        Schema::create('expense_mode_mast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code',100);
            $table->string('mode_name',10);
            $table->string('mode_desc',10);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('expense_entry');
        Schema::dropIfExists('expense_entry_item');
        Schema::dropIfExists('expense_payment');
        Schema::dropIfExists('expense_payment_item_entry');
        Schema::dropIfExists('accident_details');
        Schema::dropIfExists('expense_mast');
        Schema::dropIfExists('expense_mode_mast');
        Schema::dropIfExists('expense_catg_mast');
    }
}
