<?php
// Mengambil data tim dari database
$query_tim = "SELECT * FROM tim ORDER BY id_tim DESC";
$result_tim = $koneksi->query($query_tim);

// Mengambil data armada dari database
$query_armada = "SELECT * FROM armada ORDER BY id_armada DESC";
$result_armada = $koneksi->query($query_armada);

// Mengambil data testimoni dari database
$query_testimoni = "SELECT * FROM testimoni ORDER BY id_testimoni DESC";
$result_testimoni = $koneksi->query($query_testimoni);
?>
  <div class="hero hero-inner">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mx-auto text-center">
          <div class="intro-wrap">
            <h1 class="mb-0">About Us</h1>
            <p class="text-white">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  
  
  <div class="untree_co-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="owl-single dots-absolute owl-carousel">
            <img src="assets/images/slider-1.jpg" alt="Free HTML Template by Untree.co" class="img-fluid rounded-20">
            <img src="assets/images/slider-2.jpg" alt="Free HTML Template by Untree.co" class="img-fluid rounded-20">
            <img src="assets/images/slider-3.jpg" alt="Free HTML Template by Untree.co" class="img-fluid rounded-20">
            <img src="assets/images/slider-4.jpg" alt="Free HTML Template by Untree.co" class="img-fluid rounded-20">
            <img src="assets/images/slider-5.jpg" alt="Free HTML Template by Untree.co" class="img-fluid rounded-20">
          </div>
        </div>
        <div class="col-lg-5 pl-lg-5 ml-auto">
         <p><h4 class="section-title mb-4">Visi</h4></p> 
          <p><a href="#"><?php echo $about['visi_about']; ?></p>
          <p><h4 class="section-title mb-4">Misi</h4></p> 
          <p><a href="#"><?php echo $about['misi_about']; ?></p>
        </div>
      </div>
    </div>
  </div>

  <div class="untree_co-section">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-6 text-center">
          <h2 class="section-title mb-3 text-center">Team</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
        </div>
      </div>

      <div class="row">
        <?php
      while ($tim = mysqli_fetch_assoc($result_tim)) {
    ?>
    <div class="col-lg-3 mb-4">
        <div class="team">
        <img src="admin/tim/uploads/<?php echo $tim['foto_tim']; ?>" alt="Image" class="img-fluid mb-4 rounded-20">
            <div class="px-3">
                <h3 class="mb-0"><?php echo $tim['nama_tim']; ?></h3>
                <p><?php echo $tim['nama_tim']; ?></p>
            </div>
        </div>
    </div>
    <?php
}

?>
</div>
<div class="untree_co-section">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-6 text-center">
          <h2 class="section-title mb-3 text-center">Armada</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
        </div>
      </div>

      <div class="row">
        <?php
      while ($armada = mysqli_fetch_assoc($result_armada)) {
    ?>
    <div class="col-lg-3 mb-4">
        <div class="team">
        <img src="admin/armada/uploads/<?php echo $armada['gambar_armada']; ?>" alt="Image" class="img-fluid mb-4 rounded-20">
            <div class="px-3">
                <h3 class="mb-0"><?php echo $armada['nama_armada']; ?></h3>
                <p><?php echo $armada['jenis_armada']; ?></p>
            </div>
        </div>
    </div>
    <?php
}

?>
</div>
      </div>

    </div>
  </div>


  

  <div class="untree_co-section testimonial-section mt-5">
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


  
  