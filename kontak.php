<?php
// Mengambil data testimoni dari database
$query_testimoni = "SELECT * FROM testimoni ORDER BY id_testimoni DESC";
$result_testimoni = $koneksi->query($query_testimoni);
?>

  <div class="hero hero-inner">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mx-auto text-center">
          <div class="intro-wrap">
            <h1 class="mb-0">Contact Us</h1>
            <p class="text-white">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  
  
  <div class="untree_co-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <form class="contact-form" data-aos="fade-up" data-aos-delay="200">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label class="text-black" for="fname">First name</label>
                  <input type="text" class="form-control" id="fname">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label class="text-black" for="lname">Last name</label>
                  <input type="text" class="form-control" id="lname">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="text-black" for="email">Email address</label>
              <input type="email" class="form-control" id="email">
            </div>

            <div class="form-group">
              <label class="text-black" for="message">Message</label>
              <textarea name="" class="form-control" id="message" cols="30" rows="5"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Send Message</button>
          </form>
        </div>
        <div class="col-lg-5 ml-auto">
          <div class="quick-contact-item d-flex align-items-center mb-4">
            <span class="flaticon-house"></span>
            <address class="text">
            <?php echo $kontak['alamat']; ?>
            </address>
          </div>
          <div class="quick-contact-item d-flex align-items-center mb-4">
            <span class="flaticon-phone-call"></span>
            <address class="text">
            <?php echo $kontak['no_telp']; ?>
            </address>
          </div>
          <div class="quick-contact-item d-flex align-items-center mb-4">
            <span class="flaticon-mail"></span>
            <address class="text">
            <?php echo $kontak['email']; ?>
            </address>
          </div>
        </div>
      </div>
    </div>
  </div>

  

  <div class="untree_co-section testimonial-section mt-5 bg-white">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-7 text-center">
          <h2 class="section-title text-center mb-5">Testimonials</h2>

          <div class="owl-single owl-carousel no-nav">
          <?php
      while ($testimoni = mysqli_fetch_assoc($result_testimoni)) {
    ?>
            <div class="testimonial mx-auto">
              <figure class="img-wrap">
                <img src="admin/testimoni/uploads/<?php echo $testimoni['gambar_testimoni']; ?>" alt="Image" class="img-fluid">
              </figure>
              <h3 class="name"><?php echo $testimoni['nama_testimoni']; ?></h3>
              <blockquote>
                <p>&ldquo;<?php echo $testimoni['isi_testimoni']; ?>&rdquo;</p>
              </blockquote>
            </div>
            <?php
}

?>
          </div>

        </div>
      </div>
    </div>
  </div>

