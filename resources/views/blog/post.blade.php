@extends('layouts.frontend')
@section('content')
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                @foreach($post_categories as $post)
                <div class="col-lg-3">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">{{$post->title}}</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posted on {{$post->updated_at}}</div>
                            <!-- Post categories-->
                            <a class="badge bg-secondary text-decoration-none link-light" href="{{route('blog.show',$post->id)}}">{{$post->category->name}}</a>
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="{{$post->photo}}" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4">{{$post->description}}</p>
                           
                        </section>
                    </article>
                    <!-- Comments section-->
                </div>
                @endforeach
                <!-- Side widgets-->
                <div class="col-lg-3">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search"/>
                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        @foreach($categories as $category)
                                        <li><a href="{{route('blog.show',$category->id)}}">{{$category->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
@endsection  
