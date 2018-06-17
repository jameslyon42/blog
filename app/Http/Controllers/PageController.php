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
            'title' => $request->title,
            'markdown' => $request->markdown
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
            'title' => $request->title,
            'markdown' => $request->markdown
        ]);

        return response('Update Successful', 200);
    }
}
