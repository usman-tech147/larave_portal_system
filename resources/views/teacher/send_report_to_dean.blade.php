@extends('layouts.master')
@section('message')
    <span id="message"></span>
@endsection
@section('heading')
    Employee Final Report
@endsection
@section('content')
    <div class="content">
        <section>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h4><strong>Name:</strong></h4>
                            <h5> {{$user->first_name}} {{$user->last_name}} </h5>
                            <h4><strong>Email:</strong></h4>
                            <h5> {{$user->email}} </h5>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <h4><strong>Designation:</strong></h4>
                            <h5> {{$user->designation}} </h5>
                            <h4><strong>School:</strong></h4>
                            <h5> {{$user->school->name}} </h5>
                        </div>
                    </div>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark text-center">
                        <tr>
                            <th colspan="8"> <h3>Course Level</h3></th>
                        </tr>
                        </thead>
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Course Level</th>
                            <th scope="col">Program</th>
                            <th scope="col">Course Title</th>
                            <th scope="col">Course Code</th>
                            <th scope="col">Semester</th>
                            <th scope="col">No of Assessments</th>
                            <th scope="col">Make up Classes</th>
                            <th scope="col">Student Feedback</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($course_details as $c_detail)
                            <tr>
                                <td>{{$c_detail->course_level}}</td>
                                <td>{{$c_detail->program}}</td>
                                <td>{{$c_detail->course_title}}</td>
                                <td>{{$c_detail->course_code}}</td>
                                <td>{{$c_detail->semester}}</td>
                                <td>{{$c_detail->assessments}}</td>
                                <td>{{$c_detail->makeup_classes}}</td>
                                <td>{{$c_detail->student_feedback}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <table class="table">
                        <thead class="thead-dark text-center">
                        <tr>
                            <th colspan="8"><h3>Course Assessments</h3></th>
                        </tr>
                        </thead>
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Course Level</th>
                            <th scope="col">Program</th>
                            <th scope="col">Course Title</th>
                            <th scope="col">Course Code</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Final Result</th>
                            <th scope="col">Moodle Usage</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($course_assessments as $c_assessment)
                            <tr>
                                <td>{{$c_assessment->course_level}}</td>
                                <td>{{$c_assessment->program}}</td>
                                <td>{{$c_assessment->course_title}}</td>
                                <td>{{$c_assessment->course_code}}</td>
                                <td>{{$c_assessment->semester}}</td>
                                <td>{{$c_assessment->final_result_submission}}</td>
                                <td>{{$c_assessment->moodle_usage_status}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <form action="{{route('submit.report')}}" method="post">
                    @csrf
                    <div class="card-footer">
                        <button class="btn btn-primary float-right"> Submit Report </button>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script>
    </script>
@endsection