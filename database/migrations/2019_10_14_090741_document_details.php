<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DocumentDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_fitness_det', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 100);
            $table->unsignedInteger('vch_id');
            $table->unsignedInteger('agent_id')->nullable();
            $table->string('fitness_no',100)->nullable();
            $table->decimal('fitness_amt',10,2)->nullable();
            $table->string('payment_mode',50)->nullable();
            $table->unsignedInteger('pay_no')->nullable();
            $table->date('pay_dt')->nullable();
            $table->string('pay_bank',100)->nullable();
            $table->string('pay_branch',100)->nullable();
            $table->date('valid_from')->nullable();
            $table->date('valid_till')->nullable();
            $table->date('update_dt')->nullable();
            $table->string('engine_no',100)->nullable();
            $table->string('chassis_no',100)->nullable();
            $table->string('manufacture_year',100)->nullable();
            $table->string('type_of_body',100)->nullable();
            $table->string('type_of_fuel',100)->nullable();
            $table->string('seating_capacity',100)->nullable();
            $table->string('cubic_capacity',100)->nullable();
            $table->string('doc_file',100)->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->timestamps();
        });        

        Schema::create('doc_greentax_det', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 100);
            $table->unsignedInteger('vch_id');
            $table->unsignedInteger('agent_id');
            $table->string('greentax_no',100);
            $table->decimal('greentax_amt',10,2);
            $table->string('payment_mode',50);
            $table->unsignedInteger('pay_no');
            $table->date('pay_dt');
            $table->string('pay_bank',100);
            $table->string('pay_branch',100);
            $table->date('valid_from');
            $table->date('valid_till');
            $table->date('update_dt')->nullable();
            $table->string('doc_file',100)->nullable();
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });        

        Schema::create('doc_insurance_det', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 100);
            $table->unsignedInteger('vch_id');
            $table->unsignedInteger('agent_id')->nullable();
            $table->string('ins_comp',100)->nullable();
            $table->string('ins_policy_no',50)->nullable();
            $table->string('payment_mode',50)->nullable();
            $table->unsignedInteger('pay_no')->nullable();
            $table->date('pay_dt')->nullable();
            $table->string('pay_bank',100)->nullable();
            $table->string('pay_branch',100)->nullable();
            $table->date('valid_from')->nullable();
            $table->date('valid_till')->nullable();
            $table->decimal('ins_amt',10,2)->nullable();
            $table->decimal('ins_pre_amt',10,2)->nullable();
            $table->string('ins_type',20)->nullable();
            $table->date('update_dt')->nullable();
            $table->string('doc_file',100)->nullable();
            $table->string('insured_name',100)->nullable();
            $table->string('ins_total_amt',100)->nullable();
            $table->string('ins_pre_policy_no',100)->nullable();
            $table->decimal('ncb_discount',10,2)->nullable();
            $table->string('hypothecation_agreement',100)->nullable();
            $table->string('engine_no',100)->nullable();
            $table->string('chassis_no',100)->nullable();
            $table->string('manufacture_year',100)->nullable();
            $table->string('type_of_body',100)->nullable();
            $table->string('type_of_fuel',100)->nullable();
            $table->string('seating_capacity',100)->nullable();
            $table->string('cubic_capacity',100)->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->timestamps();
        });        

        Schema::create('doc_puc_det', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 100);
            $table->unsignedInteger('vch_id');
            $table->unsignedInteger('agent_id')->nullable();
            $table->string('puc_no',100)->nullable();
            $table->decimal('puc_amt',10,2)->nullable();
            $table->string('payment_mode',50)->nullable();
            $table->unsignedInteger('pay_no')->nullable();
            $table->date('pay_dt')->nullable();
            $table->string('pay_bank',100)->nullable();
            $table->string('pay_branch',100)->nullable();
            $table->date('valid_from')->nullable();
            $table->date('valid_till')->nullable();             
            $table->date('update_dt')->nullable();
            $table->string('doc_file',100)->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->string('engine_no',100)->nullable();
            $table->string('chassis_no',100)->nullable();
            $table->string('manufacture_year',100)->nullable();
            $table->string('type_of_body',100)->nullable();
            $table->string('type_of_fuel',100)->nullable();
            $table->string('seating_capacity',100)->nullable();
            $table->string('cubic_capacity',100)->nullable();
            $table->timestamps();
        });

        Schema::create('doc_rc_det', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 100);
            $table->unsignedInteger('vch_id');
            $table->unsignedInteger('vch_type_id')->nullable();
            $table->unsignedInteger('agent_id')->nullable();
            $table->string('rc_no',100)->nullable();
            $table->string('hypothecation_agreement',100)->nullable();
            $table->decimal('rc_amt',10,2)->nullable();
            $table->string('payment_mode',50)->nullable();
            $table->unsignedInteger('pay_no')->nullable();
            $table->date('pay_dt')->nullable();
            $table->string('pay_bank',100)->nullable();
            $table->string('pay_branch',100)->nullable();
            $table->date('valid_from')->nullable();
            $table->date('valid_till')->nullable();             
            $table->date('update_dt')->nullable();
            $table->string('doc_file',100)->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->string('engine_no',100)->nullable();
            $table->string('chassis_no',100)->nullable();
            $table->string('manufacture_year',100)->nullable();
            $table->string('type_of_body',100)->nullable();
            $table->string('type_of_fuel',100)->nullable();
            $table->string('seating_capacity',100)->nullable();
            $table->string('cubic_capacity',100)->nullable();
            $table->timestamps();
        });

        Schema::create('doc_statepermit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code', 100);
            $table->unsignedInteger('vch_id');
            $table->unsignedInteger('agent_id')->nullable();
            $table->string('permit_no',100)->nullable();
            $table->unsignedTinyInteger('all_india_permit')->nullable();
            $table->unsignedInteger('state_id')->nullable();
            $table->string('payment_mode',50)->nullable();
            $table->unsignedInteger('pay_no')->nullable();
            $table->date('pay_dt')->nullable();
            $table->string('pay_bank',100)->nullable();
            $table->string('pay_branch',100)->nullable();
            $table->date('valid_from')->nullable();
            $table->date('valid_till')->nullable();             
            $table->date('update_dt')->nullable();
            $table->string('doc_file',100)->nullable();
            $table->decimal('permit_amt',10,2)->nullable();
            $table->unsignedInteger('draft_no')->nullable();
            $table->date('draft_date')->nullable();
            $table->string('engine_no',100)->nullable();
            $table->string('chassis_no',100)->nullable();
            $table->string('manufacture_year',100)->nullable();
            $table->string('type_of_body',100)->nullable();
            $table->string('type_of_fuel',100)->nullable();
            $table->string('seating_capacity',100)->nullable();
            $table->string('cubic_capacity',100)->nullable();
            $table->string('permit_office',100)->nullable();
            $table->string('permit_owner_name',100)->nullable();
            $table->string('permit_owner_address',200)->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->timestamps();
        });

        Schema::create('doc_roadtax_det', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code',10);
            $table->unsignedInteger('vch_id');
            $table->unsignedInteger('agent_id')->nullable();
            $table->string('roadtax_no',100)->nullable();
            $table->decimal('roadtax_amt',10,2)->nullable();
            $table->string('payment_mode',50)->nullable();
            $table->unsignedInteger('pay_no')->nullable();
            $table->date('pay_dt')->nullable();
            $table->string('pay_bank',100)->nullable();
            $table->string('pay_branch',100)->nullable();
            $table->date('valid_from')->nullable();
            $table->date('valid_till')->nullable();
            $table->string('expire_time',20)->nullable();             
            $table->date('update_dt')->nullable();
            $table->string('engine_no',100)->nullable();
            $table->string('chassis_no',100)->nullable();
            $table->string('manufacture_year',100)->nullable();
            $table->string('type_of_body',100)->nullable();
            $table->string('type_of_fuel',100)->nullable();
            $table->string('seating_capacity',100)->nullable();
            $table->string('cubic_capacity',100)->nullable();
            $table->string('tax_type',100)->nullable();
            $table->string('receipt_id',100)->nullable();
            $table->date('receipt_date')->nullable();
            $table->string('doc_file',100)->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->timestamps();
        });

        Schema::create('doc_temporary_permit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fleet_code',100);
            $table->unsignedInteger('vch_id');
            $table->unsignedInteger('agent_id');
            $table->string('curr_loc',20);
            $table->string('trans_loc',20);
            $table->unsignedTinyInteger('forms_cmpl');
            $table->date('forms_start_dt');
            $table->date('forms_end_dt');
            $table->string('forms_total_days',20);
            $table->unsignedInteger('tp_permit_no');
            $table->date('tp_permit_start_dt');             
            $table->date('tp_permit_end_dt');
            $table->string('tp_total_days',20);
            $table->unsignedInteger('tp_state_id');
            $table->unsignedInteger('tp_roadtax_no');
            $table->decimal('tp_tax_amt',10,2);
            $table->date('tp_roadtax_start_dt');             
            $table->date('tp_roadtax_end_dt');
            $table->text('remarks',500);
            $table->unsignedInteger('created_by');
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
        Schema::dropIfExists('doc_fitness_det');
        Schema::dropIfExists('doc_greentax_det');
        Schema::dropIfExists('doc_insurance_det');
        Schema::dropIfExists('doc_puc_det');
        Schema::dropIfExists('doc_statepermit');
        Schema::dropIfExists('doc_roadtax_det');
        Schema::dropIfExists('doc_rc_det');
        Schema::dropIfExists('doc_temporary_permit');
    }
}
