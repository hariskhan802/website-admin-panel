

@extends('Admin.Layout.layout')

@section('content')

	<div class="main-wrap {{ $name.'-wrap' }}">
            

            
            
            <div class="main-c-wrap profile-wrap">

            
            @if(session('errormsg'))
            <div class="card mb-4 border-left-danger">
                <div class="card-body">
                    {{ session('errormsg') }}
                </div>
            </div>
            @endif
            <div class="card shadow mb-4">
                
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ word_format($name, 'ucfirst')  }}</h6>
                </div>
                
                <div class="card-body">
                    <div class="tabs-wrap">
                        <form method="post" action="{{ route('settings') }}" novalidate enctype="multipart/form-data">
                            <div class="form-wrap">
                                <div class="form-head">
                                    <h6>Information</h6>
                                </div>
                                <div class="form-group">
                                    <label>Site Title</label>
                                    <input type="text" class="form-control" placeholder="Site Title" name="site_title" value="{{ get_option('site_title') }}" required>
                                    <small class="error-msg"></small>
                                </div>
                                
                                <div class="form-group">
                                    <label>Administration Email Address</label>
                                    <input type="email" class="form-control" placeholder="Administration Email Address" name="administration_email_address" value="{{ get_option('administration_email_address') }}"  required>
                                    <small class="error-msg"></small>
                                </div>
                                
                                
                                
                                <div class="form-group">
                                    @csrf
                                    <input type="submit" name="submit" value="Update" class="btn btn-primary pull-right">
                                </div>
                            </div>
                        </form>                        
                        <div class="card mb-4 c-msg border-left-success">
                            <div class="card-body"></div>
                        </div>
                    </div>

                    
                    
                </div>
            </div>
                            
            </div>
        </form>
    </div>

    
@endsection