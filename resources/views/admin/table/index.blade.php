@extends('admin.layout.master')
@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')
    <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Sertifikat Klien</h1>
                <div class="ml-auto">
                    <form action="{{ route('admin_table_index') }}" method="GET" class="row g-3">
                        <div class="col-auto">
                            <input type="text" name="search" class="form-control form-control-sm" aria-label=".form-control-sm example"
                                   value="{{ old('search', $search) }}" placeholder="Cari Sertifikat atau Perusahaan">
                        </div>
                        <div class="col-auto"><button type="submit" class="btn btn-primary mb-3">Search</button></div>
                    </form>
                    <a href="{{ route('admin_table_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
                    <a href="{{ route('admin_upload_csv') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Upload Database</a>
                </div>
            </div>     
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive {-lg}">
                                    <table class="table table-bordered table-striped table-hover" id="example1">
                                        <thead class="table-success border border-3 text text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Entitas Usaha</th>
                                                <th>No. Sertifikat</th>
                                                <th>Ruang Lingkup</th>
                                                <th>Alamat</th>
                                                <th>Standar</th>
                                                <th>Status Organisasi</th>
                                                <th>Masa Berlaku</th>
                                                <th>Audit Awal</th>
                                                <th>Pengawasan Audit I</th>
                                                <th>Pengawasan Audit II</th>
                                                <th>Status Pengawasan Audit I</th>
                                                <th>Status Pengawasan Audit II</th>
                                                <th>Perpanjangan</th>
                                                <th>QRCode</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-active border border-3 text text-center fs-6 fw-semibold align-baseline">
                                            @foreach ($client_databases as $client_database)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $client_database->entitas_usaha }}</td>
                                                <td>{{ $client_database->no_sertifikat }}</td>
                                                <td>{{ $client_database->ruang_lingkup }}</td>
                                                <td>{{ $client_database->alamat }}</td>
                                                <td>{{ $client_database->standar }}</td>
                                                <td>{{ $client_database->status_organisasi }}</td>
                                                <td>{{ $client_database->masa_berlaku }}</td>
                                                <td>{{ $client_database->audit_awal }}</td>
                                                <td>{{ $client_database->pengawasan_audit_1 }}</td>
                                                <td>{{ $client_database->pengawasan_audit_2 }}</td>
                                                <td>{{ $client_database->status_pengawasan_1 }}</td>
                                                <td>{{ $client_database->status_pengawasan_2 }}</td>
                                                <td>{{ $client_database->perpanjangan }}</td>
                                                <td>
                                                    <img src="{{ asset('qr/'.$client_database->qr_code) }}"
                                                    alt="" class="" style="width: 70px; height: 70px">
                                                </td>
                                                <td class="pt_10 pb_10">
                                                    <a href="{{ route('admin_table_edit',$client_database->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('admin_table_delete',$client_database->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
                                                </td> 
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item" id="prevBtn">
                                                <button class="page-link">Previous</button>
                                            </li>
                                            <li class="page-item disabled">
                                                <span class="page-link" id="pageNum">1</span>
                                            </li>
                                            <li class="page-item" id="nextBtn">
                                                <button class="page-link">Next</button>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>      
 @endsection
