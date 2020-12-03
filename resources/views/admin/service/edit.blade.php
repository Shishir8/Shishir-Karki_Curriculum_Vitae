@extends('layouts.app')
@section('title','Services Edit')
@push('css')
@endpush
@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-9">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Edit Service</h5>
              </div>
              <div class="card-body">
                 <form method="POST" action="{{ route('service.update',$service->id) }}" enctype="multipart/form-data">
                 @csrf
                  @method('PUT')
                  <div class="row">
                    
                     <div class="col-md-6 pr-1">
                          <div class="form-group">
                            <label>Service Headline</label>
                              <input type="text" class="form-control" name="headline_srvc" placeholder="Username" value="{{ $service->headline_srvc }}">
                          </div>
                     </div>
                     <div class="col-md-6 pl-1">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Service Title</label>
                              <input type="text" class="form-control" name="title_srvc" placeholder="Email" value="{{ $service->title_srvc }}">
                          </div>
                      </div>

                  </div>
                  
                  <div class="row">
                     <div class="col-md-6 pr-1">
                        <div class="form-group">
                           <label>Service Title Description</label>
                             <input type="text" class="form-control" name="sub_title_srvc" value="{{ $service->sub_title_srvc }}">
                        </div>
                      </div>
                      <div class="col-md-6 pl-1">
                           <label class="control-label">Image</label>
                             <input type="file" name="image">
                       </div>
                  </div>

                
                  

                 
                      
                    
                    
                    
                  </div>
                  <a href="{{ route('service.index') }}" class="btn btn-danger">Back</a>
                  <button type="submit" class="btn btn-primary">Save</button>
                </form>
              </div>
            </div>
          </div>
          
        </div>
      </div>
@endsection

@push('scripts')
@endpush






