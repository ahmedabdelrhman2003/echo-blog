@extends('dashboard.layout')
@section('title','Show Article')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">UBold</a></li>
                    <li class="breadcrumb-item"><a href="">Echo Blog</a></li>
                    <li class="breadcrumb-item active">Show Article</li>
                </ol>
            </div>
            <h4 class="page-title">Show Article</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-9">
        <div class="card d-block">
            <div class="card-body">


                <div class="row">
                    <div class="col-md-4">
                        <!-- assignee -->
                        <p class="mt-2 mb-1 text-muted">title</p>
                        <div class="media">

                            <div class="media-body">
                                <h5 class="mt-1 font-size-14">
                                    {{$article->title}}
                                </h5>
                            </div>
                        </div>
                        <!-- end assignee -->
                    </div> <!-- end col -->

                    <div class="col-md-4">
                        <!-- start due date -->
                        <p class="mt-2 mb-1 text-muted">description</p>
                        <div class="media">
                            <i class="mdi  font-18 text-success mr-1"></i>
                            <div class="media-body">
                                <h5 class="mt-1 font-size-14">
                                    description
                                </h5>
                            </div>
                        </div>
                        <!-- end due date -->
                    </div>

                    <div class="col-md-4">
                        <!-- start due date -->
                        <p class="mt-2 mb-1 text-muted">description</p>
                        <div class="media">
                            <i class="mdi  font-18 text-success mr-1"></i>
                            <div class="media-body">
                                <h5 class="mt-1 font-size-14">
                                    {{$article->description}}
                                </h5>
                            </div>
                        </div>
                        <!-- end due date -->

                    </div> <!-- end col -->
                    <div class="col-md-12">
                        <!-- start due date -->
                        <p class="mt-2 mb-1 text-muted">content</p>
                        <div class="media">
                            <i class="mdi  font-18 text-success mr-1"></i>
                            <div class="media-body">
                                <h5 class="mt-1 font-size-14">
                                    {{$article->content}}
                                </h5>
                            </div>
                        </div>
                        <!-- end due date -->
                    </div>
                </div> <!-- end row -->

                <!-- end col -->

            </div> <!-- end card-body-->
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card-box product-box">
            <div class="bg-light">
                <img src="{{url('assests/img/articles'.$article->image)}}" alt="article-pic" class="img-fluid">
            </div>
        </div> <!-- end card-box-->
    </div>



</div>
@endsection