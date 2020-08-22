<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CommentCrateRequest;
use App\Jobs\AddCommentJob;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    /**
     * Добавление нового комментария
     *
     * @param CommentCrateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(CommentCrateRequest $request): JsonResponse
    {
        try {
            AddCommentJob::dispatchAfterResponse($request->article_id, $request->subject, $request->text);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }

        return response()->json(['result' => true]);
    }
}
