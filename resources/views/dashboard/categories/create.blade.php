@extends('dashboard.layout')
@section('title','Create category')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">UBold</a></li>
                    <li class="breadcrumb-item"><a href="">Echo Blog</a></li>
                    <li class="breadcrumb-item active">Add category</li>
                </ol>
            </div>
            <h4 class="page-title">Add category</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">General</h5>
            <form action="{{route('category.store')}}" method="POST" class="dropzone" id="myAwesomeDropzone"
                data-plugin="dropzone" data-previews-container="#file-previews"
                data-upload-preview-template="#uploadPreviewTemplate">
                @csrf
                <div class="form-group mb-3">
                    <label for="Card-name">CAtegory Name <span class="text-danger">*</span></label>
                    <input type="text" id="Card-name" name="name" class="form-control" value="{{ old('name') }}"
                        placeholder="enter category name">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

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