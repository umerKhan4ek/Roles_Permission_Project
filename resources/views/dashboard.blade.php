@extends('layouts.index')


@section('section')

<div class="card mt-4">
    <div class="card-header">
      Featured
    </div>
    <div class="card-body">
    
        <div class="row">
            <div class="col-md-12">
                @if($users->count() > 0)
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Role</th>
                        <th scope="col">Actions</th>
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
                               {{$role->name}} 
                             
                             @endforeach
                             
                          </td>
                        <td> <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary btn-sm">Change Role</a>  </td>
                          </tr>
                          @endforeach
                     
                    </tbody>
                  </table>
                  
                </tbody>
                  
            </table>
            @else 
          <p> No user data here.
          </p>
                <a href="{{route('user.create')}}" class="btn btn-success btn-sm">Create User</a> 
            @endif
        </div>
    </div>
  </div>
    

    
</div>

@endsection