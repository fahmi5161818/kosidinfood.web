<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOSIIDIN FOOD - Pesan Makanan Online</title>
</head>

<body>
    <section class="menu" id="home">
        <div class="nav">
            <div class="logo">
                <h1>KoSiDin<b>Food</b></h1>
            </div>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#menu-populer">Menu</a></li>
                <li><a href="#service">Service</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#gallery">Gallery</a></li>
            </ul>
            <div class="auth-buttons">
                <?php if (isset($_SESSION['username'])): ?>
                    <span class="welcome-user">Halo, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
                    <a href="php/logout.php" class="signup">Logout</a>
                <?php else: ?>
                    <a href="login.php" class="signin">Sign In</a>
                    <a href="register.php" class="signup">Sign Up</a>
                <?php endif; ?>
            </div>
            <i class='bx bx-menu hamburger-icon'></i>
        </div>

        <div class="grid">
            <div class="content">
                <div class="content-left">
                    <div class="info">
                        <h2>PESAN YANG TERBAIK<br>Food AnyTime!!</h2>
                        <p>Nikmati hidangan lezat berkualitas kapan saja dan di mana saja. Kualitas terjamin, rasa tak tertandingi.</p>
                    </div>
                    <a href="#menu-populer" class="tombol"><button>Explore food</button></a>
                </div>
                <div class="content-right">
                    <img src="images/gambar1-removebg-preview.png" alt="Paket Ayam dan Nasi">
                </div>
            </div>
        </div>
    </section>

    <section class="category" id="menu-populer">
        <div class="list-items">
            <h3>Hidangan yang tersedia saat ini</h3>
            <div class="card-list">
                <div class="card" data-name="Nasi Goreng" data-price="10000">
                    <img src="images/Resep_Nasi_Goreng__Rahasia_Nasi_Goreng_Enak_ala_Restoran-removebg-preview.png" alt="Nasi Goreng">
                    <div class="food-title"><h1>Nasi goreng</h1></div>
                    <div class="desc-food"><p>Nasi goreng spesial dengan bumbu rahasia dan topping melimpah.</p></div>
                    <div class="price">
                        <span>Rp10.000</span>
                        <span><i class='bx bxs-plus-circle add-to-cart'></i></span>
                    </div>
                </div>
                <div class="card" data-name="Rendang Sapi" data-price="20000">
                    <img src="images/rendang.png" alt="Rendang Sapi">
                    <div class="food-title"><h1>Rendang Sapi</h1></div>
                    <div class="desc-food"><p>Daging sapi empuk dimasak dengan rempah asli Nusantara.</p></div>
                    <div class="price">
                        <span>Rp20.000</span>
                        <span><i class='bx bxs-plus-circle add-to-cart'></i></span>
                    </div>
                </div>
                <div class="card" data-name="Mie Pedas" data-price="15000">
                    <img src="images/Stir-Fried_Noodles_with_Bell_Peppers_and_Green_Onions__Served_in_a_White_Bowl_with_a_Transparent_Background-removebg-preview.png" alt="Mie Pedas">
                    <div class="food-title"><h1>Mie Pedas</h1></div>
                    <div class="desc-food"><p>Mie dengan level kepedasan yang bisa disesuaikan selera Anda.</p></div>
                    <div class="price">
                        <span>Rp15.000</span>
                        <span><i class='bx bxs-plus-circle add-to-cart'></i></span>
                    </div>
                </div>
                <div class="card" data-name="Paket Ayam + Nasi" data-price="17000">
                    <img src="images/gambar1-removebg-preview.png" alt="Paket Ayam">
                    <div class="food-title"><h1>Paketan Ayam + Nasi</h1></div>
                    <div class="desc-food"><p>Ayam goreng krispi disajikan dengan nasi hangat dan sambal.</p></div>
                    <div class="price">
                        <span>Rp17.000</span>
                        <span><i class='bx bxs-plus-circle add-to-cart'></i></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

<section id="service" class="service-section">
    <div class="section-title">
        <h2>Layanan Terbaik Kami</h2>
        <p>Kami tidak hanya menyajikan makanan, tapi juga pengalaman terbaik untuk Anda.</p>
    </div>
    <div class="service-container">
        <div class="service-card">
            <i class='bx bxs-truck'></i>
            <h3>Pesan Antar Cepat</h3>
            <p>Pesanan Anda kami antarkan dengan cepat dan dalam kondisi terbaik langsung ke depan pintu Anda.</p>
        </div>
        <div class="service-card">
            <i class='bx bxs-cake'></i>
            <h3>Katering Acara</h3>
            <p>Sediakan hidangan istimewa untuk acara spesial Anda, mulai dari ulang tahun hingga rapat kantor.</p>
        </div>
        <div class="service-card">
            <i class='bx bxs-credit-card'></i>
            <h3>Pembayaran Mudah</h3>
            <p>Mendukung berbagai metode pembayaran digital yang aman dan praktis untuk kemudahan Anda.</p>
        </div>
    </div>
