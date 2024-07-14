<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    function articles()
    {
        $articles = Article::whereIn('status', ['approve', 'suspended', 'rejected'])->select('id', 'title', 'description', 'status', 'featured')->get();
        return view('dashboard.articles.index', compact($articles));
    }
    function pendingArticles()
    {
        $articles = Article::where('status', 'pending');
        return view('dashboard.articles.index', compact($articles));
    }
    function approve($id)
    {
        $article = Article::find($id);
        $article->status = 'approved';
        $article->save();
        return redirect()->back()->with('success', 'the article approved successfully');
    }
    function reject($id)
    {
        $article = Article::find($id);
        $article->status = 'rejected';
        $article->save();
        return redirect()->back()->with('success', 'the article rejected successfully');
    }
    function suspend($id)
    {
        $article = Article::find($id);
        $article->status = 'suspended';
        $article->save();
        return redirect()->back()->with('success', 'the article suspended successfully');
    }
    function featured($id)
    {
        $article = Article::find($id);
        $article->featured = 1;
    }
    function unFeatured($id)
    {
        $article = Article::find($id);
        $article->featured = 0;
    }
}
