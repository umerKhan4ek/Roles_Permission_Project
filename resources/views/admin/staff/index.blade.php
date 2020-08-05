@extends('admin.index')


@section('content')
    
    <div>

        <p>Developer   Name <span><b> {{$users->name}} </b> </span>  </p>

        @foreach ($roles as $role)
        
        <form  method="POST" action="{{route('storepermissionsStaff')}}">
            @csrf
            
            <input type="hidden" name="role_id" value="{{$role->id}}">
            <label for="exampleFormControlSelect2">Select Permission you want to assign</label>
            
            <select  style="width: 200px;" name="permission"     class="form-control" id="exampleFormControlSelect2">
             
                @foreach ($permissions as $permission)
                    
                <option value="{{$permission->id}}">{{$permission->name}}</option>
                @endforeach

             
              
       
              
            </select>
                <input type="submit" value="Give Permission" class="btn btn-primary btn-sm mt-2">
            </form>
                
                   

                @endforeach

          

    </div>

@endsection