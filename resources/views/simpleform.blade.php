@extends('layouts.index')

@section('section')
    <div class="row mt-4">
        <div class="col-6  m-auto">
        <form method="POST" action="{{ route('user.store') }}">
            @csrf
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="name" name="name" class="form-control" id="name" aria-describedby="name" placeholder="Enter Name">
                 
                </div>
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <label for="Password">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
               

                <div class="form-group">
                    <label for="">Select Your Role</label>
                    <select class="form-control" id="role" name="role">
                      @foreach ($roles as $role)
                            
                            <option  value="{{$role->id}}">{{$role->name}}</option>
                      
                            
                            @endforeach
                    </select>
                  </div>


                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
@endsection