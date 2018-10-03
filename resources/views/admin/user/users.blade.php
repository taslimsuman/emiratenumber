@extends('layout.master')

@section('content')
@include('layout.message')
<div class="panel panel-default">
    <div class="panel-heading">
        <h3>Members</h3>
    </div>
     <div class="panel-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Instragram</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->contact}}</td>
                    <td>{{$user->instagram}}</td>
                    <td>{{$user->status==1?'Active':'Inactive'}}</td>
                    <td>
                        <a href="{{url('member/delete')}}/{{$user->id}}" class="btn btn-danger btn-sm" onclick=" return confirm('Are you sure want to delete the user?');">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    {{$users->links()}}
    </div>
</div>
<!-- endpanel -->
@endsection