<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authors\StoreAuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\traits\media;
use App\Jobs\CreatePasswordMail;
use App\Mail\CreatePasswordEmail;
use App\Mail\SuspendAuthorEmail;
use App\Models\Article;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Facades\DataTables;

class ManageAuthorController extends Controller
{
    use media;
    /**
     * Display a listing of the resource.
     */
    public function getAuthors()
    {
        // use should use there ajax and data table server side

        return view('dashboard.authors.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function createAuthor()
    {
        return view('dashboard.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeAuthor(StoreAuthorRequest $request)
    {
        $photoName = $this->uploadPhoto($request->image, 'authors');
        $author = new Author;
        $author->name = $request->name;
        $author->email = $request->email;
        $author->image = $photoName;
        $author->save();
        $url = URL::temporarySignedRoute('password.create', now()->addMinutes(30), ['id' => $author->id]);

        Mail::to($author->email)->send(new CreatePasswordEmail());

        // CreatePasswordMail::dispatch($url, $author->email);
        return redirect()->route('manageAuthor.getAuthors');
    }

    /**
     * Display the specified resource.
     */
    public function suspendAuthor($id)
    {
        $author = Author::find($id);
        $author->status = 'suspended';
        $author->save();

        Mail::to($author->email)->send(new SuspendAuthorEmail());
        return redirect()->back()->with('success', 'author suspended successfully');
    }
    public function activateAuthor($id)
    {
        $author = Author::find($id);
        $author->status = 'active';
        $author->save();

        Mail::to($author->email)->send(new SuspendAuthorEmail());
        return redirect()->back()->with('success', 'author activated successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function showAuthor($id)
    {
        $author = Author::find($id);
        return view('dashboard.authors.show', compact('author'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function deleteAuthor($id)
    {
        Article::where('author_id', $id)->delete();
        Author::destroy($id);
        return view('dashboard.authors.index')->with('success', 'the author deleted with its articles successfully');
    }
}
