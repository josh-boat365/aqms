<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions', function(Blueprint $table){

            $table->foreignId('survey_id')->constrained()->onDelete('cascade');
            $table->foreignId('option_type_id')->constrained()->onDelete('cascade');
        
        });


        Schema::table('options', function(Blueprint $table){

            $table->foreignId('question_id')->constrained()->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function(Blueprint $table){

            $table->dropForeign('survey_id_foreign');
            $table->dropForeign('option_type_id_foreign');
        
        });

        Schema::table('options', function(Blueprint $table){

            $table->dropForeign('question_id');

        });
    }
}
