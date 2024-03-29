<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemeTypesTable extends Migration
{
    public function up()
    {
        Schema::create('meme_types', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique()->index();
            $table->string('title')->unique();
            $table->string('note')->nullable(); // Just for internal reference purposes only, not displayed on website.
            $table->text('content')->nullable(); // Will be written in Markdown.
            
            $table->foreignIdFor(app('webpage'))->nullable(); // Used to track seo rankings
            $table->unsignedInteger('pageviews')->index(); // Total current pageviews for meme type page. Will be synced from Google Analytics API.
            
            $table->string('description')->nullable(); // Primary description used for SEO.
            $table->string('ogdescription')->nullable(); // Open Graph Description used for social shares. Will default to description if NULL.
            $table->foreignIdFor(app('image'))->nullable(); // Cover image for meme type
            $table->foreignIdFor(app('image'), 'ogimage_id')->nullable(); // External open graph image id. Featured image for social sharing. Will default to image_id unless this is used. Allows override for play button or words on image.
            $table->foreignIdFor(app('video'))->nullable(); // If meme type has a featured video.
            
            $table->foreignIdFor(app('user'), 'creator_id');
            $table->foreignIdFor(app('user'), 'updater_id');
            $table->timestamps();
        });
    }
}
