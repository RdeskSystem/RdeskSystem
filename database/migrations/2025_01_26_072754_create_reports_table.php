<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->bigIncrements('id_report');
            $table->string('agreement_no');
            $table->foreign('agreement_no')->references('agreement_no')->on('baf_masters');
            $table->string('dunner');
            $table->string('customer_name');
            $table->date('date')->default(DB::raw('CURRENT_DATE'));
            $table->time('time')->default(DB::raw('CURRENT_TIME'));
            $table->enum('result', ['Prospect', 'Not Prospect']);
            $table->enum('action', ['NCT', 'FOL', 'PTP', 'NPT', 'SPCL', 'PAID LUNAS', 'PAID PARTIAL', 'NO ANS', 'NO ACT']);
            $table->enum('action_baf', ['PTP', 'NTP', 'NO ANS', 'NO ACT', 'SPCL', 'NCT']);
            $table->date('ptp_date')->nullable();
            $table->decimal('ptp_amount', 15, 2)->nullable();
            $table->enum('action_wa', ['NCT', 'FOL', 'PTP', 'NPT', 'SPCL', 'PAID LUNAS', 'PAID PARTIAL', 'NO ANS', 'NO ACT']);
            $table->string('phone_up_date')->nullable();
            $table->enum('connect_with', ['CH', 'SPS', 'KLG', 'SDR', 'ORLA']);
            $table->enum('category', ['BAF', 'BAF Task']);
            $table->text('description_agent')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
