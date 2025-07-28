<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = BlogPost::published()->with(['category']);
        
        // فلترة بحسب القسم
        if ($request->has('category') && $request->category) {
            $category = BlogCategory::where('slug', $request->category)->first();
            if ($category) {
                $query->where('blog_category_id', $category->id);
            }
        }
        
        // البحث في المقالات
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('tags', 'like', "%{$search}%");
            });
        }
        
        $posts = $query->latest()->paginate(9);
        $categories = BlogCategory::active()->ordered()->withCount('publishedPosts')->get();
        $selectedCategory = $request->category ? BlogCategory::where('slug', $request->category)->first() : null;
        
        return view('blog.index', compact('posts', 'categories', 'selectedCategory'));
    }

    public function show(BlogPost $blogPost)
    {
        if (!$blogPost->is_published) {
            abort(404);
        }
        
        // زيادة عدد المشاهدات
        $blogPost->incrementViews();
        
        $relatedPosts = BlogPost::published()
            ->where('id', '!=', $blogPost->id)
            ->when($blogPost->blog_category_id, function($query) use ($blogPost) {
                $query->where('blog_category_id', $blogPost->blog_category_id);
            })
            ->latest()
            ->take(3)
            ->get();

        return view('blog.show', compact('blogPost', 'relatedPosts'));
    }

    public function category(BlogCategory $category)
    {
        if (!$category->is_active) {
            abort(404);
        }

        $posts = $category->publishedPosts()->with(['category'])->latest()->paginate(9);
        $categories = BlogCategory::active()->ordered()->withCount('publishedPosts')->get();

        return view('blog.category', compact('posts', 'categories', 'category'));
    }
}
