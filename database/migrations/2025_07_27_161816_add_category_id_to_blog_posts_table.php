
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
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->foreignId('blog_category_id')->nullable()->constrained()->onDelete('set null');
            $table->string('tags')->nullable(); // لحفظ الكلمات المفتاحية
            $table->integer('reading_time')->nullable(); // وقت القراءة بالدقائق
            $table->integer('views_count')->default(0); // عدد المشاهدات
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->dropForeign(['blog_category_id']);
            $table->dropColumn(['blog_category_id', 'tags', 'reading_time', 'views_count']);
        });
    }
};
