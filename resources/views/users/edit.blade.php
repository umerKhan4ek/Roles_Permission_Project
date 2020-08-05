@extends('layouts.index')

@section('section')
<div class="card">
    <div class="card-header">
        Hello: <b>
            {{$user->name}}

        </b>
    </div>
    <div class="card-body">
        <h5 class="card-title">Welcome to your Profile Details</h5>

        <form method="POST" class="" action="{{route('user.update', $user->id)}}">
            @csrf
            @method('PUT')
            <div class="form-row align-items-center">
                <div class="col-auto">
                    <label class="cnage" for="inlineFormInput">Change Role</label>

                </div>
                <div class="col-2">
                    <label class="sr-only" for="inlineFormInputGroup">Username</label>

                    <select id="inputState" class="form-control" name="role">
                        @foreach ($roles as $role)

                        <option value="{{$role->id}}">{{$role->name}}</option>

                        @endforeach


                    </select>

                </div>

                <div class="col-auto">

                    <button type="submit" class="btn btn-primary mb-2">Update</button>
                </div>
            </div>
        </form>


        <p class="card-text">Your Role is: </p>

            @foreach ($user->roles as $role)

            <form>
                <div class="form-row">
                    <div class="col-2 p-2">
                        <input type="text" class="form-control" disabled value="{{$role->name}}" placeholder="City">
                    </div>
                </div>
            </form>
         @endforeach
    
    

    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>


                    @foreach ($user->roles as $role)
                        
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$role->name}}</td>
                        <td>
                            
                            <form method="POST" action="{{route('user.destroy',$user->id)}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                        
                                <input type="hidden" name="role_id" value="{{$role->id}}" />
                                <div class="form-group">
                                    <input type="submit" class="btn btn-danger delete-user btn-sm" value="Delete role">
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    
                </tbody>
            </table>
        </div>
    </div>

    </div>

</div>
@endsection
