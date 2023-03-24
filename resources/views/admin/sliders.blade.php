@extends('admin_layout.master')
@section('title', 'Sliders')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sliders</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active">Sliders</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Sliders</h3>
                            </div>
                            @if (Session::has('status'))
                                <br>
                                <div class="alert alert-success"> {{ Session::get('status') }}</div>
                            @endif
                            <!-- /.card-header -->
                            <input type="hidden" {{ $incrementar = 1 }}>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Num.</th>
                                            <th>Imagen</th>
                                            <th>Descripción 1 </th>
                                            <th>Descripción 2 </th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sliders as $slider)
                                            <tr>
                                                <td>{{ $incrementar }}</td>
                                                <td>
                                                    <img src="{{ asset('storage/sliderimagenes/' . $slider->imagen_slider) }}"
                                                        style="height : 50px; width : 50px" class="img-circle elevation-2"
                                                        alt="User Image">
                                                </td>
                                                <td>{{ $slider->descripcion1 }}
                                                </td>
                                                <td>{{ $slider->descripcion2 }}</td>
                                                <td>
                                                    @if ($slider->estado == 1)
                                                        {{-- <a href="#" class="btn btn-success">Desactivado</a> --}}
                                                        <form action="{{ route('desactivarslider', $slider->id) }}" method="POST">
                                                            @csrf @method('PUT')
                                                            <input type="submit" value="Desactivado" class="btn btn-success">
                                                            {{-- <a href="#" id="delete" class="btn btn-danger"><i
                                                                class="nav-icon fas fa-trash"></i></a> --}}
                                                        </form>
                                                    @else
                                                        {{-- <a href="#" class="btn btn-warning">Activado</a> --}}
                                                        <form action="{{ route('activarslider', $slider->id) }}" method="POST">
                                                            @csrf @method('PUT')
                                                            <input type="submit" value="Activado" class="btn btn-warning">
                                                            {{-- <a href="#" id="delete" class="btn btn-danger"><i
                                                                class="nav-icon fas fa-trash"></i></a> --}}
                                                        </form>
                                                    @endif

                                                    <a href="{{ route('editarslider', $slider->id) }}"
                                                        class="btn btn-primary">
                                                        {{-- <i class="nav-icon fas fa-edit"></i> --}}
                                                        Editar</a>
                                                    <form action="{{ route('borrarslider', $slider->id) }}" method="POST">
                                                        @csrf @method('DELETE')
                                                        <input type="submit" value="Borrar" class="btn btn-danger">
                                                        {{-- <a href="#" id="delete" class="btn btn-danger"><i
                                                            class="nav-icon fas fa-trash"></i></a> --}}
                                                    </form>
                                                </td>
                                            </tr>
                                            <input type="hidden" {{ $incrementar++ }}>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Num.</th>
                                            <th>Imagen</th>
                                            <th>Descripción 1 </th>
                                            <th>Descripción 2 </th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
