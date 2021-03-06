<?php 
//mengambil ip pengunjung
$ambil_ip_pengunjung = $_SERVER['REMOTE_ADDR'];
$tanggal = date('d');
$bulan = date('M');
$tahun = date('Y');

//cek unique ip
$ip_check = DB::table('pengunjung')->select('ip_address')->where('ip_address', '=', $ambil_ip_pengunjung)->where('tanggal', '=', $tanggal)->where('bulan', '=', $bulan)->where('tahun' ,'=', $tahun)->count();
if($ip_check<1){
	DB::table('pengunjung')->insert(
		[
			'ip_address' 	=> $ambil_ip_pengunjung, 
			'tanggal' 		=> $tanggal,
			'bulan'			=> $bulan,
			'tahun'			=> $tahun
		]
	);
}

//menampilkan pengunjung
$pengunjungperhari = DB::table('pengunjung')->select('tanggal')->where('tanggal', '=', $tanggal)->where('bulan', '=', $bulan)->where('tahun' ,'=', $tahun)->count();
$pengunjungperbulan = DB::table('pengunjung')->select('bulan')->where('bulan', '=', $bulan)->where('tahun', '=', $tahun)->count();
$pengunjungtotal = DB::table('pengunjung')->count();
?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="{{URL::asset('extdinkes/img/favicon.jpeg')}}" type="image/jpeg">
	<title>Mingges Tour & Travel</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{URL::asset('extdinkes/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{URL::asset('extdinkes/vendors/linericon/style.css')}}">
	<link rel="stylesheet" href="{{URL::asset('extdinkes/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{URL::asset('extdinkes/vendors/owl-carousel/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{URL::asset('extdinkes/vendors/lightbox/simpleLightbox.css')}}">
	<link rel="stylesheet" href="{{URL::asset('extdinkes/vendors/nice-select/css/nice-select.css')}}">
	<link rel="stylesheet" href="{{URL::asset('extdinkes/vendors/animate-css/animate.css')}}">
	<link rel="stylesheet" href="{{URL::asset('extdinkes/vendors/jquery-ui/jquery-ui.css')}}">
	<!-- main css -->
	<link rel="stylesheet" href="{{URL::asset('extdinkes/css/style.css')}}">
	<link rel="stylesheet" href="{{URL::asset('extdinkes/css/responsive.css')}}">
	@yield('css')
</head>

<div >
	<!--================Header Menu Area =================-->
	<header class="header_area">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="{{url('/')}}">
						<img width="85%" height="100%" src="{{URL::asset('extdinkes/img/logo.png')}}" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					 aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<div class="row ml-0 w-100">
							<div class="col-lg-12 pr-0">
								<ul class="nav navbar-nav center_nav pull-right">
									<li class="nav-item @yield('classnavitemberanda')">
										<a class="nav-link overflow-auto" href="{{url('/')}}">Beranda</a>
									</li>
									<li class="nav-item submenu dropdown @yield('classnavitemprofil')">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profil</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												<a class="nav-link" href="{{url('/sejarah')}}">Sejarah</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="{{url('/visidanmisi')}}">Visi dan Misi</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="{{url('/strukturorganisasi')}}">Struktur Organisasi</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="{{url('/kompetensisdm')}}">Kompetensi SDM</a>
											</li>
										</ul>
									</li>
									<li class="nav-item submenu dropdown @yield('classnavitemlayanan')">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Layanan </a>
										<?php
											$jenispelayanan = DB::table('jenis_pelayanan')->get();
										?>
										<ul class="dropdown-menu">
											@foreach($jenispelayanan as $jenispelayanan)
												<li class="nav-item">
													<a class="nav-link" href="{{('/layanan')}}/{{$jenispelayanan->id_pelayanan}}">{{$jenispelayanan->nama}}</a>
												</li>
											@endforeach
										</ul>
									</li>
									
									<li class="nav-item @yield('classnavitemtarif')">
										<a class="nav-link" href="{{url('/tarif')}}">Tarif</a>
									</li>

									<li class="nav-item submenu dropdown @yield('classnavitemkepustakaan')">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kepustakaan</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												<a class="nav-link" href="{{('/perpustakaan')}}">Perpustakaan</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="{{('/galeri')}}">Galery</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="{{('/download')}}">Download</a>
											</li>
										</ul>
									</li>

									<li class="nav-item submenu dropdown @yield('classnavitemberita')">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Berita</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												<a class="nav-link" href="{{url('/berita')}}">Berita</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="{{url('/artikel')}}">Artikel</a>
											</li>
										</ul>
									</li>


									<li class="nav-item @yield('classnavitemlayananaduan')">
										<a class="nav-link" href="{{url('/layananaduan')}}">Layanan Aduan</a>
									</li>
									<li class="nav-item @yield('classnavitemkontak')">
										<a class="nav-link" href="{{url('/kontak')}}">Kontak</a>
									</li>
									<!--<li class="nav-item">
										<a class="main_btn" href="#">Log in</a>
									</li>-->
								</ul>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!--================Header Menu Area =================-->

    @yield('content')

	<!--================ Start Footer Area  =================-->

	
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-5  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6 class="footer_title">KONTAK KAMI</h6>
						<p>
						<!--Masukkan alamat here-->	

						<p>
						</p>
					</div>
				</div>

				<div class="col-lg-5  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6 class="footer_title">LINK</h6>
							<ul class="list-unstyled"> 
							<!--Masukkan link terafiliasi-->
							</ul> 
					</div>
				</div>

				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6 class="footer_title">KUNJUNGAN</h6>
						<p>Kunjungan Hari ini : {{$pengunjungperhari}} </p>
						<p>Kunjungan Bulan ini : {{$pengunjungperbulan}}</p>
						<p>Total kunjungan : {{$pengunjungtotal}}</p>
						
					</div>
				</div>
				<div class="col-lg-5 col-md-6 col-sm-6">

					<div class="single-footer-widget f_social_wd">
						<h6 class="footer_title">FOLLOW KAMI</h6>
						<p>Let us be social</p>
						<div class="f_social">
							<a href="#">
								<i class="fa fa-facebook"></i>
							</a>
							<a href="#">
								<i class="fa fa-twitter"></i>
							</a>
							<a href="#">
								<i class="fa fa-dribbble"></i>
							</a>
							<a href="#">
								<i class="fa fa-behance"></i>
							</a>
						</div>
					</div>
				</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="single-footer-widget f_social_wd">
						<!--<h6 class="footer_title">NEWSLETTER</h6>
						<div id="mc_embed_signup">
							<form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
							 method="get" class="subscribe_form relative">
								<div class="input-group d-flex flex-row">
									<input name="EMAIL" placeholder="Masukkan e-mail Anda " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '"
									 required="" type="email">
									<button class="btn sub-btn">
										<span class="lnr lnr-arrow-right"></span>
									</button>
								</div>
								<div class="mt-10 info"></div>
							</form>
						</div>-->
					</div>
				</div>
			</div>



		<div class="row">
				<div class="col-lg-12">
					<p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright (c) 2020. All rights reserved  by <a>Mingges Tour & Travel</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</p>
				</div>
			</div>
		</div>
	</footer>
	<!--================ End Footer Area  =================-->



	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="{{URL::asset('extdinkes/js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{URL::asset('extdinkes/js/popper.js')}}"></script>
	<script src="{{URL::asset('extdinkes/js/bootstrap.min.js')}}"></script>
	<!-- <script src="vendors/lightbox/simpleLightbox.min.js"></script> -->
	<script src="{{URL::asset('extdinkes/vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
	<!-- <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script> -->
	<script src="{{URL::asset('extdinkes/vendors/isotope/isotope-min.js')}}"></script>
	<script src="{{URL::asset('extdinkes/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
	<script src="{{URL::asset('extdinkes/js/jquery.ajaxchimp.min.js')}}"></script>
	<!-- <script src="vendors/counter-up/jquery.waypoints.min.js"></script> -->
	<!-- <script src="vendors/flipclock/timer.js"></script> -->
	<!-- <script src="vendors/counter-up/jquery.counterup.js"></script> -->
	<script src="{{URL::asset('extdinkes/js/mail-script.js')}}"></script>
	<script src="{{URL::asset('extdinkes/js/custom.js')}}"></script>

	</div>

	@yield('js')
</body class="background">


</html>