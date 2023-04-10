<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row gy-4 d-flex justify-content-between">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h2 data-aos="fade-up">Menulis Arab, Bermain Seru, Menambah Ilmu!</h2>
          <p data-aos="fade-up" data-aos-delay="100">Game menulis arab adalah sebuah permainan yang menantang dan mengasyikkan, di mana kamu bisa belajar menulis huruf Arab dengan cara yang menyenangkan. Dalam game ini, kamu akan diajak untuk mengasah keterampilan menulis huruf Arab dengan cepat dan akurat, sehingga kamu bisa menjadi lebih terampil dalam membaca dan menulis bahasa Arab.</p>

          <div action="#" class="d-flex align-items-stretch mb-3" data-aos="fade-up" data-aos-delay="200">
            <button type="submit" class="btn border-0 w-50 text-center bg-white text-dark"><h5 class="mb-0 py-2"><i class="fa-solid fa-play me-3"></i> Let's Play</h5></button>
          </div>

          <div class="row gy-4" data-aos="fade-up" data-aos-delay="400">

            <div class="col-lg-4 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="{{$user}}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Users</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-4 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="{{$question}}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Questions</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-4 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="{{$answer}}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Answers</p>
              </div>
            </div><!-- End Stats Item -->

            <!-- End Stats Item -->

          </div>
        </div>

        <div class="col-lg-5 order-1 order-lg-2 hero-img d-none d-md-block" data-aos="zoom-out-left">
          <img src="{{asset('assets/image/logo.png')}}" class="img-fluid mb-3 mb-lg-0" alt="">
        </div>

      </div>
    </div>
  </section><!-- End Hero Section -->