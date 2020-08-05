@extends('admin.index')

@section('content')

<div class="card">
    <div class="card-header">
        This panel shows Admin Users.
    </div>
    <div class="card-body">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Permissions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td> 
                    @foreach ($user->roles as $role)


                        {{$role->name }}
                        
                        @endforeach
                      </td>

                      <td>

                        @foreach ($user->roles as $role)
                        
                        <a href="{{route('permissions',$user->id)}}" class="btn btn-success">  show  </a>
                        
                        @endforeach
                        
                      </td>

                </tr>

                @endforeach

            </tbody>
        </table>

    </div>
</div>


@endsection
