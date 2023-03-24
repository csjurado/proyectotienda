@extends('admin_layout.master')
@section('title', 'Añadir Categoria')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Categoría</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active">Categoría</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Añadir Categoría</small></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @if (Session::has('status'))
                            <br>
                                <div class="alert alert-success"> {{ Session::get('status') }}</div>
                            @endif
                            <form action="{{ route('guardarcategoria') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nombre de la Categoría</label>
                                        <input type="text" name="categoria_nombre" class="form-control"
                                            id="exampleInputEmail1" placeholder="Snacks">
                                            @error('categoria_nombre')
                                            <br>
                                            <small class="alert alert-danger"> {{ $message }}</small>
                                            @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                    <input type="submit" class="btn btn-primary" value="Guardar">
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
