<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailAuditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config("emailaudit.table"), function (Blueprint $table)
        {
            $table->id();

            $table->string('from_email');
            $table->string('to_email');
            $table->string('cc')->nullable();
            $table->string('subject');
            $table->longText('body');
            $table->string('app')->nullable();
            $table->date('sent_at')->nullable();

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
        Schema::dropIfExists('ac_email_audits');
    }
}
