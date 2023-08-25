@extends('layouts.admin')
@section('content')

    
<div class="container px-3">
    <div class="card my-5">
        <div class="card-header">
            <h5 class="d-inline">Post Create</h5>
            <a href="posts.php" class="btn btn-danger float-end">Cancel</a>
        </div>
        <div class="card-body">
            <form action="{{route('backend.posts.store')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" name="title">
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{$errors->first('name')}}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select name="category_id" id="category" class="form-control {{$errors->has('category_id') ? 'is-invalid' : ''}}">
                        @if($errors->has('category_id'))
                            <div class="invalid-feedback">
                                {{$errors->first('category_id')}}
                            </div>
                        @endif
                        <option value="">Select Option</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="user_id" class="form-label">User</label>
                    <select name="user_id" id="user_id" class="form-control {{$errors->has('user_id') ? 'is-invalid' : ''}}">
                        @if($errors->has('user_id'))
                            <div class="invalid-feedback">
                                {{$errors->first('user_id')}}
                            </div>
                        @endif
                        <option value="">Select Option</option>
                        @foreach($users as $user)
                        <option value="{{$category->id}}">{{$user->name}}</option>
                        @endforeach
                    </select> 
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Photo</label>
                    <input type="file" class="form-control {{$errors->has('photo') ? 'is-invalid' : ''}}" name="photo" accept="image/*">
                    @if($errors->has('photo'))
                        <div class="invalid-feedback">
                            {{$errors->first('photo')}}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}" id="description" rows="3" name="description"></textarea>
                    @if($errors->has('description'))
                        <div class="invalid-feedback">
                            {{$errors->first('description')}}
                        </div>
                    @endif
                </div>
                 <button class="btn btn-primary w-100 mt-3 " type="submit">Submit</button>
            </form>
        </div>
    </div>
  
</div>

@endsection