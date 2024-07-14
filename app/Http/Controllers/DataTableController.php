<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class DataTableController extends Controller
{
    function getAuthorsDataTable()
    {
        $data = Author::select('id', 'name', 'email', 'image', 'status', 'created_at', 'updated_at');

        return DataTables::of($data)->addIndexColumn()->addColumn('action', function ($row) {
        })->make(true);
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
                    $actionButtons .= '<a href="' . $unFeaturedUrl . '" class="edit btn btn-primary btn-sm">Unfeatured</a>';
                }

                return $actionButtons;
            })->rawColumns(['action'])
            ->make(true);
        return $dataTable;
    }
}
