@extends('layouts.admin')
@section('content')

    
<div class="container px-3">
    <div class="card my-5">
        <div class="card-header">
            <h5 class="d-inline">Post Create</h5>
            <a href="{{route('backend.posts.index')}}" class="btn btn-danger float-end">Cancel</a>
        </div>
        <div class="card-body">
            <form action="{{route('backend.posts.update',$post->id)}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('put')}}
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" name="title" value="{{$post->title}}">
                    @if($errors->has('title'))
                        <div class="invalid-feedback">
                            {{$errors->first('title')}}
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
                        <option value="{{$category->id}}" {{$post->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
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
                        <option value="{{$user->id}}" {{$post->user_id == $user->id ? 'selected' : ''}}>{{$user->name}}</option>
                        @endforeach
                    </select> 
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Photo</label>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Photo</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">New Photo</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <img src="{{$post->photo}}" alt="" class="img-fluid w-25 py-3">
                            <input type="hidden" name="old_photo" value="{{$post->photo}}">
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <input type="file" class="form-control {{$errors->has('photo') ? 'is-invalid' : ''}} my-3" name="new_photo" accept="image/*">
                                @if($errors->has('photo'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('photo')}}
                                    </div>
                                @endif
                        </div>
                    </div>
                    
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}" id="description" rows="3" name="description">{{$post->description}}</textarea>
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