<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\traits\media;
use App\Http\Requests\Authors\StoreArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Models\Category;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Traits\HttpResponses;
use App\Http\Requests\Authors\LoginAuthorRequest;
use App\Models\Author;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response as HttpResponse;

class AuthorController extends Controller
{
    use HttpResponses;
    use media;
    function login(LoginAuthorRequest $request)
    {
        $user = Author::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'invalid email or password'
            ], HttpResponse::HTTP_UNAUTHORIZED);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
        ], HttpResponse::HTTP_OK);
    }
    function storeArticle(StoreArticleRequest $request)
    {
        $author = $request->user();
        $photoName = $this->uploadPhoto($request->image, 'images/authors');

        $article = new Article;
        $article->title = $request->title;
        $article->description = $request->description;
        $article->content = $request->content;
        $article->category_id = $request->category_id;
        $article->author_id = $author->id;
        $article->image = $photoName;
        $article->save();
        return response()->json(['success' => 'the article stored successfully'], Response::HTTP_CREATED);
    }
    function allArticles()
    {
        $user = Auth::user();
        $articles = Article::select('id', 'title', 'description', 'status', 'image', 'category_id')->where('author_id', $user->id)->get();
        return $this->success(new ArticleResource($articles), null, Response::HTTP_OK);
    }
    function getCategories()
    {
        $categories = Category::all();
        return $this->success(['categories' => $categories], null, Response::HTTP_OK);
    }
}
