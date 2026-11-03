<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDashboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashboards', function (Blueprint $table) {
            $table->increments('id');

            $table->string('site_name')->nullable();
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
            $table->string('contactus_banner_image')->nullable();
            $table->string('aboutus_banner_image')->nullable();
            $table->string('teams_banner_image')->nullable();
            $table->string('resource_banner_image')->nullable();
            $table->string('services_banner_image')->nullable();
            $table->string('projects_banner_image')->nullable();
            $table->string('testimonials_banner_image')->nullable();
             $table->string('career_banner_image')->nullable();
            $table->text('googlemap')->nullable();
            $table->text('notes')->nullable();
            $table->string('post_box')->nullable();
            $table->string('page_title')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keyphrase')->nullable();
            $table->text('canonical_url')->nullable();
            $table->text('keyword')->nullable();

            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();

            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('pinterest')->nullable();

            //homepage->settings
             //About-us

            $table->text('about_us_title')->nullable();
            $table->text('about_us_sub')->nullable();
            $table->longText('about_us_description')->nullable();
            $table->string('about_us_image1')->nullable();
            $table->string('about_us_image2')->nullable();
            
            //Services
            $table->text('services_title')->nullable();
            //Projects
            $table->text('projects_title')->nullable();
            //resources
            $table->text('resources_title')->nullable();
            //teams
            $table->text('teams_title')->nullable();
            //testimonial
            $table->text('testimonials_title')->nullable();
             //request-Quote
       
             $table->text('quote_title')->nullable();
             $table->text('quote_sub_des')->nullable();

             //Contact-us pages-side Content
             $table->text('contact_us_title')->nullable();           
              $table->text('contact_us_sub')->nullable();
            
            $table->string('meta_about_title')->nullable();
            $table->text('meta_about_description')->nullable();
            $table->text('canonical_url_about')->nullable();
          
           $table->string('meta_partners_title')->nullable();
            $table->text('meta_partners_description')->nullable();
            $table->text('canonical_url_partners')->nullable();
          
             $table->string('meta_service_title')->nullable();
            $table->text('meta_service_description')->nullable();
            $table->text('canonical_url_service')->nullable();
          
           $table->string('meta_product_title')->nullable();
            $table->text('meta_product_description')->nullable();
            $table->text('canonical_url_product')->nullable();
          
           $table->string('meta_resource_title')->nullable();
            $table->text('meta_resource_description')->nullable();
            $table->text('canonical_url_resource')->nullable();
          
           $table->string('meta_training_title')->nullable();
            $table->text('meta_training_description')->nullable();
            $table->text('canonical_url_training')->nullable();
          
           $table->string('meta_download_title')->nullable();
            $table->text('meta_download_description')->nullable();
            $table->text('canonical_url_download')->nullable();
          
           $table->string('meta_career_title')->nullable();
            $table->text('meta_career_description')->nullable();
            $table->text('canonical_url_career')->nullable();
          
          
           $table->string('meta_contact_title')->nullable();
            $table->text('meta_contact_description')->nullable();
            $table->text('canonical_url_contact')->nullable();
          
          
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
        Schema::dropIfExists('dashboards');
    }
}
