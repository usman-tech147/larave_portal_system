@extends('layouts.master')
@section('message')
    <span id="message"></span>
@endsection
@section('heading')
    Manage Department
@endsection
@section('content')
    @include('hr.manage_program.Department.department_modals.create_and_edit_modal')
    <div class="content">
        <section>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title float-left">Department Record</h3>
                    <button class="btn btn-primary float-right" onclick="departmentForm()"><i class="fas fa-plus"></i>
                        Department
                    </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="">
                        <table id="department_tbl" class="table table-bordered table-striped table-responsive-md">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Department Name</th>
                                <th>School Name</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
        </section>
    </div>
    @include('hr.manage_program.Department.department_modals.delete_modal')
@endsection

@section('js')
    <script>
        /**
         * GET REQUEST FOR DEPARTMENT
         * **/
        $('#department_tbl').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            autoWidth: false,
            columnDefs: [
                {
                    targets: '_all',
                    className: 'text-center',
                }
            ],
            ajax: {
                url: '{{ route('all.departments') }}',
            },
            columns: [
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'school',
                    name: 'school'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        /**
         * DEPARTMENT FORM MODAL POP UP
         * **/
        function departmentForm() {
            $('#modal-title').text('Add Department');
            $('#department_modal').modal('show');
            $('#department_modal form')[0].reset();
            $('#department_modal form').find('.invalid-feedback').remove();
            $('#department_modal form').find('.form-control').removeClass('is-invalid');
            $('.action').attr('id', 'store');
            $('.action').text('Save Record');
            getSchool();
        }

        /**
         * GET ALL SCHOOLS
         * **/
        function getSchool() {
            $.ajax({
                url: '{{ route('get.departments.schools') }}',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    html = '<select name="school_id" id="school_id" class="form-control">\n' +
                        '                                <option value="default">Select School</option>\n' +
                        '                                ' + data.data + ' \n' +
                        '                            </select>';
                    $('#school_id').html(html);
                },
                error: function (jqxhr, status, exception) {
                    alert('Exception:', exception);
                }
            });
        }

        /**
         * POST and PATCH REQUEST FOR DEPARTMENT
         * **/
        $('#department_form').submit(function (e) {
            if ($('.action').attr('id') == 'store') {
                data = new FormData(this);
                $.ajax({
                    url: '{{route('department.store')}}',
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    datatype: 'json',
                    success: function (data) {
                        $('#department_modal form').find('.invalid-feedback').remove();
                        $('#department_modal form').find('.form-control').removeClass('is-invalid');
                        if (data.errors) {
                            $.each(data.errors, function (key, value) {
                                $('#' + key)
                                    .addClass('is-invalid')
                                    .after('<div class="invalid-feedback text-"><strong>'
                                        + value +
                                        '</strong></div>');
                            });
                        }
                        if (data.success) {
                            $('#department_form')[0].reset();
                            $('#department_modal').modal('hide');
                            html = '<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>' + data.success + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                            $('#message').html(html);
                            $('#department_tbl').DataTable().ajax.reload();
                        }
                    },
                    error: function (jqxhr, status, exception) {
                        alert('Exception:', jqxhr);
                    }
                });
            }
            if ($('.action').attr('id') == 'updation') {
                var c_id = $('#hidden_id').val();
                var url = '{{route('department.update',":c_id")}}';
                url = url.replace(':c_id', c_id);
                var formdata = new FormData(this);
                formdata.set('_method', 'PATCH');
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formdata,
                    contentType: false,
                    cache: false,
                    processData: false,
                    datatype: 'json',
                    success: function (data) {
                        $('#department_modal form').find('.invalid-feedback').remove();
                        $('#department_modal form').find('.form-control').removeClass('is-invalid');
                        if (data.errors) {
                            $.each(data.errors, function (key, value) {
                                $('#' + key)
                                    .addClass('is-invalid')
                                    .after('<div class="invalid-feedback text-"><strong>'
                                        + value +
                                        '</strong></div>');
                            });
                        }
                        if (data.success) {
                            $('#department_form')[0].reset();
                            $('#department_modal').modal('hide');
                            html = '<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>' + data.success + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                            $('#message').html(html);
                            $('#department_tbl').DataTable().ajax.reload();
                        }
                    },
                    error: function (jqxhr, status, exception) {
                        alert('Exception:', exception);
                    }
                });
            }
            e.preventDefault();
        });

        /**
         * GET REQUEST FOR EDIT COURSE DETAIL RECORD
         * **/
        function editDepartment(id) {
            $('#department_form')[0].reset();
            $('#department_modal form').find('.invalid-feedback').remove();
            $('#department_modal form').find('.form-control').removeClass('is-invalid');
            var c_id = id;
            var url = '{{route('department.edit',":c_id")}}';
            url = url.replace(':c_id', c_id);
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function (data) {

                    $('#modal-title').text('Edit School');
                    $('#department_modal').modal('show');
                    $('.action').attr('id', 'updation');
                    $('.action').text('Update Record');
                    $('#school_id').html(data.template);
                    $('#name').val(data.data.name);
                    $('#hidden_id').val(data.data.id);
                },
                error: function (jqxhr, status, exception) {
                    alert('Exception:', exception);
                }
            });
        }


        /**
         * DELETE COURSE DETAIL MODAL POP UP
         * **/
        function deleteDepartment(id) {
            $('#confirmModel').modal('show');
            $('#del').val(id);
            // $('.modal-title').text('CONFIRMATION');
        }

        /**
         * DELETE REQUEST FOR COURSE DETAIL
         * **/
        function deleteData() {
            var id = $('#del').val();
            var token = $("meta[name='csrf-token']").attr("content");

            var c_id = id;
            var url = '{{route('department.destroy',":c_id")}}';
            url = url.replace(':c_id', c_id);
            $.ajax(
                {
                    url: url,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function (data) {
                        $('#confirmModel').modal('hide');
                        html = '<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>' + data.success + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                        $('#message').html(html);
                        $('#department_tbl').DataTable().ajax.reload();
                    }
                });
        }

    </script>
@endsection