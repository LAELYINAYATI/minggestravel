@extends('layout/main')

@section('css')
<link rel="stylesheet" href="{{URL::asset('extdinkes/css/slider.css')}}">
@endsection
@section('classnavitemberanda', 'active')
@section('content')

	<!--================ Home Banner Area =================-->
	
	<section class="home_banner_area">
	<div id="carouselExampleIndicators" class="carousel slide carousel-fade carousel-fullscreen" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
	  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	  <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>

	</ol>
    <div class="carousel-inner" role="listbox">
	  <!-- Slide One - Set the background image for this slide in the line below -->
	<div class="carousel-item active " style="background-image: url({{URL::asset('uploads/images/banner/1.jpg')}});">
	  <div class="img-overlay"></div>
        <div class="carousel-caption d-none d-md-block">
          <img class="img-fluid" src="{{URL::asset('extdinkes/img/banner/text-img.png')}}" alt="">
          <p class="lead">Kami siap melayani anda dengan sepenuh hati. Anda juga bisa melakukan pendaftaran tour secara online.</p>
              <a class="main_btn mr-10" href="#">Daftar Sekarang</a>
        </div>
	  </div>
	  <!-- Slide Two - Set the background image for this slide in the line below -->
	  <div class="carousel-item " style="background-image: url({{URL::asset('uploads/images/banner/2.jpg')}})">
	  <div class="img-overlay"></div>
        <div class="carousel-caption d-none d-md-block">
          <img class="img-fluid" src="{{URL::asset('extdinkes/img/banner/text-img.png')}}" alt="">
          <p class="lead">Kami siap melayani anda dengan sepenuh hati. Anda juga bisa melakukan pendaftaran tour secara online.</p>
              <a class="main_btn mr-10" href="#">Daftar Sekarang</a>
        </div>
	  </div>

      <!-- Slide Three - Set the background image for this slide in the line below -->
	  <div class="carousel-item" style="background-image: url({{URL::asset('uploads/images/banner/3.jpg')}})">
		<div class="img-overlay"></div>
        <div class="carousel-caption d-none d-md-block">
            <img class="img-fluid" src="{{URL::asset('extdinkes/img/banner/text-img.png')}}" alt="">
              <p class="lead">Kami siap melayani anda dengan sepenuh hati. Anda juga bisa melakukan pendaftaran tour secara online.</p>
              <a class="main_btn mr-10" href="#">Daftar Sekarang</a>
        </div>
	  </div>
	  
	<div class="carousel-item " style="background-image: url({{URL::asset('uploads/images/banner/4.jpg')}})">
			<div class="img-overlay"></div>
			<div class="carousel-caption d-none d-md-block">
			<img class="img-fluid" src="{{URL::asset('extdinkes/img/banner/text-img.png')}}" alt="">
			<p class="lead">Kami siap melayani anda dengan sepenuh hati. Anda juga bisa melakukan pendaftaran tour secara online.</p>
				<a class="main_btn mr-10" href="#">Daftar Sekarang</a>
			</div>
		</div>
		</div>
		
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
			</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
			</a>
	</div>
	</div>
		
	</div>
	</section> 
	<!--================ End Home Banner Area =================-->

	<!--================ Start important-points section =================-->
	<section class="donation_details pad_top">
		<div class="container">
			<h1><center>Layanan kami</center></h1>
			<div class="row">
				@foreach($jenispelayanan as $jenispelayanan)
					<div class="col-lg-4 col-md-6 single_donation_box">
						<a href="{{url('/layanan')}}/{{$jenispelayanan->id_pelayanan}}"><img src="{{URL::asset($jenispelayanan->icon)}}" style="width:67px; height:67px;" alt="icon"></a>
						<h4>Layanan {{$jenispelayanan->nama}}</h4>
						<p>
							Untuk Pelayanan {{$jenispelayanan->nama}}
						</p>
					</div>
				@endforeach
			</div>
		</div>
	</section>
	<!--================ End important-points section =================-->

	<!--================ Start Our Major Cause section =================-->
	<section class="our_major_cause section_gap">
		<div class="container">
			<div class="row justify-content-center section-title-wrap">
				<div class="col-lg-12">
					<h1>Berita Terkini</h1>
					<p>
						Baca berita terbaru bermanfaat berikut ini.
					</p>
				</div>
			</div>

			<div class="row">
			<div class="card-deck">
				@foreach($beritanz->slice(0, 3) as $beritanz)
				<div class="card">
					<img src="{{URL::asset($beritanz->gambar)}}" style="height:277px;" class="card-img-top" alt="...">
					<div class="card-body">
						<a href="{{('/berita')}}/{{$beritanz->id_berita}}">{{$beritanz->judul}}</a>
						<p class="card-text"><small class="text-muted">{{$beritanz->updated_at}}</small></p>
					</div>
				</div>
				@endforeach
			</div>
			<div class="col-md-12 text-center"> 
					<a class="main_btn" href="{{url('/berita')}}">Selengkapnya</a>
			</div>
			</div>
		</div>
	</section>

	<!--================ Ens Our Major Cause section =================-->

	<!-- pengumuman start -->
	<section class="donation_details ">
		<div class="container">
			<div class="row justify-content-center section-title-wrap">
				<div class="col-lg-12">
					<h1>Pengumuman</h1>
					<p>Nantikan pengumuman terbaru dari kami.</p>
				</div>
			</div>
			<div class="row">
				@foreach($pengumuman->slice(0,3) as $pengumuman)
				<div class="list-group col-lg-12">
					<a href="{{('/pengumuman')}}/{{$pengumuman->id_pengumuman}}" class="list-group-item list-group-item-action flex-column align-items-start ">
					<div class="d-flex w-100 justify-content-between">
						<h5 class="mb-1">{{$pengumuman->judul}}</h5>
						<small class="text-right">{{date('d M Y', strtotime($pengumuman->updated_at))}}</small>
					</div>
					</a>
				</div>
				@endforeach
				<div class="col-md-12 text-center mt-5"> 
					<a class="main_btn" href="{{url('/pengumuman')}}">Selengkapnya</a>
				</div>
			</div>
		</div>
	</section>
	<!-- pengumuman end -->

	<!-- nomor antrian start -->
	<!--<section>
