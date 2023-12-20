<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- importing our files-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">


	<link rel="stylesheet" href="{{ asset('assets/fonts/icomoon/style.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/fonts/flaticon/font/flaticon.css')}}">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>


	<link rel="stylesheet" href="{{ asset ('assets/css/tiny-slider.css')}}">
	<link rel="stylesheet" href="{{ asset ('assets/css/aos.css')}}">
	<link rel="stylesheet" href="{{ asset ('assets/css/glightbox.min.css')}}">
	<link rel="stylesheet" href="{{ asset ('assets/css/style.css')}}">

	<link rel="stylesheet" href="{{ asset ('assets/css/flatpickr.min.css')}}">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
    <nav class="site-nav">
		<div class="container">
			<div class="menu-bg-wrap">
				<div class="site-navigation">
					<div class="row g-0 align-items-center">
						<div class="col-2">
							<a href="{{ url('/')}}" class="logo m-0 float-start">Blogger<span class="text-primary">.</span></a>
						</div>
                        {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button> --}}

						<div class="col-8 text-center">
							<form action="#" class="search-form d-inline-block d-lg-none">
								<input type="text" class="form-control" placeholder="Search...">
								<span class="bi-search"></span>
							</form>

							<ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
								<li class="active"><a href="{{ route('home')}}">Ansayfa</a></li>
								
								<li><a href="{{ route('category.single', 'Culture' )}}">Kültür</a></li>
								<li><a href="{{ route('category.single', 'Business')}}">İş Dünyası</a></li>
								<li><a href="{{ route('category.single', 'Politics')}}">Genel</a></li>
								@auth
									
								<li><a href="{{ route('posts.create')}}">Gönderi Oluştur</a></li>
								@endauth
								<li><a href="{{ route('contact')}}">İletişim</a></li>
								<li><a href="{{ route('about')}}">Hakkımızda</a></li>
                                @guest
                                    @if (Route::has('login'))
								<li><a href="{{ route('login') }}">Giriş</a></li>
                                    @endif
                                    @if (Route::has('register'))
								<li><a href="{{ route('register') }}">Kayıt</a></li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                            {{ Auth::user()->name }}
                                        </a>

										
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('users.profile', Auth::user()->id)}}">
                                               Profil
                                            </a>
											<a class="dropdown-item" href="{{ route('users.edit', Auth::user()->id)}}">
												Profili Güncelle
											 </a>
											<a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
        
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest

							</ul>
							
						</div>
						<div class="col-2 text-end">
							<a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
								<span></span>
							</a>
							<form action="{{ route('posts.search')}}" method="POST" class="search-form d-none d-lg-inline-block">
								@csrf
								<input name="search" type="text" class="form-control" placeholder="Search...">
								<span class="bi-search"></span>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <footer class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="widget">
						<h3 class="mb-4">About</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div> <!-- /.widget -->
					<div class="widget">
						<h3>Social</h3>
						<ul class="list-unstyled social">
							<li><a href="#"><span class="icon-instagram"></span></a></li>
							<li><a href="#"><span class="icon-twitter"></span></a></li>
							<li><a href="#"><span class="icon-facebook"></span></a></li>
							<li><a href="#"><span class="icon-linkedin"></span></a></li>
							<li><a href="#"><span class="icon-pinterest"></span></a></li>
							<li><a href="#"><span class="icon-dribbble"></span></a></li>
						</ul>
					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
				<div class="col-lg-4 ps-lg-5">
					
				</div> <!-- /.col-lg-4 -->
	
			</div> <!-- /.row -->

			<div class="row mt-5">
				<div class="col-12 text-center">
          <!-- 
              **==========
              NOTE: 
              Please don't remove this copyright link unless you buy the license here https://untree.co/license/  
              **==========
            -->

            
          </div>
        </div>
      </div> <!-- /.container -->
    </footer> <!-- /.site-footer -->

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
    	<div class="spinner-border text-primary" role="status">
    		<span class="visually-hidden">Loading...</span>
    	</div>
    </div>



    <script src="{{ asset ('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset ('assets/js/tiny-slider.js')}}"></script>

    <script src="{{ asset ('assets/js/flatpickr.min.js')}}"></script>


    <script src="{{ asset('assets/js/aos.js')}}"></script>
    <script src="{{ asset('assets/js/glightbox.min.js')}}"></script>
    <script src="{{ asset('assets/js/navbar.js')}}"></script>
    <script src="{{ asset('assets/js/counter.js')}}"></script>
    <script src="{{ asset('assets/js/custom.js')}}"></script>

</body>
</html>
