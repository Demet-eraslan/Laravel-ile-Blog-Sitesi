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

            @if (\Session::has('delete'))
            <div class="alert alert-success">
              <p>{!! \Session::get('delete') !!}</p>
            </div>
            @endif

            @if (\Session::has('update'))
            <div class="alert alert-success">
              <p>{!! \Session::get('update') !!}</p>
            </div>
            @endif

            
          <h5 class="card-title mb-4 d-inline">Kategoriler</h5>
         <a  href="{{ route('categories.create')}}" class="btn btn-primary mb-4 text-center float-right">Kategori Oluştur</a>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Kategori Adı</th>
                <th scope="col">Güncelle</th>
                <th scope="col">Sil</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category )
                <tr>
                    <th scope="row">{{ $category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td><a  href="{{ route('categories.edit', $category->id)}}" class="btn btn-info text-white text-center ">Güncelle</a></td>
                    <td><a href="{{ route('categories.delete', $category->id)}}" class="btn btn-dark  text-center ">Sil</a></td>
                  </tr>
                @endforeach
              
              
            </tbody>
          </table> 
        </div>
      </div>
    </div>
  </div>
  @endsection
