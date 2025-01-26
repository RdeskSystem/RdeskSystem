<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('baf_masters', function (Blueprint $table) {
        $table->string('agreement_no')->primary();
        $table->string('dunner');
        $table->string('customer_name');
        $table->date('due_date');
        $table->integer('tenor');
        $table->decimal('sr', 5, 2);
        $table->decimal('amount_installment', 15, 2);
        $table->integer('sisa_tenor');
        $table->text('jobpos_desc')->nullable();
        $table->string('type_motor')->nullable();
        $table->string('office_phone')->nullable();
        $table->string('phone_tagih')->nullable();
        $table->string('telp_mobile')->nullable();
        $table->string('other_phone')->nullable();
        $table->string('warna')->nullable();
        $table->string('no_polisi')->nullable();
        $table->string('company_name')->nullable();
        $table->string('type_case')->nullable();
        $table->string('product')->nullable();
        $table->integer('dpd');
        $table->string('branch')->nullable();
        $table->boolean('pembayaran_100')->default(false);
        $table->decimal('angsuran_pokok', 15, 2)->nullable();
        $table->decimal('sisa_denda', 15, 2)->nullable();
        $table->decimal('to_time_parsial', 15, 2)->nullable();
        $table->decimal('sisa_tagihan', 15, 2)->nullable();
        $table->decimal('deal_amount', 15, 2)->nullable();
        $table->year('wo_years')->nullable();
        $table->enum('category', ['BAF MASTER', 'BAF TASK']);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baf_masters');
    }
};
