@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">
            {{ trans('global.create') }} {{ trans('cruds.role.title_singular') }}
        </h4>
    </div>

    <div class="card-body">
        <form action="{{ route("admin.trans_cutis.store") }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group {{ $errors->has('nip') ? 'has-error' : '' }}">
                <label for="nip">{{ trans('cruds.role.fields.permissions') }}*
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="nip[]" id="permissions" class="form-control select2" multiple="multiple" required>
                    @foreach($results as $id => $permissions)
                        <option value="{{ $id }}" {{ (in_array($id, old('nip', [])) || isset($role) && $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions->cv->nama }}</option>
                    @endforeach
                </select>
                @if($errors->has('permissions'))
                    <p class="help-block">
                        {{ $errors->first('permissions') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.role.fields.permissions_helper') }}
                </div>

            </p>
            <div class="form-group {{ $errors->has('jenis') ? 'has-error' : '' }}">
                <div class="row">
                    <div class="col-md-3">
                        <label for="jenis">Jenis Cuti</label>
                        <select name="jenis" id="jenis" class="form-control"> 
                            <option value="" selected>-- Pilih Jenis Cuti--</option>
                            <option value="">Cuti Tahunan</option>
                            <option value="">Cuti Besar</option>
                        </select>
                        @if($errors->has('jenis'))
                            <p class="help-block">
                                {{ $errors->first('jenis') }}
                            </p>
                        @endif
                        <p class="helper-block">
                            {{-- {{ trans('cruds.role.fields.tanggal_helper') }} --}}
                        </p>
                    </div>

                    <div class="col-md-3">
                        <label for="jenis">Tahun</label>
                        <select name="jenis" id="jenis" class="form-control"> 
                            <option value="" selected>-- Pilih Tahun Cuti--</option>
                            <option value="">Tahun 2022 Sisa 5</option>
                            <option value="">Tahun 2023 Sisa 7</option>
                        </select>
                        @if($errors->has('jenis'))
                            <p class="help-block">
                                {{ $errors->first('jenis') }}
                            </p>
                        @endif
                        <p class="helper-block">
                            {{-- {{ trans('cruds.role.fields.tanggal_helper') }} --}}
                        </p>
                    </div>

                    <div class="col-md-3">
                        <label for="tanggal">Dari Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal" class="form-control" value="{{ old('tanggal', isset($role) ? $role->tanggal : '') }}" required>
                        @if($errors->has('tanggal'))
                            <p class="help-block">
                                {{ $errors->first('tanggal') }}
                            </p>
                        @endif
                        <p class="helper-block">
                            {{-- {{ trans('cruds.role.fields.tanggal_helper') }} --}}
                        </p>
                    </div>

                    <div class="col-md-3">
                        <label for="tanggal">Sampai Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal" class="form-control" value="{{ old('tanggal', isset($role) ? $role->tanggal : '') }}" required>
                        @if($errors->has('tanggal'))
                            <p class="help-block">
                                {{ $errors->first('tanggal') }}
                            </p>
                        @endif
                        <p class="helper-block">
                            {{-- {{ trans('cruds.role.fields.tanggal_helper') }} --}}
                        </p>
                    </div>
                </div>
                
            </div>


            <div class="form-group {{ $errors->has('tanggal') ? 'has-error' : '' }}">
                <label for="tanggal">Keterangan</label>
                <input type="text" id="tanggal" name="tanggal" class="form-control" value="{{ old('tanggal', isset($role) ? $role->tanggal : '') }}" required>
                @if($errors->has('tanggal'))
                    <p class="help-block">
                        {{ $errors->first('tanggal') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{-- {{ trans('cruds.role.fields.tanggal_helper') }} --}}
                </p>
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection
