<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();

            // Customer Info
            $table->string('customer_name');
            $table->string('customer_cpf');

            // Quotation Info
            $table->date('request_date');
            $table->string('product')->default('Automóvel');

            // Vehicle Basic Info
            $table->string('plate');
            $table->string('chassis');
            $table->string('brand');
            $table->string('model');
            $table->integer('year');

            // Insurance Info
            $table->enum('insurance_type', ['Novo seguro', 'Renovação de seguro']);
            $table->string('bonus_class')->nullable();
            $table->boolean('had_claim')->default(false);

            // Personal Info
            $table->string('full_name');
            $table->string('cpf');
            $table->date('birth_date');
            $table->string('marital_status');
            $table->string('full_address');
            $table->string('phone');
            $table->string('email');

            // Vehicle Details
            $table->string('vehicle_brand');
            $table->string('vehicle_model');
            $table->string('manufacture_year');
            $table->string('vehicle_plate');
            $table->string('vehicle_chassis');
            $table->json('vehicle_use')->nullable(); // Ex: ["Trabalho", "Escola"]
            $table->string('overnight_zip');
            $table->boolean('overnight_garage');
            $table->boolean('work_garage');

            // Driver Info
            $table->integer('driver_age');
            $table->string('license_time');

            // Coverage
            $table->json('coverage_options')->nullable(); // Ex: ["Básica", "Terceiros"]
            $table->boolean('has_insurer_preference')->default(false);
            $table->string('preferred_insurer')->nullable();

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
        Schema::dropIfExists('quotations');
    }
};
