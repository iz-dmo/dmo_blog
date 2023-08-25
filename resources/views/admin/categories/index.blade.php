@extends('layouts.admin')
@section('content')

                <main>
                    <div class="container-fluid px-4">
                        <div class="my-4">
                            <h4 class="mt-4 d-inline">Categories</h4>
                            <a href="{{route('backend.categories.create')}}" class="btn btn-primary float-end">Add Category</a>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Category Lists
                            </div>
                            <div class="card-body">
                                <table id="" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="w-25">No.</th>
                                            <th class="w-25">Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th class="w-25">N0.</th>
                                            <th class="w-25">Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="tBody">
                                    @foreach($categories as $category)
                                        <tr>
                                            
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>
                                                <a href="{{route('backend.categories.edit',$category->id)}}" class="btn btn-warning btn-sm">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                                <button class="btn btn-danger btn-sm delete" data-id="{{$category->id}}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            {{$categories->links()}}
                            </div>
                        </div>
                    </div>
                </main>
                  
<!-- Delete section -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-light" id="deleteModalLabel">User Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3 class="text-danger">Are U Sure To Delete?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <form action="" method="POST" id="deleteForm">
            {{csrf_field()}}
            {{method_field('delete')}}
            <button type="submit" class="btn btn-danger">Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')

    <script>
        $(document).ready(function(){
           $('#tBody').on('click','.delete',function(){
                // alert('ok');
                let id=$(this).data('id');
                $('#deleteForm').prop('action','categories/'+id);
                $('#deleteModal').modal('show');
           }) 
        })
    </script>

@endsection