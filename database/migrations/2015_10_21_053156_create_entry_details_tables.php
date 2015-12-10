<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntryDetailsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communicable_diseases', function(Blueprint $table)
        {
            $table->increments('id');
            $table->text('disease_text');
            $table->string('disease_date_text');
            $table->text('disease_confirmed_text');
            $table->string('confirmed_date_text');
            $table->string('patient_name_text');
            $table->string('street_no_text');
            $table->string('street_name_text');
            $table->string('village_name_text');
            $table->string('town_name_text');
            $table->string('district_name_text');
            $table->string('sex_text');
            $table->string('ethnic_group_text');
            $table->string('date_of_onset_text');
            $table->string('date_of_hospitalization_text');
            $table->text('laboratory_findings_text');
            $table->text('outcome_text');
            $table->text('isolated_place');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('household_contacts', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('disease_id')->unsigned()->default('0');
            $table->foreign('disease_id')->references('id')->on('communicable_diseases')->onDelete('cascade');
            $table->string('household_contact_name');
            $table->string('Hdate');
            $table->string('household_contact_age');
            $table->text('Hobservation');
            $table->timestamps();
        });

        Schema::create('other_contacts', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('disease_id')->unsigned()->default('0');
            $table->foreign('disease_id')->references('id')->on('communicable_diseases')->onDelete('cascade');
            $table->string('other_contact_name');
            $table->string('odate');
            $table->string('Oobservation');
            $table->text('observation');
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
        Schema::drop('other_contacts');
        Schema::drop('household_contacts');
        Schema::drop('communicable_diseases');
    }
}
