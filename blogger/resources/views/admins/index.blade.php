@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Gönderiler</h5>
          <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
          <p class="card-text">Gönderi Sayısı: {{ $postCount}}</p>
         
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Kategoriler</h5>
          
          <p class="card-text">Kategori Sayısı: {{ $categoriesCount}}</p>
          
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Admin</h5>
          
          <p class="card-text">Admin sayısı: {{ $adminsCount}}</p>
          
        </div>
      </div>
    </div>
  </div>
  @endsection