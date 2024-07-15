<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleDataTableResource;
use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class DataTableController extends Controller
{
    function getAuthorsDataTable()
    {
        $data = Author::select('id', 'name', 'email', 'image', 'status')->get();

        DataTables::of($data)->addIndexColumn()->editColumn('image', function ($row) {
            $url = asset('assets/img/authors/' . $row->image);
            return '<img src=".$url." style="width: 50px;"alt="">';
        })->addColumn('action', function ($row) {
            $actionButtons = '<form action="' . route('manageAuthor.delete', $row->id) . '" method="POST" style="display:inline; margin-right:1px">' .
                csrf_field() . method_field('DELETE') .
                '<button type="submit" class="delete btn btn-danger btn-sm">Delete</button>' .
                '</form> <form action="' . route('manageAuthor.view', $row->id) . '" method="POST" style="display:inline; margin-right:1px">' .
                csrf_field() . method_field('POST') .
                '<button type="submit" class="show btn btn-primary btn-sm">show</button>' .
                '</form>';
            if ($row->status == 'active') {
                return    $actionButtons .= '<form action="' . route('manageAuthor.suspend', $row->id) . '" method="POST" style="display:inline; margin-right:1px">' .
                    csrf_field() . method_field('POST') .
                    '<button type="submit" class="delete btn btn-warning btn-sm">suspend</button>' .
                    '</form>';
            }
            return    $actionButtons .= '<form action="' . route('manageAuthor.activate', $row->id) . '" method="POST" style="display:inline; margin-right:1px">' .
                csrf_field() . method_field('POST') .
                '<button type="submit" class="delete btn btn-warning btn-sm">activate</button>' .
                '</form>';
        })->rawColumns(['action'])->make(true);
    }



    function getCategoriesDataTable()
    {
        $data = Category::select('id', 'name', 'featured', 'created_at', 'updated_at');
        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $editUrl = route('category.edit', $row->id);
                $deleteUrl = route('category.delete', $row->id);

                $actionButtons = '<a href="' . $editUrl . '" class="edit btn btn-success btn-sm">Edit</a> ' .
                    '<form action="' . $deleteUrl . '" method="POST" style="display:inline;">' .
                    csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="delete btn btn-danger btn-sm">Delete</button>' .
                    '</form>';

                if ($row->featured == 0) {
                    $featuredUrl = route('category.featured', $row->id);
                    $actionButtons .= '<a href="' . $featuredUrl . '" class="edit btn btn-warning btn-sm">Featured</a>';
                } else {
                    $unFeaturedUrl = route('category.un-featured', $row->id);
                    $actionButtons .= '<a href="' . $unFeaturedUrl . '" class="edit btn btn-primary btn-sm">un featured</a>';
                }

                return $actionButtons;
            })->rawColumns(['action'])
            ->make(true);
        return $dataTable;
    }

    function getArticlesDataTable()
    {
        $articles = Article::where('approval_status', 'approved')->select('id', 'title', 'description', 'publication_status', 'image', 'featured')->with('author')->get();
        $dataTable = DataTables::of($articles)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $actionButtons = '<a href="' . route('article.view') . '" class="edit btn btn-secondary btn-sm ml-3" >view</a>';
                if ($row->featured == 0) {
                    $featuredUrl = route('article.featured', $row->id);
                    $actionButtons .= '<a href="' . $featuredUrl . '" class="edit btn btn-warning btn-sm ml-3" >Featured</a>';
                } else {
                    $unFeaturedUrl = route('article.un-featured', $row->id);
                    $actionButtons .= '<a href="' . $unFeaturedUrl . '" class="edit btn btn-primary btn-sm">un featured</a>';
                }
                if ($row->publication_status == 'active') {
                    $suspendUrl = route('article.suspend', $row->id);
                    $actionButtons .= '<a href="' . $suspendUrl . '" class="edit btn btn-warning btn-sm ml-3" >suspend</a>';
                } else {
                    $activeUrl = route('article.activate', $row->id);
                    $actionButtons .= '<a href="' . $unFeaturedUrl . '" class="edit btn btn-success btn-sm">activate</a>';
                }
                return $actionButtons;
            })->rawColumns(['action'])
            ->make(true);
        return $dataTable;
    }
}