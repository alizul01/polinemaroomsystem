import "./bootstrap";
import "flowbite";
import Swal from 'sweetalert2';

window.confirmSubmission = function (formId) {
  Swal.fire({
    title: 'Apakah anda yakin?',
    text: "Konfirmasi pengajuan anda! Anda tidak dapat mengubahnya lagi.",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: '<i class="fas fa-check"></i> Ya, saya yakin!',
  }).then((result) => {
    if (result.isConfirmed) {
      document.getElementById(formId).submit();
    }
  })
}

window.confirmDelete = function (formId) {
  Swal.fire({
    title: 'Apakah anda yakin?',
    text: "Data yang dihapus tidak dapat dikembalikan!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: '<i class="fas fa-trash"></i> Ya, saya yakin!',
  }).then((result) => {
    if (result.isConfirmed) {
      document.getElementById(formId).submit();
    }
  })
}
