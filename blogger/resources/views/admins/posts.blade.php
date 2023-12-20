@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
            
            @if (\Session::has('delete'))
            <div class="alert alert-success">
              <p>{!! \Session::get('delete') !!}</p>
            </div>
            @endif

          <h5 class="card-title mb-4 d-inline">Gönderiler</h5>
        
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Başlık</th>
                <th scope="col">Kategori</th>
                <th scope="col">Kullanıcı</th>
                <th scope="col">Sil</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post )
                <tr>
                    <th scope="row">{{ $post->id}}</th>
                    <td>{{ substr($post->title, 0, 25)}}</td>
                    <td>{{ $post->category}}</td>
                    <td>{{$post->user_name}}</td>
                     <td><a href="{{ route('posts.delete', $post->id)}}" class="btn btn-dark  text-center ">Sil</a></td>
                  </tr>
                    
                @endforeach

              
            </tbody>
          </table> 
        </div>
      </div>
    </div>
  </div>
  @endsection