@extends('layout.main')
@section('title', 'Jadwal')

@section('content')
     <!--begin::Row-->
     <div class="row">
              <div class="col-12">
                <!-- Default box -->
                <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Tambah Jadwal</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form action="{{ route('prodi.store')}}" method="POST">
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="kode_jadwal" class="form-label">Kode Jadwal</label>
                        <input type="text" class="form-control" name="kode_jadwal" value="{{ old('kode_jadwal') }}">
                        @error('kode_jadwal')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                      <div class="mb-3">
                        <label for="kode_smt" class="form-label">Kode SMT</label>
                        <input type="text" class="form-control" name="kode_smt" value="{{ old('kode_smt') }}">
                        @error('kode_smt')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <input type="text" class="form-control" name="kelas" value="{{ old('kelas') }}">
                        @error('kelas')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                       <div class="mb-3">
                        <label for="mata_kuliah_id" class="form-label">Mata Kuliah</label>
                        <select class="form-control" name="mata_kuliah_id">
                          @foreach ($mataKuliah as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                          @endforeach
                        </select>
                        @error('mata_kuliah_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="sesi_id" class="form-label">Sesi</label>
                        <select class="form-control" name="sesi_id">
                          @foreach ($sesi as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                          @endforeach
                        </select>
                        @error('sesi_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <!--end::Footer-->
                  </form>
                  <!--end::Form-->
                </div>
                <!-- /.card -->
              </div>
            </div>
            <!--end::Row-->
    
@endsection