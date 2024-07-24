<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {

            // creo il campo type_id nella tabella projects dopo il campo id del progetto
            $table->unsignedBigInteger('type_id')->nullable()->after('id');

            // creo la chiave esterna
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {

            // droppo la relazione tra le tabelle
            $table->dropForeign('projects_type_id_foreign');

            // droppo il campo della colonna
            $table->dropColumn('type_id');
        });
    }
};
