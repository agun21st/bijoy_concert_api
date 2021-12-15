<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConcertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concerts', function (Blueprint $table) {
            $table->id();
            $table->integer('ticket_id');
            $table->string('date')->nullable();
            $table->string('date_gmt')->nullable();
            $table->string('modified')->nullable();
            $table->string('modified_gmt')->nullable();
            $table->string('slug')->nullable();
            $table->string('status')->nullable();
            $table->string('type')->nullable();
            $table->string('link')->nullable();
            $table->integer('author')->default(0);
            $table->string('template')->nullable();
            $table->string('ovaem_ticket_code')->nullable();
            $table->string('ticket_status')->nullable();
            $table->string('ovaem_ticket_buyer_name')->nullable();
            $table->string('ovaem_ticket_buyer_email')->nullable();
            $table->string('ovaem_ticket_buyer_phone')->nullable();
            $table->string('ovaem_ticket_buyer_address')->nullable();
            $table->string('ovaem_ticket_buyer_company')->nullable();
            $table->string('ovaem_ticket_buyer_gate')->nullable();
            $table->string('ovaem_ticket_buyer_desc')->nullable();
            $table->string('ovaem_ticket_event_name')->nullable();
            $table->string('ovaem_pdf_ticket_logo')->nullable();
            $table->string('ovaem_ticket_event_id')->nullable();
            $table->string('ovaem_ticket_package_id')->nullable();
            $table->string('ovaem_ticket_info_link')->nullable();
            $table->string('ovaem_ticket_info_password')->nullable();
            $table->string('ovaem_ticket_event_package')->nullable();
            $table->string('ovaem_ticket_event_start_time')->nullable();
            $table->string('ovaem_ticket_event_end_time')->nullable();
            $table->string('ovaem_ticket_event_venue')->nullable();
            $table->string('ovaem_ticket_event_address')->nullable();
            $table->string('ovaem_ticket_from_order_id')->nullable();
            $table->string('ovaem_ticket_verify')->nullable();
            $table->string('_wp_old_slug')->nullable();
            $table->string('_edit_lock')->nullable();
            $table->string('_wp_trash_meta_status')->nullable();
            $table->string('_wp_trash_meta_time')->nullable();
            $table->string('_wp_desired_post_slug')->nullable();
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
        Schema::dropIfExists('concerts');
    }
}
