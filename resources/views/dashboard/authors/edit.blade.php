@extends('dashboard.layout')
@section('title','Edit Card')

@section('css')
<style>
    .jvectormap-label {
        display: none;
    }
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">UBold</a></li>
                    <li class="breadcrumb-item"><a href="">Echo Blog</a></li>
                    <li class="breadcrumb-item active">Edit Category</li>
                </ol>
            </div>
            <h4 class="page-title">Edit Category</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">General</h5>
            <form action="{{route('category.update',$category->id)}}" method="PUT">
                @csrf
                @method('put')
                <div class="form-group mb-3">
                    <label for="Card-name">Category Name <span class="text-danger">*</span></label>
                    <input type="text" id="Card-name" name="name" value="{{$category->name}}" class="form-control"
                        placeholder="Category name" control-id="ControlID-2">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="Card-description">featured <span class="text-danger">*</span></label>
                    <select name="featured" id="">
                        <option selected value="1" {{$category->featured ==1 ? 'selected' : '' }}>yes</option>
                        <option selected value="0" {{$category->featured ==0 ? 'selected' : '' }}>no</option>
                    </select>
                    @error('featured')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="text-center mb-3">
                        <button type="submit" class="btn w-sm btn-success waves-effect waves-light"
                            control-id="ControlID-6">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection