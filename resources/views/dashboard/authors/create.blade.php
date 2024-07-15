@extends('dashboard.layout')
@section('title', 'Create Cart')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="">UBold</a></li>
                        <li class="breadcrumb-item"><a href="">Echo Blog</a></li>
                        <li class="breadcrumb-item active">Add author</li>
                    </ol>
                </div>
                <h4 class="page-title">Add author</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">General</h5>
                <form action="{{ route('manageAuthor.store') }}" enctype="multipart/form-data" method="POST"
                    class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews"
                    data-upload-preview-template="#uploadPreviewTemplate">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="Card-name"> Name <span class="text-danger">*</span></label>
                        <input type="text" id="Card-name" name="name" class="form-control" value="{{ old('name') }}"
                            placeholder="enter the name">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="Card-name"> Email <span class="text-danger">*</span></label>
                        <input type="text" id="Card-name" name="email" value="{{ old('email') }}" class="form-control"
                            placeholder="enter your email">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card-box">
                <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">author Image</h5>

                <div class="fallback">
                    <input name="image" type="file" multiple />
                </div>
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="dropzone-previews mt-3" id="file-previews"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="text-center mb-3">

                <button type="submit" class="btn w-sm btn-success waves-effect waves-light"
                    control-id="ControlID-6">Save</button>

            </div>
        </div>
        </form>
    </div>
@endsection