</section>

<section id="about" class="about-section">
    <div class="about-container">
        <div class="about-image">
            <img src="https://images.pexels.com/photos/3297363/pexels-photo-3297363.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Tentang KOSIIDIN Food">
        </div>
        <div class="about-content">
            <h2>Cerita di Balik Dapur Kami</h2>
            <h3>Menyajikan Rasa, Menciptakan Kenangan</h3>
            <p>KOSIIDIN Food lahir dari kecintaan kami terhadap masakan asli Indonesia yang kaya rasa. Kami percaya bahwa makanan yang baik berasal dari bahan-bahan segar berkualitas dan dimasak dengan hati. Setiap hidangan yang kami sajikan adalah perwujudan dari semangat kami untuk melestarikan warisan kuliner Nusantara.</p>
            <p>Misi kami sederhana: membuat semua orang bisa menikmati makanan lezat berkualitas restoran dengan harga yang terjangkau, kapan pun dan di mana pun.</p>
            <a href="#menu-populer" class="btn-primary">Lihat Menu Kami</a>
        </div>
    </div>
</section>

<section id="gallery" class="gallery-section">
    <div class="section-title">
        <h2>Galeri Makanan Kami</h2>
        <p>Intip beberapa hidangan andalan yang siap menggugah selera Anda.</p>
    </div>
    <div class="gallery-container">
        <div class="gallery-item"><img src="images/Resep_Nasi_Goreng__Rahasia_Nasi_Goreng_Enak_ala_Restoran-removebg-preview.png" alt="Galeri Nasi Goreng"></div>
        <div class="gallery-item"><img src="images/rendang.png" alt="Galeri Rendang"></div>
        <div class="gallery-item"><img src="images/Stir-Fried_Noodles_with_Bell_Peppers_and_Green_Onions__Served_in_a_White_Bowl_with_a_Transparent_Background-removebg-preview.png" alt="Galeri Mie Pedas"></div>
        <div class="gallery-item"><img src="https://images.pexels.com/photos/1410235/pexels-photo-1410235.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Galeri Sate Ayam"></div>
        <div class="gallery-item"><img src="https://images.pexels.com/photos/262959/pexels-photo-262959.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Galeri Steak"></div>
        <div class="gallery-item"><img src="images/gambar1-removebg-preview.png" alt="Galeri Paket Ayam"></div>
    </div>
</section>
    
    <div class="cart-modal-overlay">
        <div class="cart-modal">
            <i class='bx bx-x close-cart'></i>
            <h3>Keranjang Belanja Anda</h3>
            <div id="cart-items-container">
                <p class="cart-empty">Keranjang masih kosong.</p>
            </div>
            <div class="cart-summary">
                <strong>Total: <span id="cart-total">Rp0</span></strong>
            </div>
            <button id="checkout-whatsapp">Pesan Sekarang via WhatsApp</button>
        </div>
    </div>
    
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-col">
                <h4>KOSIIDIN Food</h4>
                <p>Pesan makanan favoritmu dengan mudah dan cepat. Kualitas rasa adalah prioritas kami.</p>
            </div>
            <div class="footer-col">
                <h4>Navigasi</h4>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#menu-populer">Menu</a></li>
                    <li><a href="#service">Service</a></li>
                    <li><a href="#about">About Us</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Kontak Kami</h4>
                <p><i class='bx bxs-map'></i> Jl.Raya cijulang No. 123, Pangandaran</p>
                <p><i class='bx bxs-phone'></i> +62 821-2385-1577</p>
                <p><i class='bx bxs-envelope'></i> order@kosiidinfood.com</p>
            </div>
            <div class="footer-col">
                <h4>Ikuti Kami</h4>
                <div class="social-links">
                    <a href="#"><i class='bx bxl-facebook-square'></i></a>
                    <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 KOSIIDIN Food. All Rights Reserved.</p>
        </div>
    </footer>


    <script src="script.js"></script>
</body>
</html>