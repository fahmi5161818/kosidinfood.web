// Menunggu seluruh konten halaman dimuat sebelum menjalankan JavaScript
document.addEventListener('DOMContentLoaded', () => {

    // --- Seleksi Elemen-elemen DOM ---
    // Menyimpan semua elemen yang akan dimanipulasi ke dalam variabel
    const hamburgerIcon = document.querySelector('.hamburger-icon');
    const navLinks = document.querySelector('.nav-links');
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    const cartModalOverlay = document.querySelector('.cart-modal-overlay');
    const closeCartButton = document.querySelector('.close-cart');
    const cartItemsContainer = document.getElementById('cart-items-container');
    const cartTotalSpan = document.getElementById('cart-total');
    const checkoutButton = document.getElementById('checkout-whatsapp');

    // --- State Aplikasi (Keranjang Belanja) ---
    // 'cart' adalah array yang akan menyimpan semua item yang dipilih pengguna
    let cart = [];

    // --- Fungsi untuk memformat angka menjadi Rupiah ---
    const formatRupiah = (number) => {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(number);
    };

    // --- Fungsi untuk memperbarui tampilan Keranjang Belanja (UI) ---
    const updateCartUI = () => {
        // 1. Kosongkan kontainer item keranjang
        cartItemsContainer.innerHTML = '';
        let total = 0;

        // 2. Cek jika keranjang kosong
        if (cart.length === 0) {
            cartItemsContainer.innerHTML = '<p class="cart-empty">Keranjang masih kosong.</p>';
            cartTotalSpan.textContent = formatRupiah(0);
            return; // Hentikan fungsi jika keranjang kosong
        }

        // 3. Jika ada item, buat elemen HTML untuk setiap item
        cart.forEach((item, index) => {
            total += item.price * item.quantity;
            const itemElement = document.createElement('div');
            itemElement.classList.add('cart-item');
            itemElement.innerHTML = `
                <div class="cart-item-details">
                    <p><strong>${item.name}</strong></p>
                    <p>${item.quantity} x ${formatRupiah(item.price)}</p>
                </div>
                <div class="cart-item-actions">
                    <button class="quantity-change" data-index="${index}" data-action="decrease">-</button>
                    <span class="quantity-display">${item.quantity}</span>
                    <button class="quantity-change" data-index="${index}" data-action="increase">+</button>
                </div>
            `;
            cartItemsContainer.appendChild(itemElement);
        });

        // 4. Perbarui total harga
        cartTotalSpan.textContent = formatRupiah(total);
    };
    
    // --- Fungsi untuk menambah/mengubah kuantitas item di keranjang ---
    const manageCartItem = (name, price) => {
        const existingItem = cart.find(item => item.name === name);
        if (existingItem) {
            existingItem.quantity++; // Jika item sudah ada, tambah kuantitasnya
        } else {
            cart.push({ name, price, quantity: 1 }); // Jika belum, tambahkan item baru
        }
        updateCartUI(); // Perbarui tampilan setelah mengubah data
    };
    
    // --- Fungsi untuk mengubah kuantitas dari tombol +/- di keranjang ---
    const changeQuantity = (index, action) => {
        const item = cart[index];
        if (!item) return; // Jika item tidak ditemukan, hentikan

        if (action === 'increase') {
            item.quantity++;
        } else if (action === 'decrease') {
            item.quantity--;
        }

        // Hapus item dari keranjang jika kuantitasnya 0 atau kurang
        if (item.quantity <= 0) {
            cart.splice(index, 1);
        }
        
        updateCartUI(); // Perbarui tampilan
    };

    // --- Fungsi untuk membuka & menutup Modal Keranjang ---
    const showCartModal = () => cartModalOverlay.classList.add('active');
    const hideCartModal = () => cartModalOverlay.classList.remove('active');

    // --- Pengaturan Event Listeners ---

    // 1. Event listener untuk ikon hamburger (menu mobile)
    if (hamburgerIcon) {
        hamburgerIcon.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    }

    // 2. Event listener untuk semua tombol "Tambah ke Keranjang" (+)
    addToCartButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            const card = e.target.closest('.card');
            const name = card.dataset.name;
            const price = parseInt(card.dataset.price, 10);
            
            if (name && !isNaN(price)) {
                manageCartItem(name, price);
                showCartModal();
            }
        });
    });

    // 3. Event Delegation untuk tombol +/- di dalam keranjang
    //    Ini lebih efisien daripada menambah event listener ke setiap tombol
    if (cartItemsContainer) {
        cartItemsContainer.addEventListener('click', (e) => {
            // Cek apakah yang diklik adalah tombol ubah kuantitas
            if (e.target.classList.contains('quantity-change')) {
                const index = parseInt(e.target.dataset.index, 10);
                const action = e.target.dataset.action;
                if (!isNaN(index) && action) {
                    changeQuantity(index, action);
                }
            }
        });
    }
    
    // 4. Event listener untuk tombol checkout ke WhatsApp
    if (checkoutButton) {
        checkoutButton.addEventListener('click', () => {
            if (cart.length === 0) {
                alert('Keranjang Anda masih kosong. Silakan pilih menu terlebih dahulu.');
                return;
            }

            // GANTI DENGAN NOMOR WA ADMIN ANDA (gunakan format 62)
            const adminPhoneNumber = '6282123851577';
            let message = 'Halo KOSIIDIN FOOD, saya mau pesan:\n\n';
            let total = 0;

            cart.forEach(item => {
                const subtotal = item.price * item.quantity;
                message += `*${item.name}*\n`;
                message += `${item.quantity} x ${formatRupiah(item.price)} = *${formatRupiah(subtotal)}*\n\n`;
                total += subtotal;
            });

            message += `*TOTAL PESANAN: ${formatRupiah(total)}*\n\n`;
            message += 'Mohon informasinya untuk langkah selanjutnya. Terima kasih!';

            const whatsappURL = `https://wa.me/${adminPhoneNumber}?text=${encodeURIComponent(message)}`;
            window.open(whatsappURL, '_blank');
        });
    }

    // 5. Event listeners untuk menutup modal
    if (closeCartButton) {
        closeCartButton.addEventListener('click', hideCartModal);
    }
    if (cartModalOverlay) {
        cartModalOverlay.addEventListener('click', (e) => {
            // Tutup modal hanya jika klik dilakukan di area overlay (luar kotak modal)
            if (e.target === cartModalOverlay) {
                hideCartModal();
            }
        });
    }

});