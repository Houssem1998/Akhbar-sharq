
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <h1><ion-icon name="person-circle-outline" class="img-circle elevation-2" alt="User Image" style="color: silver"></ion-icon></h1>
            <!--<img src="" class="img-circle elevation-2" alt="User Image">-->
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            <br />
            <a class="" href="{{ route('logout' ,app()->getlocale()) }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 <ion-icon name="share-outline"></ion-icon>{{ __('Logout') }}
             </a><br />
             @can('manage-users')
                <a class="" href="{{ route('admin.users.index',app()->getlocale()) }}"><ion-icon name="people-outline"></ion-icon> Users Management</a>
            @endcan
            <form id="logout-form" action="{{ route('logout',app()->getlocale()) }}" method="POST" class="d-none">
                @csrf
            </form>


          </div>
    </div>

    <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
                @can('posts-management')
                    <li class="nav-item has-treeview">
                        <a href="{{ route('post.index',app()->getlocale()) }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            Posts Editor
                        </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="{{ route('category.create',app()->getlocale()) }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            Category
                        </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="{{ route('field.create',app()->getlocale()) }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            Sections Controller
                        </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="{{ route('notification.create',app()->getlocale()) }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            Notification Controller
                        </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="{{ route('write.index',app()->getlocale()) }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            "Write With Us" Controller
                        </p>
                        </a>
                    </li>
                @endcan
            </ul>
        </nav>
    <!-- /.sidebar-menu -->
  </div>
