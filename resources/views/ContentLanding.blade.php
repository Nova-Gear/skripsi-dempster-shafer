<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center" style="background:rgba(40, 58, 90, 0.9);">
    <div class="container d-flex align-items-center justify-content-between">

        <div style="width:300px;">
            <a href="" class="dropdown-toggle no-arrow">
                <img src="{{ asset('vendors/images/logo-puerca.png') }}" alt=""
                    style="border-radius: 50%; width:50px;">
                &nbsp;
                <span class="text-white"> Puerca Center </span>
            </a>
            <!-- Uncomment below if you prefer to use an image logo -->
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#info">Info Penyakit</a></li>
                <li><a class="nav-link scrollto" href="#tentang">Tentang</a></li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                <li><a class="nav-link scrollto" href="#kritiksaran">Kritik dan Saran</a></li>
                <li><a class="getstarted scrollto" href="{{ url('/login') }}">Login</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

    </div>
</header>

<main id="main">
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up" data-aos-delay="200">
                    <h1>Puerca Center</h1>
                    <h2>Selamat Datang di Puerca Center. Sistem ini digunakan untuk mendiagnosa keluhan yang dialami
                        oleh ibu nifas. Kenali resiko penyakit dengan gejala yang anda alami dengan berkonsultasi
                        melalui tombol dibawah ini</h2>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="{{ url('/diagnosa') }}" class="btn-get-started">Konsultasi</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ asset('landingpage/img/kesehatan3.png') }}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section>
    <!-- End Hero -->
    <!-- ======= Cta Section ======= -->
    <section id="info" class="cta">
        <div class="container" data-aos="zoom-in">
            <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
                <div class="container">
                    <div class="section-title-penyakit">
                        <h2>Info Penyakit</h2>
                        <p>Beberapa penyakit yang dapat menyerang Ibu Nifas</p>
                    </div>
                    <div class="pd-ltr-20 xs-pd-20-10">
                        <div class="min-height-200px">
                            <div class="slick-slider">
                                @foreach ($data_penyakit as $penyakit)
                                    <div class="col-md-4 mb-30">
                                        <div class="card card-box" style="height: 100%;">
                                            <div class="card-header">
                                                {{ $penyakit->penyakit }}
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text text-black">{{ $penyakit->deskripsi }}</p>
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#myModal" data-penyakit="{{ $penyakit->penyakit }}"
                                                    data-deskripsi="{{ $penyakit->deskripsi }}"
                                                    data-solusi="{{ $penyakit->solusi }}">Selengkapnya</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <script>
                            $(document).ready(function() {
                                $('.slick-slider').slick({
                                    slidesToShow: 3,
                                    slidesToScroll: 1,
                                    autoplay: true,
                                    autoplaySpeed: 3000,
                                    responsive: [{
                                        breakpoint: 768,
                                        settings: {
                                            slidesToShow: 1
                                        }
                                    }]
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= About Section ======= -->
    <section id="tentang" class="about">
        <div class="container">

            <div class="row justify-content-between">
                <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">

                    <img src="http://produkta.jti.polinema.ac.id/~22S985/assets/Landing_page/img/gambaran/kesehatan-mental.jpg"
                        class="img-fluid" alt="" data-aos="zoom-in">
                </div>
                <div class="col-lg-6 pt-5 pt-lg-0">
                    <h3 data-aos="fade-up">Gambaran Umum</h3>

                    <p data-aos="fade-up" data-aos-delay="100">
                        BLUD Puskesmas Plandaan ini salah satu puskesmas di Kabupaten Jombang. Puskesmas ini melayani
                        berbagai program
                        puskesmas seperti periksa kesehatan (check up), perawatan orang dalam gangguan mental dan
                        pelayanan lainnya.
                        <br><br> Kesehatan mental adalah kondisi seseorang yang berhubungan dengan emosional,
                        psikologis,
                        kesejahteraan sosial seseorang yang dapat menyerang atau mempengaruhi saraf otak manusia
                        sehingga dapat
                        menyakiti dirinya sendiri. Kesehatan mental berpengaruh terhadap bagaimana seseorang berpikir,
                        merasa,
                        bertindak, serta membuat keputusan, juga bagaimana seseorang menangani stres dan berinteraksi
                        dengan orang
                        lain. <br> <br>
                    </p>

                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <section id="contact" class="contact section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Contact Us</h2>
                <p>Contact us the get started</p>
            </div>

            <div class="row info">
                <div class="col-lg-12 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.354719959194!2d112.89013901047264!3d-7.644950792339275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7c5ec60b15047%3A0xedd673aca159a07d!2sBidan%20Bu%20tri!5e0!3m2!1sid!2sid!4v1683358662540!5m2!1sid!2sid"
                        frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>

                </div>
                <div class="col-lg-12" style="height: 35px;">
                </div>

                <div class="col">
                    <div class="text-center">
                        <div class="address">
                            <i class="bi bi-geo-alt "></i>
                            <h4>Location:</h4>
                            <p>Gentong, Kec. Gadingrejo, Kota Pasuruan, Jawa Timur 67139</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center">

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>info@example.com</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center">

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p>(0321) 887028</p>
                        </div>

                    </div>
                </div>
                <br>
                <br>
            </div>

        </div>
    </section><!-- End Contact Us Section -->

    <!-- ======= About Section ======= -->
    <section id="kritiksaran" class="about">
        <div class="container"">

            <div class="row justify-content-between">
                <div class="col-lg-5 about-img">
                    <h3 class="mb-4">KRITIK & SARAN</h3>
                    <p class="mb-4">Kami sangat membutuhkan saran & kritik anda untuk menjadikan website ini dapat
                        berfungsi lebih baik lagi <span class="fa fa-smile" /></p>
                </div>
                <div class="col-lg-6 pt-5 pt-lg-0">
                    <form method="POST" action="{{ route('storeKomentar') }}" id="myForm">
                        @csrf
                        <div class="form-group">
                            <input class="form-control" type="text" name="nama" id="nama"
                                aria-describedby="nama" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" type="text" name="komentar" id="komentar" aria-describedby="komentar"
                                placeholder="Kritk & Saran"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        @include('sweetalert::alert')
                    </form>

                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h5> Deskripsi : </h5>
                    <p id="deskripsi"></p>
                    <h5> Solusi : </h5>

                    <p id="solusi"></p>
                </div>
            </div>
        </div>
    </div>


</main>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('landingpage/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('landingpage/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('landingpage/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('landingpage/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('landingpage/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('landingpage/vendor/waypoints/noframework.waypoints.js') }}"></script>
<script src="{{ asset('landingpage/vendor/php-email-form/validate.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Template Main JS File -->
<script src="{{ asset('landingpage/js/main.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#myModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var penyakit = button.data('penyakit');
            var deskripsi = button.data('deskripsi');
            var solusi = button.data('solusi');
            var modal = $(this);
            modal.find('.modal-title').text(penyakit);
            modal.find('#deskripsi').text(deskripsi);
            modal.find('#solusi').text(solusi);
        });
    });
</script>
