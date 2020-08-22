<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\View\View;

class ArticleController extends Controller
{
    /**
     * Возвращает страницу статей по 10 штук
     *
     * @return View
     */
    public function index(): View
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);
        return view('articles', ['articles' => $articles]);
    }

    /**
     * Возвращает последние 6 статей для главной
     *
     * @return View
     */
    public function latestArticles(): View
    {
        $articles = Article::orderBy('created_at', 'desc')->limit(6)->get();
        return view('welcome', ['articles' => $articles]);
    }

    /**
     * Возвращяет статью
     *
     * @param int $id
     * @return View
     */
    public function article(int $id): View
    {
        $article = Article::findOrFail($id);
        return view('article', ['article' => $article]);
    }
}
