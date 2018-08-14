@include('admin.layouts.header')
<div class="wrapper">

  @include('admin.layouts.menu')
  <!-- Left side column. contains the logo and sidebar -->
  @include('admin.layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('title')
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">@yield('title')</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		@yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

@include('admin.layouts.footer')