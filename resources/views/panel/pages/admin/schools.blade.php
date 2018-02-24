@extends('panel.layouts.main') @section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="m-t-0 header-title">
                            <b>Schools Table</b>
                        </h4>
                        <p class="text-muted font-13">
                            Bla Bla
                        </p>
                        <div class="table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Type</th>
                                            <!-- <th>Address</th> -->
                                            <th>City</th>
                                            <!-- <th>Phone</th> -->
                                            <!-- <th>Website</th> -->
                                            <!-- <th>Approved</th> -->
                                            <th>Reports</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(App\Models\School::all() as $school)
                                        <tr>
                                            <td>{{ $school->id }}</td>
                                            <td>{{ $school->admin->name }}</td>
                                            <td>{{ $school->admin->email }}</td>
                                            <td>{{ $school->type->name }}</td>
                                            <!-- <td>{{ $school->address }}</td> -->
                                            <td>{{ $school->city }}</td>
                                            <!-- <td>{{ $school->phone }}</td> -->
                                            <!-- <td>{{ $school->website }}</td> -->
                                            <!-- <td>{{ $school->approved }}</td> -->
                                            <td>{{ count($school->admin->report) }}</td>
                                            <td>{{ Carbon\Carbon::parse($school->created_at)->format('d-m-Y') }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection