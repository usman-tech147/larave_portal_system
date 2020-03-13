@extends('layouts.master')

@section('content')
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <form method="post" action="{{route('permission.store')}}" role="form">
                        <!-- Default box -->
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Permission</h3>
                            </div>

                            <div class="card-body">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="title">Permission Title</label>
                                            <input type="text" class="form-control" id="name"
                                                   name="name" placeholder="Permission Title">
                                        </div>
                                        <div class="form-group">
                                            <label for="Type"> Permission Type </label>
                                            <select name="type" id="type" class="form-control">
                                                <option selected disabled> Select Option </option>
                                                <option value="user"> User </option>
                                                <option value="post"> Post </option>
                                                <option value="others"> Others </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </div>
                        <!-- /.card -->
                    </form>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    @if(count($errors) > 0)
                        <div class="card">
                            <div class="card-header bg-danger">
                                <strong> Errors! </strong>
                            </div>
                            <div class="card-body text-danger">
                                @foreach($errors->all() as $error)
                                    <p> {{$error}} </p>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection
@section('js')
@endsection