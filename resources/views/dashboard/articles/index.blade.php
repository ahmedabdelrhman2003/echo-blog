@extends('dashboard.layout')
@section('title', 'Articles')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- Include DataTables JS -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>


<script>
    $(document).ready(function() {

            $('.articles-table').DataTable({

                processing: true,

                serverSide: true,

                ajax: {
                    url: "{{ route('data-table.articles') }}",
                    type: "GET"
                },

                columns: [

                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    {
                    data: 'title',
                    name: 'title'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'publication_status',
                        name: 'publication_status'
                    },
                    {
                    data: 'featured',
                    name: 'featured'
                    },{
                    data: 'category_id',
                    name: 'category_id'
                    },{
                    data: 'author_id',
                    name: 'author_id'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                    // Define more columns as per your table structure

                ]

            });

        });
</script>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Echo Blog</a></li>
                    <li class="breadcrumb-item active">Artilces</li>
                </ol>
            </div>
            <h4 class="page-title">Articles</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row">
                <div class="col-lg-12">
                    <form class="form-inline">
                        <div class="form-group mx-sm-3"></div>
                    </form>
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-centered articles-table table-striped dt-responsive nowrap w-100"
                        id="products-datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>image</th>
                                <th>title</th>
                                <th>description</th>
                                <th>publication status</th>
                                <th>featured</th>
                                <th>category</th>
                                <th>author</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection