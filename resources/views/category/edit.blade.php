@extends('category.layout')

@section('content')



<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>category</h2>
            </div>
           
        </div>
    </div>


    <div class="row">

       

        <div class="col-lg-12">

            <div class="card">

               

                <div class="card-header">Edit Category</div>
                <div class="card-body">
                    <form action="{{ url('category/update/'.$categories->id) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" name="category_name" id="category_name" value="{{ $categories->category_name }}">
                            @error('category_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a class="btn btn-primary" href="{{ route('all.category') }}"> Back</a>
                    </form>
                </div>
            </div>

        </div>


    </div>



</div>

@endsection
