@extends('admin.layout.master')
@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')
    <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Update Database</h1>
                    <div>
                        @if(session('success'))
                            <p>{{ session('success') }}</p>
                         @endif    
                    </div>   
            </div>          
                        <div class="section-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="{{ route('admin_csv') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="col-md-4">
                                                <label class="form-label">Upload CSV file here</label>
                                                <input type="file" class="form-control" name="csv_file">
                                                </div>
                                                <div class="col-md-6">
                                                <label class="form-label"></label>
                                                <button type="submit" class="btn btn-primary mb-3">Upload</button>
                                                </div>  
                                            </form>
                                        </div>
                                    </div>
                                </div>    
                            </div>        
                        </div>
                    </div>
                   
        </section>  
    </div>            
@endsection
                        