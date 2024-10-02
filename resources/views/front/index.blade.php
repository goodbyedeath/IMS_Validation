@extends('front.master')
@include('front.nav')
@section('front-main')
<div class="container my-5">
    <h1 class="text-center mb-4" style="user-select: none">Sertifikat Klien</h1>
    <form action="{{ route('search2') }}" method="GET" class="row g-3">
        <div class="col-auto">
            <label for="inputPassword2" class="visually-hidden">Search</label>
            <input type="text" name="search2" class="form-control form-control-sm" aria-label=".form-control-sm example"
                   value="{{ old('search2', $search2) }}" placeholder="Cari Sertifikat atau Perusahaan">
        </div>
        <div class="col-auto"><button type="submit" class="btn btn-primary mb-3">Search</button></div>
    </form>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            user-select: none; /* Prevent text selection */
        }

        /* Optional: Disable pointer events to indicate no copy */
        td {
           
        }

        /* Prevent selecting text in table */
        -webkit-user-select: none; /* For Chrome, Safari, and Opera */
        -moz-user-select: none;    /* For Firefox */
        -ms-user-select: none;     /* For Internet Explorer/Edge */
        user-select: none;         /* Standard syntax */
    </style>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive {-lg}">
                            <table class="table table-bordered table-striped table-hover;" id="example1">
                                <thead class="table-warning border border-3 text text-center align-baseline">
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
                                <tbody class="table-active text text-center fs- align-baseline">
                                    @foreach ($client_databases as $client_database)
                                    <tr>
                                        <td class="h6">{{ $loop->iteration }}</td>
                                        <td class="h6"><a href="{{ route('pdf', $client_database->id) }}">
                                            {{ $client_database->entitas_usaha }}</td>
                                        <td class="h6">{{ $client_database->no_sertifikat }}</td>
                                        <td class="h6">{{ $client_database->ruang_lingkup }}</td>
                                        <td class="h6">{{ $client_database->alamat }}</td>
                                        <td class="h6">{{ $client_database->standar }}</td>
                                        <td class="h6">{{ $client_database->status_organisasi }}</td>
                                        <td class="h6">{{ $client_database->masa_berlaku }}</td>
                                        <td class="h6">{{ $client_database->audit_awal }}</td>
                                        <td class="h6">{{ $client_database->pengawasan_audit_1 }}</td>
                                        <td class="h6">{{ $client_database->pengawasan_audit_2 }}</td>
                                        <td class="h6">{{ $client_database->status_pengawasan_1 }}</td>
                                        <td class="h6">{{ $client_database->status_pengawasan_2 }}</td>
                                        <td class="h6">{{ $client_database->perpanjangan }}</td>
                                        <td>
                                            <img src="{{ asset('qr/'.$client_database->qr_code) }}"
                                            alt="" class="" style="width: 50px; height: 50px">
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
</div>    
@endsection

