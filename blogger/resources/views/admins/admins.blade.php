@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          @if (\Session::has('success'))
            <div class="alert alert-success">
              <p>{!! \Session::get('success') !!}</p>
            </div>
            @endif
          <h5 class="card-title mb-4 d-inline">Admin</h5>
         <a  href="{{ route('admins.create')}}" class="btn btn-primary mb-4 text-center float-right">Admin Oluştur</a>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">İsim</th>
                <th scope="col">Email</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($admins as $admin )
              <tr>
                <th scope="row">{{$admin->id}}</th>
                <td>{{ $admin->name}}</td>
                <td>{{ $admin->email}}</td>
               
              </tr>
              @endforeach
              
              
            </tbody>
          </table> 
        </div>
      </div>
    </div>
  </div>
 @endsection