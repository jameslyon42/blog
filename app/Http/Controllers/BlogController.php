<?php

namespace App\Http\Controllers;

use App\Models\Entities\Page;
use DateTime;

class BlogController extends Controller
{
    /**
     * Home page for blog
     */
    public function home()
    {
        $recent_pages = Page::whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->limit(6)
            ->get()
            ->toArray();

        return view('blog.home', compact('recent_pages'));
    }

    public function show($slug)
    {
        $now = new DateTime();

        $page = Page::where([
                ['published_at', '<=', $now->format('Y-m-d')],
                ['slug', '=', $slug]
            ])
            ->first();

        if (!$page) {
            return redirect()->route('blog_home');
        }

        return view('blog.page', compact('page'));
    }

    public function index()
    {
        $now = new DateTime();

        $pages = Page::where('published_at', '<=', $now->format('Y-m-d'))
            ->orderBy('published_at', 'desc')
            ->get();

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
