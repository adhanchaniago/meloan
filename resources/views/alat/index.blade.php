@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );
</script>
@stop
@extends('layouts.app')

@section('content')
<div class="row">

  <div class="col-lg-2">
    <a href="{{ route('alat.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Alat</a>
  </div>
{{-- <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <form action="{{ url('import_alat') }}" method="post" class="form-inline" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="input-group {{ $errors->has('importalat') ? 'has-error' : '' }}">
              <input type="file" class="form-control" name="importalat" required="">

              <span class="input-group-btn">
                              <button type="submit" class="btn btn-success" style="height: 38px;margin-left: -2px;">Import</button>
                            </span>
            </div>
          </form>

        </div> --}}
    <div class="col-lg-12">
                  @if (Session::has('message'))
                  <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                  @endif
                  </div>
</div>
<div class="row" style="margin-top: 20px;">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title pull-left">Data Alat</h4>
                  <div class="table-responsive">
                    <table class="table table-striped" id="table">
                      <thead>
                        <tr>
                          <th>
                            Nama Alat
                          </th>
                          <th>
                            Deskripsi
                          </th>                                                    
                          <th>
                            Stok
                          </th>                          
                          <th>
                            Aksi
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($datas as $data)
                        <tr>
                          <td class="py-1">
                          @if($data->foto_alat)
                            <img src="{{url('images/alat/'. $data->foto_alat)}}" alt="image" style="margin-right: 10px;" />
                          @else
                            <img src="{{url('images/alat/default.png')}}" alt="image" style="margin-right: 10px;" />
                          @endif
                          <a href="{{route('alat.show', $data->id)}}" style="color: #76d275;"> 
                            {{$data->nama_alat}}
                          </a>
                          </td>
                          <td>
                          
                            {{$data->deskripsi}}
                          
                          </td>

                          
                          <td>
                            {{$data->jumlah_alat}}
                          </td>
                          
                          <td>
                          <div class="btn-group dropdown">
                          <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Aksi
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                            <a class="dropdown-item" href="{{route('alat.edit', $data->id)}}"> Edit </a>
                            <form action="{{ route('alat.destroy', $data->id) }}" class="pull-left"  method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> Delete
                            </button>
                          </form>
                           
                          </div>
                        </div>
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
               {{--  {!! $datas->links() !!} --}}
                </div>
              </div>
            </div>
          </div>
@endsection