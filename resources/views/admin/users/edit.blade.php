@extends('dashboard.layouts.default')
@section('pageTitle', 'Admin Users Controller')
@section('content')
<div class="container-fluid">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
      <div class="col-md-12">
        <!-- /.card -->

        <div class="card card-info">
          <div class="card-header">
              <div class="row">
                  <div class="col-md-3">
                    <h3 class="card-title"><ion-icon name="construct-outline"></ion-icon></ion-icon><ion-icon name="person-outline"></ion-icon>&nbsp;{{ __(' Edit User Roles') }} - Name : {{ $user->name }}</h3>
                  </div>
                  <div class="col-md-1"><i class=""></i></div>
              </div>
          </div>

          <div class="card-body">
            <form method="POST" id="event-form" action="{{ route('admin.users.update',[app()->getlocale(),$user->id]) }}">
                @csrf
                @method('put')
                    <div class="form-group">
                        <label for="name">User Name<i class="red">*</i>:</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email<i class="red">*</i>:</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ $user->email }}">
                    </div>

                    <!--Status Check Box-->
                    <div class="form-group clearfix">
                        <label>Roles<i class="red">*</i>:</label><br/>
                        @foreach($roles as $role)
                            <div class="form-check ">

                                <input type="checkbox" name="roles[]"  value="{{ $role->id }}"
                                    @if($user->roles->pluck('id')->contains($role->id))
                                        checked
                                    @endif
                                >  <!--roles[] :we can check multi roles for single user-->
                                <label>
                                    {{ $role->name }}
                                </label>
                            </div>

                        @endforeach
                    </div>
                    <!--/Status Check Box-->
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
          </div>


          <!-- /.card-body -->

        </div>
        <!-- /.card -->
      </div>
      <!-- /.col (left) -->
      <div class="col-md-6">

      </div>
      <!-- /.col (right) -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->

@stop
