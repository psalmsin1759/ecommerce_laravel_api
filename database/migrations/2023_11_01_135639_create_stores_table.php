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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string("name",100)->nullable();
            $table->text("address")->nullable();
            $table->string("state",30)->nullable();
            $table->string("country",100)->nullable();//
            $table->string("geocode_latitude",20)->nullable();
            $table->string("geocode_longitude",20)->nullable();
            $table->string("email",50)->nullable();
            $table->string("phone",20)->nullable();
            $table->string("opening_times",200)->nullable();
            
            $table->text("aboutus")->nullable(); 
            $table->text("mission")->nullable(); 
            $table->text("vision")->nullable(); 
            $table->text("terms")->nullable(); 
            $table->text("privacy_policy")->nullable(); 
            $table->text("return_policy")->nullable();
            $table->text("refund_policy")->nullable();


            $table->string("favicon_path",50)->nullable();
            $table->string("logo_path",50)->nullable();
            $table->string("footer_logo_path",50)->nullable(); //

            $table->string("meta_title",100)->nullable();
            $table->string("meta_description",200)->nullable();
            $table->text("meta_tag_keywords")->nullable();

            $table->string("instagram_link",150)->nullable();
            $table->string("facebook_link",200)->nullable();
            $table->string("twitter_link",200)->nullable();
            $table->string("tiktok_link",200)->nullable();

            $table->string("payment_pub_key",200)->nullable();
            $table->string("payment_secret_key",200)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
