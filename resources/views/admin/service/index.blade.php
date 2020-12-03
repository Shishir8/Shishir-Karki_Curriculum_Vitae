@extends('layouts.app')
@section('title','Service')
@push('css')
@endpush
@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-12">
          <a href="{{ route('service.create') }}" class="btn btn-primary">Add New</a>
            <div class="card">
              <div class="card-header"> 
                <h4 class="card-title"> Simple Table</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                  <thead class=" text-primary">
                      <th>ID</th>
                        <th>Service Headline</th>
                        <th>Service Title</th>
                        <th>Service Title Description</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                             @foreach($services as $key=>$service)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $service->headline_srvc }}</td>
                                            <td>{{ $service->title_srvc }}</td>
                                            <td>{{ $service->sub_title_srvc }}</td>
                                            <td>{{ $service->image }}</td>
                                            <td>{{ $service->created_at }}</td>
                                            <td>{{ $service->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('service.edit',$service->id) }}" class="btn btn-info btn-sm"><i class="material-icons">Edit</i></a>

                                                <form id="delete-form-{{ $service->id }}" action="{{ route('service.destroy',$service->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $service->id }}').submit();
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






