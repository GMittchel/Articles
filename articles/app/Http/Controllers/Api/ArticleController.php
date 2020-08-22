<?php

namespace App\Http\Controllers\Api;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ViewIncrementRequest;
use App\Http\Requests\Api\LikeIncrementRequest;
use App\Like;
use App\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    /**
     * Инициализирует инкрементацию и возвращает новое значение
     *
     * @param ViewIncrementRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function viewIncrement(ViewIncrementRequest $request): JsonResponse
    {
        try {
            $view = new View();
            $view->article_id = $request->article_id;
            $view->save();

            $all_views = Article::find($request->article_id)->views()->count();
        } catch (\Exception $e) {
            Log::error('Error in article increment method. Error: ' . $e->getMessage());
        }

        return response()->json(['views' => $all_views]);
    }

    /**
     * Инициализирует инкрементацию и возвращает новое значение
     *
     * @param LikeIncrementRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function likeIncrement(LikeIncrementRequest $request): JsonResponse
    {
        try {
            $like = new Like();
            $like->article_id = $request->article_id;
            $like->save();

            $all_likes = Article::find($request->article_id)->likes()->count();
        } catch (\Exception $e) {
            Log::error('Error in article increment method. Error: ' . $e->getMessage());
        }

        return response()->json(['likes' => $all_likes]);
    }
}
