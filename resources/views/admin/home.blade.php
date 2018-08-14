@extends('admin.app')
@section('title')
Dashboard
@endsection
@section('content')

      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $items }}</h3>

              <p>All Items</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('items.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $categories }}</h3>

              <p>Categories</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('categories.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $users }}</h3>

              <p>Total Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('users.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          
           <!-- Latest Users -->
            <div class="box box-info latest-users">
              <div class="box-header">
                <i class="fa fa-users"></i>
                <h3 class="box-title">Latest 5 Registerd Users</h3>   
              </div>
              <div class="box-body">
               @foreach($latestUsers as $user)
                <div class="user">
                  <img class="user-photo-admin" src="{{ !empty(App\User::find($user->id)->photo)?Storage::url(App\User::find($user->id)->photo):Storage::url('users/photo.jpeg')  }}" alt="user image"> 
                  <p><a href="{{ route('users.edit',$user->id) }}">{{ $user->name }}</a></p> <br>
                  <span>{{ date('d, M g:i A', strtotime($user->created_at)) }}</span>
                </div>
               @endforeach
             </div>
            </div>

           
           <!-- End Latest Users -->
        
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          <div class="box box-info latest-items">
              <div class="box-header">
                 <i class="fa fa-users"></i>
                <h3 class="box-title">Latest 5 Added Items</h3> 
              </div>
               <div class="box-body">
               @foreach($latestItems as $item)
                <div class="item">
                  <img class="user-photo-admin" src="{{ Storage::url(App\Item::find($item->id)->photo) }}" alt="user image"> 
                  <p><a href="{{ route('items.edit',$item->id) }}">{{ $item->name }}</a></p> <br>
                  <span>{{ date('d, M g:i A', strtotime($item->created_at)) }}</span>
                </div>
               @endforeach
             </div>
            </div>
         
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
@endsection

   