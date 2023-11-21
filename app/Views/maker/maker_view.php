<div class="container pt-3 mt-3">
    <!-- alert -->
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert" id="myAlert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif ?>
    <!-- end alert -->
    <div class="img-profil d-flex justify-content-center">
        <img src="/asset/img/fuziahmad2.jpeg" alt="" width="150" height="150" class="rounded-circle">
    </div>
    <div class="maker-profil d-flex justify-content-center">
       <p class="fw-light">Maker</p>
    </div>
    <div class="wrapper d-flex justify-content-center text-center" >
        <div class="dynamic-text">  
            <ul>
                <li><span><?= $getData['nama']; ?></span></li>
                <li><span><?= $getData['nim']; ?></span></li>
                <li><span><?= $getData['kelas']; ?></span></li>
            </ul>   
        </div>
    </div>
 <div class="addres-profil d-block text-center">
    <p class="fw-semibold">Address 📌 : <?= $getData['alamat']; ?></p>
    <p class="fw-semibold">Contact me 🤙 : <?= $getData['nomor_kontak']; ?></p>
</div>


</div>