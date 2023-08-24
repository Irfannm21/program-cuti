@extends('layouts.admin')
@section('content')
@can('role_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.roles.create") }}">
                {{ trans('global.buat') }} {{ trans('cruds.karyawan.time_off') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">
            {{ trans('cruds.karyawan.application_off') }}
        </h4>
    </div>

    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover datatable datatable-Role">
                <thead>
                  <tr>
                    <th width="10">

                    </th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Tahun</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($results as $item)
                  <tr data-entry-id="">
                    <td>

                    </td>
                        <td>
                          {{$item->cuti->master->nip}}
                        </td>
                        <td>
                          {{$item->cuti->master->cv->nama}}
                        </td>
                        <td>
                          {{date('Y',strtotime($item->cuti->tahun))}}
                        </td>
                        <td>
                          {{$item->alasan}}
                        </td>
                        <td>
                          <span class="badge badge-warning badge-xs">{{$item->status}}</span>
                        </td>
                        <td>
                          <div class="dropdown">
                              <button class="btn btn-dark btn-xs dropdown-toggle" type="button" data-toggle="dropdown">
                                Menu
                              </button>
                            <div class="dropdown-menu">
                              <a href="#" class="btn-success dropdown-item">Terima</a>
                              <a href="#" class="btn-success dropdown-item">Terima</a>
                              <a href="#" class="btn-success dropdown-item">Terima</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                  @endforeach
                </tbody>
            </table>  
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('role_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.roles.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Role:not(.ajaxTable)').DataTable(
      { buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
