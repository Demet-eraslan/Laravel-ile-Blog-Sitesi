@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Admin Oluştur</h5>
                    <form method="POST" action="{{ route('admins.store') }}">
                        <!-- Email input -->
                        @csrf
                        <div class="form-outline mb-4 mt-4">
                            <input type="email" name="email" id="form2Example1" class="form-control"
                                placeholder="email" />

                        </div>
                         @error('email')
                          <span class="text-danger" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror

                        <div class="form-outline mb-4">
                            <input type="text" name="name" id="form2Example1" class="form-control"
                                placeholder="İsim" />
                        </div>
                          @error('name')
                          <span class="text-danger" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        <div class="form-outline mb-4">
                            <input type="password" name="password" id="form2Example1" class="form-control"
                                placeholder="şifre" />
                        </div>
                          @error('password')
                              <span class="text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror







                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Oluştur</button>


                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
