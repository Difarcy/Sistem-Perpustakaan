// const row = document.querySelectorAll('#dataTabel');
// row.forEach(function(event){
//     event.addEventListener('mouseover', function(e) {
//         e.target.parentElement.style.display = "none" ;
//     })
// });

function previewImage(){
    const cover = document.querySelector('#cover');
    const coverName = document.querySelector("#coverName");
    const imgPreview  = document.querySelector('#img-preview') 
    
    coverName.textContent = cover.files[0].name;
    
    const fileCover = new FileReader();
    fileCover.readAsDataURL(cover.files[0]);
    
    fileCover.onload = function(event){
        imgPreview.src = event.target.result;
    }
}

// class flash-dataBerhasil, dengan data = flashdataBerhasil
const flashdataBerhasil = $('.flash-data-berhasil').data('flashdataberhasil');
if (flashdataBerhasil){
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: flashdataBerhasil,
        });
}


const flashDataGagal = $('.flash-data-gagal').data('flashdatagagal');
console.log(flashDataGagal);
if(flashDataGagal){
    Swal.fire({
        icon: 'error',
        title: 'gagal',
        text: flashDataGagal
    });
}

// Alert Hapus data
const flashDataKonfirmasi = $('.tombol-hapus').on('click', function(event){
    // agar tidak langsung kedelete datanya
    event.preventDefault();
    // ambil link di href class ini
    const href = $(this).attr('href');
    swal.fire({
        title: 'Hapus Data',
        text: "Anda yakin ingin menghapus data ini?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Tidak',
        confirmButtonText: 'Hapus data!'
        
        // jika tombol Confirm ditekan
    }).then((result) => {
        if(result.value){
            // kembalikkan ke link yang sudah diambil tadi
            document.location.href = href;
        }
    })
});

// Alert pengembalian buku
const flashDataPengembalian = $('.tombol-pengembalian').on('click', function(event){
    // agar tidak langsung kedelete datanya
    event.preventDefault();
    // ambil link di href class ini
    const href = $('.form-pengambalian').attr('action');
    
    swal.fire({
        title: 'Pengembalian Buku',
        text: "Apakah Buku ini sudah dikembalikkan?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Tidak',
        confirmButtonText: 'Iya!'
        
        // jika tombol Confirm ditekan
    }).then((result) => {
        if(result.value){
            // Submit Form
            $('#form-pengambalian').submit();
        }
    })
});

// Alert pengembalian buku
const flashDataBayar = $('.tombol-bayar').on('click', function(event){
    // agar tidak langsung kedelete datanya
    event.preventDefault();
    // ambil link di href class ini
    const href = $('.form-pengambalian').attr('action');
    
    swal.fire({
        title: 'Pembayaran',
        text: "Apakah user ini sudah membayar denda?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Belum',
        confirmButtonText: 'Sudah'
        
        // jika tombol Confirm ditekan
    }).then((result) => {
        if(result.value){
            // Submit Form
            $('#form-pengambalian').submit();
        }
    })
});

// Sidebar collapse logic
$(document).ready(function() {
  $('#sidebarToggle').on('click', function() {
    const sidebar = $('#sidebarNav');
    sidebar.toggleClass('collapsed');
    // Simpan state di localStorage
    if (sidebar.hasClass('collapsed')) {
      localStorage.setItem('sidebar-collapsed', 'true');
      // Ganti ikon ke kanan
      $(this).find('i').removeClass('fa-angle-left').addClass('fa-angle-right');
    } else {
      localStorage.setItem('sidebar-collapsed', 'false');
      // Ganti ikon ke kiri
      $(this).find('i').removeClass('fa-angle-right').addClass('fa-angle-left');
    }
  });
  // Restore state dari localStorage
  if (localStorage.getItem('sidebar-collapsed') === 'true') {
    $('#sidebarNav').addClass('collapsed');
    $('#sidebarToggle').find('i').removeClass('fa-angle-left').addClass('fa-angle-right');
  }
});