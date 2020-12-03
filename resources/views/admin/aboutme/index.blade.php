@extends('layouts.app')
@section('title','About Me')
@push('css')
@endpush
@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-12">
          <a href="{{ route('aboutme.create') }}" class="btn btn-primary">Add New</a>
            <div class="card">
              <div class="card-header"> 
                <h4 class="card-title"> Simple Table</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                  <thead class=" text-primary">
                      <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Profile</th>
                        <th>Phone</th>
                        <th>Country</th>
                        <th>website</th>
                        <th>Address</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                             @foreach($aboutmes as $key=>$aboutme)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $aboutme->name }}</td>
                                            <td>{{ $aboutme->email }}</td>
                                            <td>{{ $aboutme->profile }}</td>
                                            <td>{{ $aboutme->phone }}</td>
                                            <td>{{ $aboutme->country }}</td>
                                            <td>{{ $aboutme->website }}</td>
                                            <td>{{ $aboutme->address }}</td>
                                            <td>{{ $aboutme->description }}</td>
                                            <td>{{ $aboutme->image }}</td>
                                            <td>{{ $aboutme->created_at }}</td>
                                            <td>{{ $aboutme->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('aboutme.edit',$aboutme->id) }}" class="btn btn-info btn-sm"><i class="material-icons">Edit</i></a>

                                                <form id="delete-form-{{ $aboutme->id }}" action="{{ route('aboutme.destroy',$aboutme->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $aboutme->id }}').submit();
                                                }else {
                                                    event.preventDefault();
                                                        }"><i class="material-icons">delete</i></button>
                                            </td>
                                        </tr>
                         @endforeach
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection

@push('scripts')
@endpush






