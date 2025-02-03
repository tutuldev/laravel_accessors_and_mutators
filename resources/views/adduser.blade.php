
@extends('layout')
@section('title')
Add new User
@endsection

@section('content')
            <form action="{{route('user.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">User Name</label>
                    <input type="text" class="form-control" name="username">
                </div>
                <div class="mb-3">
                    <label for="useremail" class="form-label">User Email</label>
                    <input type="email" class="form-control" name="useremail">
                </div>
                <div class="mb-3">
                    <label for="usersalary" class="form-label">User Salary</label>
                    <input type="number" class="form-control" name="usersalary">
                </div>
                <div class="mb-3">
                    <label for="userdob" class="form-label">User Dob</label>
                    <input type="date" class="form-control" name="userdob">
                </div>
                <div class="mb-3">
                    <label for="userpass" class="form-label">User Password</label>
                    <input type="password" class="form-control" name="userpass">
                </div>
                <div class="mb-3">
                    <input type="submit" value="Save" class="btn btn-success">
                </div>
            </form>
@endsection
