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
                <label for="nip">Nama Karyawan</label>
                <select name="nip" id="nip" class="form-control select2" required>
                    <option value=""></option>
                    @foreach($results as $id => $result)
                        <option value="{{ $result->nip }}" {{ (in_array($id, old('nip', [])) || isset($role) && $role->result->contains($id)) ? 'selected' : '' }}>{{ $result->cv->nama }}</option>
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
                            <option value="Cuti Tahunan">Cuti Tahunan</option>
                            <option value="Cuti Besar">Cuti Besar</option>
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
                        <label for="tahun">Tahun</label>
                        <select name="tahun" id="tahun" class="form-control"> 
                            <option value="" selected>-- Pilih Tahun Cuti--</option>
                      
                        </select>
                        @if($errors->has('tahun'))
                            <p class="help-block">
                                {{ $errors->first('tahun') }}
                            </p>
                        @endif
                        <p class="helper-block">
                            {{-- {{ trans('cruds.role.fields.tanggal_helper') }} --}}
                        </p>
                    </div>

                    <div class="col-md-3">
                        <label for="awal">Dari awal</label>
                        <input type="date" id="awal" name="awal" class="form-control" value="{{ old('awal', isset($role) ? $role->awal : '') }}" required>
                        @if($errors->has('awal'))
                            <p class="help-block">
                                {{ $errors->first('awal') }}
                            </p>
                        @endif
                        <p class="helper-block">
                            {{-- {{ trans('cruds.role.fields.tanggal_helper') }} --}}
                        </p>
                    </div>

                    <div class="col-md-3">
                        <label for="akhir">Sampai Tanggal</label>
                        <input type="date" id="akhir" name="akhir" class="form-control" value="{{ old('akhir', isset($role) ? $role->akhir : '') }}" required>
                        @if($errors->has('akhir'))
                            <p class="help-block">
                                {{ $errors->first('akhir') }}
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

@section('scripts')
<script>
    $(document).ready(function () {
    $(document).on("change","#nip", function() {
        $.ajax({
            method: "GET",
            url: '{{url('admin/trans_cutis/cari')}}',
            data : {
                val : $(this).val()
            },
            success : function(response) {
                console.log(204,response)
            }
        })
    });
    
    $(document).on("change","#jenis", function() {
        $.ajax({
            method: "GET",
            url: '{{url('admin/trans_cutis/jenis')}}',
            data : {
                val : $(this).val(),
                val_2 : $("#nip").val()
            },
            success: function(response) {
                console.log(204,response)
                let opt = '';
                    opt += '<option> Pilih Tahun Cuti</option>';
                for (let value of response) {
                    let date = new Date(value.tahun);
                        date = date.getFullYear();
                    opt += `<option>${date}</option>`
                }
                $('#tahun').html(opt);
            }
        })
    });
    
}) 
</script>

@endsection