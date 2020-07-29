<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('AdminLTE/img/Avatar/img.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Buscar...">
                <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
            </div>
        </form>
        <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="{{ route('Painel.Fornecedores.index') }}"><i class="fa fa-building" aria-hidden="true"></i> <span>Fornecedores</span></a></li>
        <li class="active"><a href="#"><i class="fa fa-list-alt" aria-hidden="true"></i> <span>Categorias</span></a></li>
        <li class="active"><a href="#"><i class="fa fa-cogs" aria-hidden="true"></i> <span>Items</span></a></li>
        <li class="active"><a href="{{ route('Painel.Usuarios.index') }}"><i class="fa fa-users" aria-hidden="true"></i> <span>Usuarios</span></a></li>
        <!-- treeeview
        <li class="treeview">
          <a href="#"><i class="fa fa-link active"></i> <span>Multilevel</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li>
          treeeview -->
      </ul>
      <!-- /.sidebar-menu -->

    </section>
</aside>
