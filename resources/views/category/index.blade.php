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

        <div class="col-lg-8">

            <div class="card">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                    </div>
                 @endif
                <div class="card-header">All Category</div>
                <div class="card-body">

                    <table class="table table-bordered">

                        <thead>
                            <th>Category Name</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                               
                                <td>{{ $category->category_name }}</td>
                               
                               <td>

                                <a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-info">Update</a>

                                <a href="{{ url('category/delete/'.$category->id) }}" class="btn btn-danger">Delete</a>

                               </td>
                            </tr>
                        @endforeach
                        </tbody>
                        
        
                    </table>
                   
                </div>
            </div>

           


        </div>

        <div class="col-lg-4">

            <div class="card">

               

                <div class="card-header">Add Category</div>
                <div class="card-body">
                    <form action="{{ route('store.category') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" name="category_name" id="category_name">
                            @error('category_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </form>
                </div>
            </div>

        </div>


    </div>



</div>

@endsection
