@extends('admin.layout.master')
@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')
    <div class="main-content">
        <section class="section">
            <div class="section-header justify-content-between">
                <h1>Ubah Database</h1>
                <div class="ml-auto">
                    <a href="{{ route('admin_table_index') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
                </div>
            </div>     
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin_table_edit_submit',$client_database->id) }}" method="post" class="row g-3" enctype="multipart/form-data">
                                    @csrf
                                    
                                     <div class="col-md-6">
                                        <label class="form-label">Entitas Usaha </label>
                                        <input type="text" class="form-control" name="entitas_usaha" value="{{ $client_database->entitas_usaha }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">No. Sertifikat </label>
                                        <input type="text" class="form-control" name="no_sertifikat" value="{{ $client_database->no_sertifikat }}">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Ruang Lingkup </label>
                                        <textarea name="ruang_lingkup" class="form-control h_100"  cols="30" rows="10" value="{{ $client_database->ruang_lingkup }}"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Alamat </label>
                                        <textarea name="alamat" class="form-control h_100"  cols="30" rows="10" value="{{ $client_database->alamat }}"></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="input-group-text" for="inputGroupSelect01">Standar</label>
                                        <select class="form-select" id="inputGroupSelect01" name="standar" value="{{ $client_database->standar }}">
                                          <option selected>Pilih salah satu</option>
                                          <option value="ISO 9001:2015">9001:2015</option>
                                          <option value="ISO 14001:2015">14001:2015</option>
                                          <option value="ISO 45001:2018">45001:2018</option>
                                          <option value="ISO 37001:2016">37001:2016</option>
                                          <option value="ISO 22000:2018">22000:2018</option>
                                          <option value="HACCP">HACCP</option>
                                        </select>
                                      </div>

                                      <div class="col-md-4">
                                        <label class="input-group-text" for="inputGroupSelect04">Status Organisasi</label>
                                        <select class="form-select" id="inputGroupSelect04" name="status_organisasi" value="{{ $client_database->status_organisasi }}">
                                          <option selected>Pilih salah satu</option>
                                          <option class="badge text-bg-success text-wrap" style="width: 6rem;" value="Aktif">Aktif</option>
                                          <option class="badge text-bg-warning text-wrap" style="width: 6rem;"value="Dibekukan">Dibekukan</option>
                                          <option class="badge text-bg-danger text-wrap" style="width: 6rem;"value="Dicabut">Dicabut</option>
                                        </select>
                                      </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Masa Berlaku *</label>
                                        <input type="date" class="form-control date" name="masa_berlaku" value="{{ $client_database->masa_berlaku }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Audit Awal </label>
                                        <input type="date" class="form-control date" name="audit_awal" value="{{ $client_database->audit_awal }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Pengawasan Audit 1 </label>
                                        <input type="date" class="form-control date" name="pengawasan_audit_1" value="{{ $client_database->pengawasan_audit_1 }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Pengawasan Audit 2 </label>
                                        <input type="date" class="form-control date" name="pengawasan_audit_2" value="{{ $client_database->pengawasan_audit_2 }}">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="input-group-text" for="inputGroupSelect02">Status  Pengawasan 1</label>
                                        <select class="form-select" id="inputGroupSelect02" name="status_pengawasan_1" value="{{ $client_database->status_pengawasan_1 }}">
                                          <option selected>Pilih salah satu</option>
                                          <option class="badge text-bg-success text-wrap" style="width: 6rem;" value="Aktif">Aktif</option>
                                          <option class="badge text-bg-warning text-wrap" style="width: 6rem;" value="Pending">Pending</option>
                                        </select>
                                      </div>
                                      <div class="col-md-4">
                                        <label class="input-group-text" for="inputGroupSelect03">Status  Pengawasan 2</label>
                                        <select class="form-select" id="inputGroupSelect03" name="status_pengawasan_2" value="{{ $client_database->status_pengawasan_2 }}">
                                          <option selected>Pilih salah satu</option>
                                          <option value="Aktif">Aktif</option>
                                          <option value="Pending">Pending</option>
                                        </select>
                                      </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Perpanjangan </label>
                                        <input type="date" class="form-control date" name="perpanjangan" value="{{ $client_database->perpanjangan }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">QR Code</label>
                                        <div><input type="file" class="form-control" name="qr_code"></div>
                                    </div>
                                    <div class="col">
                                        <label class="form-label"></label>
                                        <button type="submit" class="btn btn-primary btn-lg fs-4">Submit</button>
                                    </div>  
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>      
 @endsection
