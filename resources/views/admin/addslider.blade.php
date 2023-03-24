@extends('admin_layout.master')
@section('title', 'Añadir Slider')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Slider</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active">Slider</li>
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
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Añadir Slider</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('guardarslider') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Descripción 1 del Slider </label>
                                        <input type="text" name="descripcion1" class="form-control"
                                            id="exampleInputEmail1" placeholder="Ingresa la descripción del slider">
                                            @error('descripcion1') <br>
                                            <small class="alert alert-danger"> {{ $message }}</small>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Descripción 2 del Slider </label>
                                        <input type="text" name="descripcion2" class="form-control"
                                            id="exampleInputEmail1" placeholder="Ingresa la descripción del slider">
                                            @error('descripcion2') <br>
                                            <small class="alert alert-danger"> {{ $message }}</small>
                                            @enderror
                                    </div>
                                    <label for="exampleInputFile">Imagen del Slider</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="imagen_slider"
                                                id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Selecionar Foto</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Subir</span>
                                        </div>
                                    </div>
                                    @error('imagen_slider') <br>
                                    <small class="alert alert-danger"> {{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <!-- <button type="submit" class="btn btn-warning">Submit</button> -->
                                    <input type="submit" class="btn btn-warning" value="Guardar">
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
