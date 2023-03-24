@extends('admin_layout.master')
@section('title', ' Categorías')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Categorías</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active">Categorías</li>
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
                                <h3 class="card-title">Todas las Categorías</h3>
                            </div>
                            @if (Session::has('status'))
                                <br>
                                <div class="alert alert-success"> {{ Session::get('status') }}</div>
                            @endif
                            <!-- /.card-header -->
                            <input type="hidden" {{ $increment = 1 }}>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th># Número</th>
                                            <th>Nombre de la Categoría</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categorias as $categoria)
                                            <tr>
                                                <td>{{ $increment }}</td>
                                                <td>{{ $categoria->categoria_nombre }}</td>
                                                <td>
                                                    <a href="{{ route('editarcategoria', $categoria->id) }}" class="btn btn-primary">
                                                        {{-- <i class="nav-icon fas fa-edit"></i> --}}
                                                        Editar</a> 
                                                    {{-- <input type="submit" href="{{ route('editarcategoria', $categoria->id) }}" value="Editar" id="Editar" class="btn btn-primary"> --}}
                                                    {{-- <a href="#" id="delete" class="btn btn-danger"><i
                                                            class="nav-icon fas fa-trash"></i></a> --}}
                                                    <form
                                                        action="{{ route('borrarcategoria', $categoria->id) }}"
                                                        method="POST">
                                                        @csrf @method('DELETE')
                                                        <input type="submit" value="Borrar" id="delete"
                                                            class="btn btn-danger">
                                                        {{-- <a href="{{ route('borrarcategoria', $categoria->id) }}" id="delete" class="btn btn-danger"><i
                                                            class="nav-icon fas fa-trash"></i></a>  --}}
                                                    </form>
                                                </td>
                                            </tr>
                                            <input type="hidden" {{ $increment++ }}>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th># Número</th>
                                            <th>Nombre de la Categoría</th>
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
