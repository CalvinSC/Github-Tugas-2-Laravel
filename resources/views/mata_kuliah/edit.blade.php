@extends('layout.main')
@section('title', 'mata_kuliah')

@section('content')
     <!--begin::Row-->
     <div class="row">
              <div class="col-12">
                <!-- Default box -->
                <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Edit Mata Kuliah</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form action="{{ route('mata_kuliah.update',$mata_kuliah->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="nama" class="form-label">Kode MK</label>
                        <input type="text" class="form-control" name="nama" value="{{ old('kode_mk') ? old('kode_mk') : $mata_kuliah->kode_mk }}">
                        @error('kode_mk')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                      <div class="mb-3">
                        <label for="singkatan" class="form-label">Singkatan</label>
                        <input type="text" class="form-control" name="singkatan" value="{{ old('singkatan') ? old('singkatan') : $prodi->singkatan }}">
                        @error('singkatan')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="kaprodi" class="form-label">Nama Kaprodi</label>
                        <input type="text" class="form-control" name="kaprodi" value="{{ old('kaprodi') ? old('kaprodi') : $prodi->kaprodi }}">
                        @error('kaprodi')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                      <div class="mb-3">
                        <label for="Sekretaris" class="form-label">Nama Sekretaris</label>
                        <input type="text" class="form-control" name="Sekretaris" value="{{ old('Sekretaris') ? old('Sekretaris') : $prodi->Sekretaris }}">
                        @error('Sekretaris')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="fakultas_id" class="form-label">Fakultas</label>
                        <select class="form-control" name="fakultas_id">
                          @foreach ($fakultas as $item)
                            <option value="{{ $item->id }}" {{ old('fakultas_id') == $item->id ? 'selected': ($prodi->fakultas_id == $item->id? 'selected' : null) }}> 
                                {{ $item->nama }}
                        </option>
                          @endforeach
                        </select>
                        @error('fakultas')
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