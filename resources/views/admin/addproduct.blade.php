@extends('admin_layout.master')
@section('title', 'Añadir Productos')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Producto</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active">Producto</li>
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
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Añadir Producto</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" action="{{ route('guardarproducto') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nombre del Producto</label>
                                        <input type="text" name="producto_nombre" class="form-control"
                                            id="exampleInputEmail1" placeholder="Cerveza">
                                        @error('producto_nombre')
                                            <br>
                                            <small class="alert alert-danger"> {{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Precio del producto</label>
                                        <input type="number" name="producto_precio" class="form-control" step="0.01"
                                            id="exampleInputEmail1" placeholder="2.99" min="0.1">
                                        @error('producto_precio')
                                            <br>
                                            <small class="alert alert-danger"> {{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Categoría del producto</label>
                                        <select class="form-control select2" name="producto_categoria" style="width: 100%;">
                                            {{-- <option selected="selected">Fruit</option>  --}}
                                            @foreach ($categorias as $categoria)
                                                <option>{{ $categoria->categoria_nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="exampleInputFile">Imagen del Producto</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile"
                                                name="producto_imagen">
                                            <label class="custom-file-label" for="exampleInputFile">Escoger Imagen</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Subir</span>
                                        </div>
                                    </div>
                                    @error('producto_imagen')
                                        <br>
                                        <small class="alert alert-danger"> {{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <!-- <button type="submit" class="btn btn-success">Submit</button> -->
                                    <input type="submit" class="btn btn-success" value="Guardar">
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
