@extends('layout')
@section('title')
User Details
@endsection

@section('content')
            <table class="table table-bordered table-striped">
                <tr>
                    <th width="80px">Name:</th>
                    <td>{{$users->name}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$users->email}}</td>

                </tr>
                <tr>
                    <th>Salary</th>
                    <td>{{$users->salary}}</td>

                </tr>
                <tr>
                    <th>Dob</th>
                    <td>{{$users->dob}}</td>

                </tr>
                <tr>
                    <th>Password</th>
                    <td>{{$users->password}}</td>

                </tr>
            </table>
            <a href="{{route('user.index')}}" class="btn btn-danger">Back</a>
@endsection
