@extends('layouts.app')
@section('title','Skills')
@push('css')
@endpush
@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
            <a href="{{ route('skill.create') }}" class="btn btn-primary">Add New</a>
              <div class="card-header"> 
                <h4 class="card-title"> Skills</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                  <thead class=" text-primary">
                      <th>ID</th>
                        <th>HTML</th>
                        <th>CSS</th>
                        <th>LARAVEL</th>
                        <th>JAVA</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                             @foreach($skills as $key=>$skill)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $skill->html }}</td>
                                            <td>{{ $skill->css }}</td>
                                            <td>{{ $skill->laravel }}</td>
                                            <td>{{ $skill->java }}</td>
                                            <td>{{ $skill->created_at }}</td>
                                            <td>{{ $skill->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('skill.edit',$skill->id) }}" class="btn btn-info btn-sm"><i class="material-icons">Edit</i></a>

                                                <form id="delete-form-{{ $skill->id }}" action="{{ route('skill.destroy',$skill->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $skill->id }}').submit();
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






