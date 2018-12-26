<?php

namespace App\Http\Controllers;

use App\Models\Entities\Page;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Home page for blog
     */
    public function home()
    {
        $recent_pages = Page::whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get()
            ->toArray();

        return view('blog.home', compact('recent_pages'));
    }

    public function show($slug)
    {
        $page = Page::whereSlug($slug)->first();

        return view('blog.page', compact('page'));
    }

    public function index()
    {
        $pages = Page::orderBy('published_at', 'desc')->get();

        return view('blog.index', compact('pages'));
    }

    public function about()
    {
        return view('blog.about');
    }

    public function policy()
    {
        return view('blog.policy');
    }
}
