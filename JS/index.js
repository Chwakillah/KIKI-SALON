document.addEventListener("DOMContentLoaded", function() {
    var moveInterval;
    function resetMoveInterval() {
        clearInterval(moveInterval);
        moveInterval = setInterval(movePaket, 5000); // Reset interval setiap kali paket diklik
    }
    function updatePaketBehaviors() {
        var pakets = document.querySelectorAll('.section3 .container .paket');
        // Pertama, reset semua paket untuk menghapus efek dan event listener
        pakets.forEach(paket => {
            paket.classList.remove('blur'); // Hapus kelas blur
            paket.style.cursor = ''; // Reset cursor
            paket.style.opacity = '1'; // Reset
        });
    
        // Clone dan ganti setiap paket untuk menghapus event listener yang ada
        pakets.forEach((paket, index) => {
            let newPaket = paket.cloneNode(true);
            paket.parentNode.replaceChild(newPaket, paket);
        });
    
        // Ambil ulang referensi paket setelah cloning
        pakets = document.querySelectorAll('.section3 .container .paket');
    
        // Tambahkan cursor, kelas blur, dan event listener ke setiap paket kecuali yang di tengah
        pakets.forEach((paket, index) => {
            if (index !== 1) {
                paket.classList.add('blur');
                paket.style.cursor = 'pointer';
                paket.addEventListener('click', function() {
                    var container = document.querySelector('.section3 .container');
                    // Menentukan posisi paket saat ini
                    var paketIndex = Array.from(container.children).indexOf(paket);
                    
                    if (paketIndex === 0) {
                        // Jika paket paling kiri diklik, pindahkan paket di kanan ke posisi paling kiri
                        container.insertBefore(container.children[container.children.length - 1], container.children[0]);
                    } else {
                        // Jika paket paling kanan diklik, pindahkan paket di kiri ke posisi paling kanan
                        container.appendChild(container.children[0]);
                    }
                    resetMoveInterval();
                    updatePaketBehaviors(); // Update ulang untuk menyesuaikan dengan posisi baru
                });
            }
        });
    }
    
    function movePaket() {
        var container = document.querySelector('.section3 .container');
        container.appendChild(container.firstElementChild); // Pindahkan elemen pertama ke akhir
        updatePaketBehaviors(); // Update ulang untuk menyesuaikan dengan posisi baru
    }
    
    updatePaketBehaviors(); // Panggil pertama kali setelah DOM loaded
    resetMoveInterval(); // Mulai pemindahan otomatis
    

    // Fungsionalitas untuk smooth scrolling
    var scrollLinks = document.querySelectorAll('.scroll-link');
    scrollLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            var targetId = this.getAttribute('href');
            var targetElement = document.querySelector(targetId);

            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});