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
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->enum('website_type', ['landing', 'corporate', 'ecommerce', 'blog', 'portfolio', 'custom']);
            $table->integer('pages')->default(1);
            $table->boolean('has_domain')->default(false);
            $table->boolean('needs_cms')->default(false);
            $table->boolean('needs_hosting')->default(false);
            $table->enum('seo_level', ['none', 'basic', 'advanced'])->default('none');
            $table->boolean('social_integration')->default(false);
            $table->boolean('google_analytics')->default(false);
            $table->boolean('backup_system')->default(false);
            $table->boolean('ssl_certificate')->default(false);
            $table->boolean('maintenance')->default(false);
            $table->boolean('multilanguage')->default(false);
            $table->decimal('total_price', 10, 2);
            $table->text('additional_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
