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

     //INSERISCO NELLA TABELLA USER ANCHE SURNAME E VAT_NUMBER

    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname', 50)->after('name');
            $table->string('vat_number', 13)->after('email_verified_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['surname', 'vat_number']);
        });
    }
};
