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
                        <h3 class="card-title"><ion-icon  name="people-outline"></ion-icon>&nbsp;{{ __('Users') }}</h3>
                    </div>
              </div>
          </div>

          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Roles</th>
                  <th class=" col-1"><center>Action</center></th>

                </tr>
              </thead>
              <tbody>
                  @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ implode(',',$user->roles()->get()->pluck('name')->toArray()) }}</td> <!-- creating the right format to post the roles  -->
                        <td class="project-actions text-right">
                            @can('edit-users')
                                <a class="btn btn-info btn-sm" href="{{ route('admin.users.edit',[app()->getlocale(), $user->id])}}" style="width: 150px">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                            @endcan
                            @can('delete-users')
                                <form action="{{ route('admin.users.destroy',[app()->getlocale(), $user]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" href="#"style="width: 150px">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
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
