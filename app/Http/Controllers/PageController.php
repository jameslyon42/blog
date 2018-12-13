<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entities\Page;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Index of pages
     */
    public function index()
    {
        $pages = Page::with('user')
            ->orderBy('created_at', 'desc')
            ->get();
        return compact('pages');
    }

    /**
     * Show page
     *
     * @param Int $id
     *
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $page = Page::find($id);

        return $page
            ? response()->json(compact('page'), 200)
            : response()->json([
                'error' => 'Page not found'
            ], 404);
    }

    /**
     * Create page
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $user = Auth::user();

        $request->validate([
            'title' => 'required'
        ]);

        $page = $user->pages()->create([
            'title'         => $request->title,
            'markdown'      => $request->markdown,
            'html'          => $request->html,
            'slug'          => $request->slug,
            'location'      => $request->location,
            'description'   => $request->description,
            'published_at'  => $request->published_at,
        ]);

        return response()->json(compact('page'), 200);
    }

    /**
     * Update page
     *
     * @param Request $request
     * @param int $id
     *
     * @return Response
     */
    public function update(Request $request, int $id): Response
    {
        $user = Auth::user();

        $request->validate([
            'title' => 'required'
        ]);

        $user->pages()->whereId($id)->update([
            'title'         => $request->title,
            'markdown'      => $request->markdown,
            'html'          => $request->html,
            'slug'          => $request->slug,
            'location'      => $request->location,
            'description'   => $request->description,
            'published_at'  => $request->published_at,
        ]);

        return response('Update Successful', 200);
    }

    /**
     *
     * Destroy a page
     *
     * @param int $id
     * @return Response
     */
    public function destroy(int $id): Response
    {
        Page::destroy($id);

        return response('Delete Successful', 200);
    }
}
