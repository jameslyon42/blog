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

        foreach ($recent_pages as $key => $page) {
            preg_match_all('/!\[[^\]]*\]\(([^)]*)\)/', $page['markdown'], $matches);

            $recent_pages[$key]['image'] = $matches[1][0];
        }

        return view('blog.home', compact('recent_pages'));
    }

    public function show($slug)
    {
        $page = Page::whereSlug($slug)->first();

        return view('blog.page', compact('page'));
    }
}
