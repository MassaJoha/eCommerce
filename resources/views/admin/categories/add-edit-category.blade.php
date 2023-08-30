@extends('admin.layouts.layout')
@section('content')   
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Settings</h3>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                        <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                            <a class="dropdown-item" href="#">January - March</a>
                            <a class="dropdown-item" href="#">March - June</a>
                            <a class="dropdown-item" href="#">June - August</a>
                            <a class="dropdown-item" href="#">August - November</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $title }}</h4>
                    @if(Session::has('error_message'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> {{ Session::get('error_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    
                    @if(Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ Session::get('success_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    
                    <form class="forms-sample" @if(empty($category['id'])) action="{{ url('admin/categories/add-edit-category') }}" @else action="{{ url('admin/categories/add-edit-category/'.$category['id']) }}" @endif method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="category_name">Category Name</label>
                            <input type="text" class="form-control" id="category_name" placeholder="Enter Category Name" name="category_name" @if(!empty($category['category_name'])) value="{{ $category['category_name'] }}" @else value="{{ old('category_name') }}" @endif>
                        </div>

                        <div class="form-group">
                            <label for="option_id">Select Options</label>
                            <select name="option_id[]" id="option_id" class="form-control" style="color:#000" multiple>
                                <option value="">select</option>
                                @foreach($options as $option)
                                    <option value="{{ $option->id }}">{{$option->name}}</option>
                                @endforeach
                            </select>
                        </div>
                   
                        <div class="form-group">
                            <label for="section_id">Select Section</label>
                            <select name="section_id" id="section_id" class="form-control" style="color:#000">
                            <option value="">Select</option>
                            @foreach($getSections as $section)
                                <option value="{{ $section['id'] }}" @if(!empty($category['section_id']) selected="" @endif>{{ $section['name'] }}</option>
                            @endforeach
                            </select>
                        </div>
                       
                        <div class="form-group" id="appendCategoriesLevel">
                            @include('admin.categories.append-categories-level')
                        </div>
                        <div class="form-group">
                            <label for="category_image">Category Image</label>
                            <input type="file" name="category_image" id="category_image" class="form-control"></input>
                            @if(!empty($category['category_image']))
                                <a target="_blank" href="{{ url('front/images/category_images/'.$category['category_image']) }}">View Image</a>&nbsp;|&nbsp;
                                <a href="javascript:void(0)" class="confirmDelete" module="category-image" moduleid="{{ $category['id'] }}">Delete Image</a>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="category_discount">Category Discount</label>
                            <input type="text" class="form-control" id="categoy_discount" placeholder="Enter Categroy Discount" name="category_discount" @if(!empty($category['category_discount'])) value="{{ $category['category_discount'] }}" @else value="{{ old('category_discount') }}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="category_discount">Category Description</label>
                            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="url">Category URL</label>
                            <input type="text" class="form-control" id="url" placeholder="Enter Categroy URL" name="url" @if(!empty($category['url'])) value="{{ $category['url'] }}" @else value="{{ old('url') }}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="status">Category Status</label>
                            <select name="status" id="status">
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  
@include('admin.layouts.footer')
<!-- partial -->
@endsection