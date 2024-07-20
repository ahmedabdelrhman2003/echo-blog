<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    function articles()
    {
        return view('dashboard.articles.index');
    }
    function pendingArticles()
    {
        return view('dashboard.articles.pending');
    }
    function approve($id)
    {
        $article = Article::find($id);
        $article->approval_status = 'approved';
        $article->publication_status = 'active';
        $article->save();
        return redirect()->route('article.all')->with('success', 'the article approved successfully');
    }
    function reject($id)
    {
        $article = Article::find($id);
        $article->status = 'rejected';
        $article->save();
        return redirect()->route('article.all')->with('success', 'the article rejected successfully');
    }
    function suspend($id)
    {
        $article = Article::find($id);
        $article->publication_status = 'suspended';
        $article->save();
        return redirect()->route('article.all')->with('success', 'the article suspended successfully');
    }
    function activate($id)
    {
        $article = Article::find($id);
        $article->publication_status = 'active';
        $article->save();
        return redirect()->route('article.all')->with('success', 'the article suspended successfully');
    }
    function featured($id)
    {
        $article = Article::find($id);
        $article->featured = '1';
        $article->save();
        return redirect()->route('article.all')->with('success', 'the article mark as featured successfully');
    }
    function unFeatured($id)
    {
        $article = Article::findOrFail($id);
        $article->featured = '0';
        $article->save();
        return redirect()->route('article.all')->with('success', 'the article mark as un featured successfully');
    }
    function show($id)
    {
        $article = Article::findOrFail($id);
        return view('dashboard.articles.show', compact('article'));
    }
}