<div class="container">
<div class="row justify-content-center section-title-wrap">
			<div class="col-lg-12">
					<h1>Nomor Antrian</h1>
					<p>Nomor antrian berjalan tanggal (dd/mm/yyyy).</p>
				</div>
			</div>

</div>
</div>

<div class="row justify-content-center ">
			<div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
			<div class="card-header text-center">Loket:</div>
			<div class="card-body">
				<h1 class="card-text text-center text-white">A 01</h1>
				<h1 class="card-text text-center text-white">B 21</h1>
				<h1 class="card-text text-center text-white">C 12</h1>
			</div>
</div>
</section>-->
	<!-- nomor antrian end -->

	<!--================ Start Clients Logo Area =================-->

<div class="card">
  	<div class="card-body">
	  <section class="clients_logo_area ">
		<div class="container">
			<h1><center>Mitra Kami</center></h1>
					<p><center>Untuk meningkatkan pelayanan, kami telah bermitra dengan berbagai instansi baik Negeri maupun Swasta</center></p>
					<br>
			<div class="clients_slider owl-carousel">
				@foreach($mitra as $mitra)
				<div class="item">
					<img src="{{URL::asset($mitra->gambar)}}" style="width:156px; height:71px;" alt="">
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<section class="clients_logo_area ">
		<div class="container">
			<h1><center>Sertifikat</center></h1>
					<p><center>Untuk menjamin pelayanan, kami mempunyai beberapa sertifikat kesehatan
					</center></p>
					<br>
			<div class="clients_slider owl-carousel">
				@foreach($sertifikat as $sertifikat)
				<div class="item">
					<img src="{{URL::asset($sertifikat->gambar)}}" style="width:156px; height:71px;" alt="">
				</div>
				@endforeach
			</div>
		</div>
	</section>
  </div>
</div>




	<!--================ End Clients Logo Area =================-->


	<!--================ Start Experience Area =================-->
	<section class="experience_donation section_gap">
		<div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="col-lg-12">
				<!--masukkan footer tambahan-->	
				</div>
			</div>
		</div>
	</section>
	<!--================ End Experience Area =================-->
@endsection