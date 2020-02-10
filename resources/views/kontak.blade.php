@extends('layout/main')

@section('content')

 <!--================ Banner Area =================-->
 <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Kontak kami </h2>
                    <div class="page_link">
                        <a href="{{url('/')}}">Home</a>
                        <a href="{{('/kontak')}}">Kontak    </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Banner Area =================-->

   <!--================Contact Area =================-->
   <section class="card contact_area p_120">
        <div class="container ">
            <div class="row">
                <div class="col-lg-7">
                    <div class="contact_info">
                        <h3 class="mb-4">KANTOR KAMI</h3>
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>Yogyakarta, Indonesia</h6>
                            <p>Ngadinegaran MJ III/62 Yogyakarta 55143</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6>Telp</h6>
                            <p>(0274) 378187 </p>
                        </div>
                         <div class="info_item">
                            <i class="lnr lnr-printer"></i>
                            <h6>Fax</h6>
                            <p>(0274) 381582</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6>Email</h6>
                            <p>labkes@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <form class="row contact_form" action="#" method="post" id="contactForm" novalidate="novalidate">
                        <div class="col-md-12">
                            <h3 class="mb-4">HUBUNGI KAMI</h3> 
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama" maxlength="30" >
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email">
                            </div>
                            <div class="form-group">
                                 <textarea class="form-control" name="message" id="message" rows="1" placeholder="Masukkan pesan"></textarea>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                             </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" class="btn submit_btn">Send Message</button>
                        </div><br>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!--================Contact Area =================-->

    <!-- start maps area -->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.7507405851825!2d110.36228831417719!3d-7.816187979780101!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5797d5fa531d%3A0x32be113cadb84e04!2sBalai%20Laboratorium%20Kesehatan%20Dan%20Kalibrasi%20Yogyakarta!5e0!3m2!1sid!2sid!4v1581299214916!5m2!1sid!2sid" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    <!-- ends maps area -->




@endsection