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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_mm');
            $table->string('father_name');
            $table->date('date_of_birth');
            $table->string('passport');
            $table->string('driver_license');
            $table->string('marital_status');
            $table->string('home_phone');
            $table->string('mobile_phone');
            $table->string('social_media');
            $table->string('nrc_number');

            $table->foreignId('categories_id')->constrained()->cascadeOnDelete();
            $table->foreignId('gender_id')->constrained()->cascadeOnDelete();
            $table->foreignId('blood_type_id')->constrained()->cascadeOnDelete();
            $table->foreignId('national_card_id')->constrained()->cascadeOnDelete();
            $table->foreignId('race_id')->constrained()->cascadeOnDelete();
            $table->foreignId('religion_id')->constrained()->cascadeOnDelete();
            $table->foreignId('nationality_id')->constrained()->cascadeOnDelete();
            $table->foreignId('vacancy_id')->constrained()->cascadeOnDelete();

            //education
            $table->string('edu_degree');
            $table->date('edu_from');
            $table->date('edu_to');
            $table->string('edu_university');

            //work experience
            $table->string('exp_job_title');
            $table->string('exp_company_name');
            $table->date('exp_from');
            $table->date('exp_to');
            $table->string('exp_employer_contact');
            $table->string('exp_employer_address');

            //reference person
            $table->string('ref_person_name');
            $table->string('ref_position');
            $table->string('ref_email');
            $table->string('ref_phone');

            //family member
            $table->string('fam_member_name');
            $table->string('fam_relationship');
            $table->date('fam_date_of_birth');
            $table->string('fam_occupation');
            $table->string('fam_contact_phone');
            $table->string('fam_contact_address');

            //address
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('township')->nullable();
            $table->string('street')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
