@extends('layout')
@section('title')
All User Data
@endsection

@section('content')
<a href="{{route('user.create')}}" class="btn btn-success btn-sm mb-3">Add New</a>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Salary</th>
                    <th>Dob</th>
                    <th>Pass</th>
                    <th>Show</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
                @foreach ( $users as $user)
                <tr>
                    <td class="px-5">{{$user->id}}</td>
                    <td class="px-5">{{$user->user_name}}</td>
                    <td class="px-5">{{$user->email}}</td>
                    <td class="px-5">{{$user->salary}}</td>
                    <td class="px-5">{{$user->dob}}</td>
                    <td class="px-5">{{$user->password}}</td>
                    <td>  <a href="{{route('user.show',$user->id)}}" class="btn btn-primary btn-sm">View</a></td>
                    <td>
                        <form action="{{route('user.destroy',$user->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                    <td>  <a href="{{route('user.edit',$user->id)}}" class="btn btn-warning btn-sm">Update</a></td>
                  </tr>
                @endforeach
            </table>
            <div class="mt-4">
                {{$users->links()}}
            </div>
@endsection
