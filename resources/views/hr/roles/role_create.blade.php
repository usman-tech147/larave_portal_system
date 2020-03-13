@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <form method="post" action="{{route('role.store')}}" role="form">
                        <!-- Default box -->
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Role</h3>
                            </div>

                            <div class="card-body">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="title">Role Title</label>
                                            <input type="text" class="form-control" id="name"
                                                   name="name" placeholder="Role Title">
                                        </div>
                                        {{--<div class="form-group">--}}
                                            {{--<label for="title">Assign Permissions</label>--}}
                                            {{--<div class="row">--}}
                                                {{--<div class="col-lg-4 col-md-4 col-sm-4">--}}
                                                    {{--<label>User Permits</label>--}}
                                                    {{--@foreach ($user_permits as $permit)--}}
                                                        {{--<div class="checkbox">--}}
                                                            {{--<span><input type="checkbox" name="permissions[]" value="{{$permit->id}}"> {{$permit->name}} </span>--}}
                                                        {{--</div>--}}
                                                    {{--@endforeach--}}
                                                {{--</div>--}}
                                                {{--<div class="col-lg-4 col-md-4 col-sm-4">--}}
                                                    {{--<label>Post Permits</label>--}}
                                                    {{--@foreach ($post_permits as $permit)--}}
                                                        {{--<div class="checkbox">--}}
                                                            {{--<span><input type="checkbox" name="permissions[]" value="{{$permit->id}}"> {{$permit->name}} </span>--}}
                                                        {{--</div>--}}
                                                    {{--@endforeach--}}
                                                {{--</div>--}}
                                                {{--<div class="col-lg-4 col-md-4 col-sm-4">--}}
                                                    {{--<label>Other Permits</label>--}}
                                                    {{--@foreach ($other_permits as $permit)--}}
                                                        {{--<div class="checkbox">--}}
                                                            {{--<span><input type="checkbox" name="permissions[]" value="{{$permit->id}}"> {{$permit->name}} </span>--}}
                                                        {{--</div>--}}
                                                    {{--@endforeach--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                    </div>
                                    <!-- /.card-body -->

                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{route('role.index')}}" class="btn btn-warning"> Back </a>
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