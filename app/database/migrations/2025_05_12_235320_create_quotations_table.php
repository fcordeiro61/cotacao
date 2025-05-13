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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();

            // Informações do cliente
            $table->string('customer_id'); // id do cliente
 
              // Dados gerais
    $table->date('request_date'); // Data da solicitação
    $table->string('product')->default('Automóvel'); // Produto (ex: Automóvel)

    // Dados básicos do veículo
    $table->string('plate'); // Placa do veículo
    $table->string('chassis'); // Chassi
    $table->string('brand'); // Marca
    $table->string('model'); // Modelo
    $table->year('year'); // Ano

    // Tipo de seguro
    $table->string('insurance_type')->nullable(); // Tipo de seguro (Novo ou Renovação)
    $table->string('bonus_class')->nullable(); // Classe de bônus
    $table->boolean('has_claims')->nullable(); // Houve sinistros?

    // Informações pessoais
    $table->string('full_name'); // Nome completo
    $table->string('cpf'); // CPF
    $table->date('birth_date'); // Data de nascimento
    $table->string('marital_status'); // Estado civil
    $table->string('address'); // Endereço completo
    $table->string('phone'); // Telefone
    $table->string('email'); // E-mail

    // Informações do veículo detalhadas
    $table->string('vehicle_brand'); // Marca do veículo
    $table->string('vehicle_model'); // Modelo do veículo
    $table->string('manufacture_year'); // Ano de fabricação
    $table->string('vehicle_plate'); // Placa
    $table->string('vehicle_chassis'); // Chassi
    $table->json('vehicle_use')->nullable(); // Tipo de uso (Trabalho, Escola, Esporádico)
    $table->string('overnight_zipcode'); // CEP do pernoite
    $table->boolean('has_garage_overnight')->nullable(); // Tem garagem no pernoite?
    $table->boolean('has_garage_work')->nullable(); // Tem garagem no trabalho/escola?

    // Informações do condutor
    $table->string('driver_age'); // Idade do condutor
    $table->string('license_time'); // Tempo de habilitação

    // Coberturas desejadas
    $table->json('coverages')->nullable(); // Coberturas selecionadas
    $table->boolean('has_insurer_preference')->nullable(); // Preferência por seguradora?
    $table->string('preferred_insurer')->nullable(); // Nome da seguradora preferida
    
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
