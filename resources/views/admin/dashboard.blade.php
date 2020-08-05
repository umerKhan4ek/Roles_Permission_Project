@extends('admin.index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        
      </div>
      <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
        <span data-feather="calendar"></span>
        This week
      </button>
    </div>
  </div>
<div class="row">
    <div class="col-6 m-auto">
        
        <div class="jumbotron jumbotron-fluid text-center">
            <div class="container">
              <h1 class="display-4">Welcome</h1>
              <p class="lead">This is Admin Panel.</p>
            </div>
          </div>
    </div>


</div>
@endsection