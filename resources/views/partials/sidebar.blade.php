<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="{{ url('/') }}" class="app-brand-link">
      <span class="app-brand-logo demo">
        <!-- SVG logo -->
      </span>
      <span class="app-brand-text demo menu-text fw-bolder ms-2" style="text-transform: capitalize;">Diskominfo</span>
    </a>
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>
  <div class="menu-inner-shadow"></div>
  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item">
      <a href="{{ url('/') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div>Dashboard</div>
      </a>
    </li>
    
    <!-- Pengguna -->
    <li class="menu-item">
      <a href="{{ url('/pengguna') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div>Pengguna</div>
      </a>
    </li>

 <!-- Profil -->
<li class="menu-item dropdown">
  <a href="javascript:void(0);" class="menu-link menu-toggle">
      <i class="menu-icon tf-icons bx bx-id-card"></i>
      <div>Profil</div>
  </a>
  <ul class="menu-sub">
      <li class="menu-item">
          <a href="{{ url('/profil') }}" class="menu-link">
              <div>Profil</div>
          </a>
      </li>
      <li class="menu-item">
          <a href="{{ url('/kontak') }}" class="menu-link">
              <div>Kontak</div>
          </a>
      </li>
  </ul>
</li>

<!-- Galeri -->
<li class="menu-item">
  <a href="javascript:void(0);" class="menu-link menu-toggle">
      <i class="menu-icon tf-icons bx bx-image"></i>
      <div>Galeri</div>
  </a>
  <ul class="menu-sub">
      <li class="menu-item">
          <a href="{{ url('/kategori-gambar') }}" class="menu-link">
              <div>Kategori Gambar</div>
          </a>
      </li>
      <li class="menu-item">
          <a href="{{ url('/gambar') }}" class="menu-link">
              <div>Daftar Gambar</div>
          </a>
      </li>
      <li class="menu-item">
          <a href="{{ url('/galeri/video/kategori') }}" class="menu-link">
              <div>Kategori Video</div>
          </a>
      </li>
      <li class="menu-item">
          <a href="{{ url('/video') }}" class="menu-link">
              <div>Daftar Video</div>
          </a>
      </li>
  </ul>
</li>


 <li class="menu-item">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-file"></i>
        <div>Dokumen</div>
    </a>
    <ul class="menu-sub">
        <li class="menu-item">
            <a href="{{ url('/dokumen-kategori') }}" class="menu-link">
                <div>Kategori Dokumen</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ url('/dokumen') }}" class="menu-link">
                <div>Daftar Dokumen</div>
            </a>
        </li>
    </ul>
</li>

    <!-- Berita -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-news"></i>
        <div>Berita</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="{{ url('/kategori-berita') }}" class="menu-link">
            <div>Kategori Berita</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{ url('/berita') }}" class="menu-link">
            <div>Daftar Berita</div>
          </a>
        </li>
      </ul>
    </li>

    <!-- Agenda -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-calendar-check"></i>
        <div>Agenda</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="{{ url('/agenda') }}" class="menu-link">
            <div>Agenda</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{ url('/kategori-agenda') }}" class="menu-link">
            <div>Kategori Agenda</div>
          </a>
        </li>
      </ul>
    </li>

    <!-- Informasi -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-info-circle"></i>
        <div>Informasi</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="{{ url('/informasi/agenda') }}" class="menu-link">
            <div>Agenda</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{ url('/informasi/dokumen') }}" class="menu-link">
            <div>Dokumen</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{ url('/informasi/video') }}" class="menu-link">
            <div>Video</div>
          </a>
        </li>
      </ul>
    </li>

 <!-- Pesan -->
<li class="menu-item">
    <a href="{{ url('/pesan') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-envelope"></i>
        <div>Pesan</div>
    </a>
</li>

<!-- Deskripsi Sistem -->
<li class="menu-item">
    <a href="{{ url('/deskripsi-sistem') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-info-circle"></i>
        <div>Deskripsi Sistem</div>
    </a>
</li>



    <!-- Sosial Media -->
<li class="menu-item">
    <a href="{{ url('/sosial-media') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-share-alt"></i>
        <div>Sosial Media</div>
    </a>
</li>

<li class="menu-item">
        <a href="{{ url('/bidang') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-list-ul"></i> <!-- Anda bisa mengganti ikon sesuai keinginan -->
            <div>Bidang</div>
        </a>
    </li>

  </ul>
</aside>

<script>
  document.querySelectorAll('.menu-toggle').forEach(function(toggle) {
      toggle.addEventListener('click', function(e) {
          const subMenu = this.nextElementSibling;
          subMenu.classList.toggle('collapse'); // Toggle the 'collapse' class
          subMenu.classList.toggle('show');     // Show the menu on click
      });
  });
</script>
<style>
.menu-sub.collapse {
  display: none;
}

.menu-sub.show {
  display: block;
}
</style>
