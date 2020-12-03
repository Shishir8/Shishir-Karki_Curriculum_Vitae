@extends('layouts.app')
@section('title','Skills')
@push('css')
@endpush
@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-10">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Upload Skills</h5>
              </div>
              <div class="card-body">
                 <form method="POST" action="{{ route('skill.store') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>HTML (Hyper Text Markup Language)</label>
                        <select id="selectNumber" name="html" class="form-control">
                                <?php
                                    for ($i=1; $i<=100; $i++)
                                    {
                                        ?>
                                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php
                                    }
                                ?>
                                </select>
                      </div>
                    </div>

                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>CSS (Cascading Style Sheets)</label>
                        <select id="selectNumber" name="css" class="form-control">
                        <?php
                                    for ($i=1; $i<=100; $i++)
                                    {
                                        ?>
                                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php
                                    }
                                ?>
                        </select>
                      </div>
                    </div>
                    
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>LARAVEL</label>
                        <select id="selectNumber" name="laravel" class="form-control">
                        <?php
                                    for ($i=1; $i<=100; $i++)
                                    {
                                        ?>
                                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php
                                    }
                                ?>
                        </select>
                      </div>
                    </div>


                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>JAVA</label>
                        <select id="selectNumber" name="java" class="form-control">
                        <?php
                                    for ($i=1; $i<=100; $i++)
                                    {
                                        ?>
                                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php
                                    }
                                ?>
                        </select>
                      </div>
                    </div>

                  </div>
                  <a href="{{ route('skill.index') }}" class="btn btn-danger">Back</a>
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






