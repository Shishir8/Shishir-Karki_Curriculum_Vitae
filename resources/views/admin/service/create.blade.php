@extends('layouts.app')
@section('title','Services')
@push('css')
@endpush
@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-9">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Upload Service</h5>
              </div>
              <div class="card-body">
                 <form method="POST" action="{{ route('service.store') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    
                     <div class="col-md-6 pr-1">
                          <div class="form-group">
                            <label>Service Headline</label>
                              <input type="text" class="form-control" name="headline_srvc" placeholder="Username" value="">
                          </div>
                     </div>
                     <div class="col-md-6 pl-1">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Service Title</label>
                              <input type="text" class="form-control" name="title_srvc" placeholder="Email">
                          </div>
                      </div>

                  </div>
                  
                  <div class="row">
                     <div class="col-md-6 pr-1">
                        <div class="form-group">
                           <label>Service Title Description</label>
                             <input type="text" class="form-control" name="sub_title_srvc" placeholder="Full Stack Developer" >
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






