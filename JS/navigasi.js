document.addEventListener("DOMContentLoaded", function () {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var navigasiHTML = xhr.responseText;
            document.body.insertAdjacentHTML("afterbegin", navigasiHTML);
        }
    };

    function clearActiveLinks() {
        document.querySelectorAll('.menu-link a').forEach(link => {
          link.classList.remove('active');
        });
      }
    
      function setActiveLink() {
        clearActiveLinks();
        let scrollPosition = window.scrollY + window.innerHeight / 2; // Update posisi scroll untuk mencari tengah viewport
    
        document.querySelectorAll('section').forEach(section => {
          const sectionTop = section.offsetTop;
          const sectionHeight = section.offsetHeight;
          const sectionMidPoint = sectionTop + sectionHeight / 2; // Hitung titik tengah section
    
          // Cek jika scroll position berada di tengah section
          if (scrollPosition >= sectionTop && scrollPosition <= sectionTop + sectionHeight) {
            let currentId = section.getAttribute('id');
            let activeLink = document.querySelector(`.menu-link a[data-target="${currentId}"]`);
            if (activeLink) {
              activeLink.classList.add('active');
            }
          }
        });
      }
      
      window.addEventListener('scroll', setActiveLink);


    xhr.open("GET", "navigasi.php", true);
    xhr.send();
  });
