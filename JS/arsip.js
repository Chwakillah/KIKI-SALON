document.addEventListener("DOMContentLoaded", function() {
    // Menambahkan event listener untuk image di paket 1
    document.getElementById("paket1klik-img").addEventListener("click", function() {
        // Aksi yang diinginkan setelah elemen image di sentuh
        var currentPaket = document.getElementById("paket1");
        var nextPaket = document.getElementById("paket2");
        
        currentPaket.style.opacity = '0';
        setTimeout(function() {
            currentPaket.style.display = 'none';
            nextPaket.style.display = 'flex';
            nextPaket.style.opacity = '0';
            setTimeout(function() {
                nextPaket.style.opacity = '1';
            }, 10);
        }, 300);
    });
    
    // Menambahkan event listener untuk h2 judul di paket 1
    document.getElementById("paket1klik-h21").addEventListener("click", function() {
        // Aksi yang diinginkan setelah elemen h2 judul di sentuh
        var currentPaket = document.getElementById("paket1");
        var nextPaket = document.getElementById("paket2");
        
        currentPaket.style.opacity = '0';
        setTimeout(function() {
            currentPaket.style.display = 'none';
            nextPaket.style.display = 'flex';
            nextPaket.style.opacity = '0';
            setTimeout(function() {
                nextPaket.style.opacity = '1';
            }, 10);
        }, 300);
    });
    
    // Menambahkan event listener untuk h2 sub-judul di paket 1
    document.getElementById("paket1klik-h22").addEventListener("click", function() {
        // Aksi yang diinginkan setelah elemen h2 sub-judul di sentuh
        var currentPaket = document.getElementById("paket1");
        var nextPaket = document.getElementById("paket2");
        
        currentPaket.style.opacity = '0';
        setTimeout(function() {
            currentPaket.style.display = 'none';
            nextPaket.style.display = 'flex';
            nextPaket.style.opacity = '0';
            setTimeout(function() {
                nextPaket.style.opacity = '1';
            }, 10);
        }, 300);
    });
    
    // Menambahkan event listener untuk image di paket 2
    document.getElementById("paket2klik-img").addEventListener("click", function() {
        // Aksi yang diinginkan setelah elemen image di sentuh
        var currentPaket = document.getElementById("paket2");
        var nextPaket = document.getElementById("paket3");
        
        currentPaket.style.opacity = '0';
        setTimeout(function() {
            currentPaket.style.display = 'none';
            nextPaket.style.display = 'flex';
            nextPaket.style.opacity = '0';
            setTimeout(function() {
                nextPaket.style.opacity = '1';
            }, 10);
        }, 300);
    });
    
    // Menambahkan event listener untuk h2 judul di paket 2
    document.getElementById("paket2klik-h21").addEventListener("click", function() {
        // Aksi yang diinginkan setelah elemen h2 judul di sentuh
        var currentPaket = document.getElementById("paket2");
        var nextPaket = document.getElementById("paket3");
        
        currentPaket.style.opacity = '0';
        setTimeout(function() {
            currentPaket.style.display = 'none';
            nextPaket.style.display = 'flex';
            nextPaket.style.opacity = '0';
            setTimeout(function() {
                nextPaket.style.opacity = '1';
            }, 10);
        }, 300);
    });
    
    // Menambahkan event listener untuk h2 sub-judul di paket 2
    document.getElementById("paket2klik-h22").addEventListener("click", function() {
        // Aksi yang diinginkan setelah elemen h2 sub-judul di sentuh
        var currentPaket = document.getElementById("paket2");
        var nextPaket = document.getElementById("paket3");
        
        currentPaket.style.opacity = '0';
        setTimeout(function() {
            currentPaket.style.display = 'none';
            nextPaket.style.display = 'flex';
            nextPaket.style.opacity = '0';
            setTimeout(function() {
                nextPaket.style.opacity = '1';
            }, 10);
        }, 300);
    });
    
        // Menambahkan event listener untuk image di paket 3
        document.getElementById("paket3klik-img").addEventListener("click", function() {
            // Aksi yang diinginkan setelah elemen image di sentuh
            var currentPaket = document.getElementById("paket3");
            var nextPaket = document.getElementById("paket1");
            
            currentPaket.style.opacity = '0';
            setTimeout(function() {
                currentPaket.style.display = 'none';
                nextPaket.style.display = 'flex';
                nextPaket.style.opacity = '0';
                setTimeout(function() {
                    nextPaket.style.opacity = '1';
                }, 10);
            }, 300);
        });
    
        // Menambahkan event listener untuk h2 judul di paket 3
        document.getElementById("paket3klik-h21").addEventListener("click", function() {
            // Aksi yang diinginkan setelah elemen h2 judul di sentuh
            var currentPaket = document.getElementById("paket3");
            var nextPaket = document.getElementById("paket1");
            
            currentPaket.style.opacity = '0';
            setTimeout(function() {
                currentPaket.style.display = 'none';
                nextPaket.style.display = 'flex';
                nextPaket.style.opacity = '0';
                setTimeout(function() {
                    nextPaket.style.opacity = '1';
                }, 10);
            }, 300);
        });
    
        // Menambahkan event listener untuk h2 sub-judul di paket 3
        document.getElementById("paket3klik-h22").addEventListener("click", function() {
            // Aksi yang diinginkan setelah elemen h2 sub-judul di sentuh
            var currentPaket = document.getElementById("paket3");
            var nextPaket = document.getElementById("paket1");
            
            currentPaket.style.opacity = '0';
            setTimeout(function() {
                currentPaket.style.display = 'none';
                nextPaket.style.display = 'flex';
                nextPaket.style.opacity = '0';
                setTimeout(function() {
                    nextPaket.style.opacity = '1';
                }, 10);
            }, 300);
        });
    });
    
    document.addEventListener("DOMContentLoaded", function() {
        var scrollLinks = document.querySelectorAll('.scroll-link');
    
        scrollLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                var targetId = this.getAttribute('href');
                var targetElement = document.querySelector(targetId);
    
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth', // Animasi scroll dengan efek 'smooth'
                        block: 'start' // Scroll agar elemen target berada di bagian atas viewport
                    });
                }
            });
        });
    
    });