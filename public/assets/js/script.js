$(document).ready(function () {

  $(window).scroll(function () {
    if ($(this).scrollTop() > 20) {
      $('header').css('border-top-left-radius', '0px')
      $('header').css('border-top-right-radius', '0px')

      if ((window.location.pathname.includes('auth'))) {
        $('.navbar > a.nav-link').css('backgroundColor', '#0c0b52')
      }

    } else {
      $('header').css('border-top-left-radius', '10px')
      $('header').css('border-top-right-radius', '10px')

      if ((window.location.pathname.includes('auth'))) {
        $('.navbar > a.nav-link').css('backgroundColor', 'transparent')
      }
    }

    if (window.location.href == 'http://localhost:8080/pilihanku/public/' || window.location.href.includes('#features')) {
      if ($(this).scrollTop() >= 450) {
        $('.navbar > a.nav-link').css('backgroundColor', '#0c0b52')
      } else {
        $('.navbar > a.nav-link').css('backgroundColor', 'transparent')
      }
    }

  })

  if (window.scrollY >= 450) $('.navbar > a.nav-link').css('backgroundColor', '#0c0b52')
  

  // submit change password form
  $('#changepass-form').on('submit', function (e) {
    // prevent default action
    e.preventDefault();
    // initialize variables
    let form = $(this);
    let url = form.attr('action');
    let data = form.serializeArray();
    let btn = form.find('button[type="submit"]');
    // change button text to loading and disable it
    btn.html('<i class="fa fa-spinner fa-spin"></i> Loading...').attr('disabled', true);

    // send ajax request
    $.ajax({
      url: url,
      type: 'POST',
      data: data,
      success: function (res) {
        setTimeout(() => {
          // if success, change button text to Ganti and enable it
          btn.html('Ganti').attr('disabled', false);
          // parse json response
          console.log(res)
          res = JSON.parse(res);
          
          // if res status is false
          if (!res.status) {
            // default customizations
            if($('.alert').length > 0) $('.alert').remove()
            $('.form-group > input').removeClass('is-invalid')
            $('.invalid-feedback').html('').css('marginTop', '0px')
            $('.eye-icon').css('top', '68%')

            // if res has key errors, show error input message
            if (res.hasOwnProperty('errors')) {
              // customize position of eye icon
              if (res.errors.hasOwnProperty('password_lama')) $('#password_lama').parent().find('.eye-icon').css('top', '53%')
              if (res.errors.hasOwnProperty('password_baru')) $('#password_baru').parent().find('.eye-icon').css('top', '53%')
              if (res.errors.hasOwnProperty('konfirmasi_password_baru')) $('#konfirmasi_password_baru').parent().find('.eye-icon').css('top', '53%')
            
              // add is-invalid class and show error message
              for (let error in res.errors) {
                $(`#${error}`).addClass('is-invalid');
                $(`#${error}`).next().html(res.errors[error]).css('marginTop', '5px');
                $(`#${error}`).val('')
              }
              return
            }

            // show error message
            $(new Alert('danger', res.message).create()).insertBefore('#changepass-form > .form-group:first-child')
            // clear all input value
            $('.form-group > input').val('')
            $(`#${res.data}`).addClass('is-invalid').focus()
            return
          }
          
          // if change password success
          window.location.href = `${baseurl}/user/${res.data}`
          
        }, 500);
      }, 
      // if ajax request failed
      error: function (err) {
        btn.html('Ganti').attr('disabled', false);
        alert(err.responseText)
        alert('Terjadi kesalahan, silahkan coba lagi.')
      }
    })
  })  

  $('#profile').on('change', function(event) {
    const reader = new FileReader();
    const preview = $('.preview-img > img');
    const ext = ['jpg', 'jpeg', 'png', 'svg', 'webp'];
    reader.readAsDataURL(event.target.files[0]);
    reader.onload = function (e) {
      $(preview).attr('src', e.target.result);

      if (!ext.includes(event.target.files[0].name.split('.').pop())) {
        $(preview).attr('alt', event.target.files[0].name + ' bukan gambar');
      } else {
        $(preview).attr('alt', 'user profile image');
      }

      $('.modal-img-content > img').attr('src', e.target.result);
    };
  });

  $('.btn-delete-profile').on('click', function () {
    Swal.fire({
      title: 'Hapus foto profil',
      text: 'Apakah anda yakin ingin menghapus foto profil anda?',
      icon: 'question',
      reverseButtons: true,
      showCancelButton: true,
      cancelButtonText: 'Batal',
      confirmButtonText: 'Yakin, Hapus!',
      confirmButtonColor: '#0c0b52',
      cancelButtonColor: '#d33',
      allowOutsideClick: false,
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = `${baseurl}/user/delete_profile_img`
      }
    })
  })

  $('.clicked-img').on('click', function () {
    $('.modal-img-content img').attr('src', $(this).attr('src'))
    $('.modal-img-overlay').css('display', 'flex')
  })

  $('#editprofile-form').on('submit', function (e) {
    // prevent default action
    e.preventDefault();
    // initialize variables
    let form = $(this);
    let url = form.attr('action');
    let data = new FormData(form[0]);
    let btn = form.find('button[type="submit"]');
    // change button text to loading and disable it
    btn.html('<i class="fa fa-spinner fa-spin"></i> Loading...').attr('disabled', true);
    
    // send ajax request
    $.ajax({
      url: url,
      type: 'POST',
      data: data,
      enctype: 'multipart/form-data',
      cache: false,
      contentType: false,
      processData: false,
      success: function (res) {
        setTimeout(() => {
          // if success, change button text to Ganti and enable it
          btn.html('Edit').attr('disabled', false);
          // parse json response
          res = JSON.parse(res);
          console.log(res)
          
          // if res status is false
          if (!res.status) {
            // default customizations
            $('.form-group > input').removeClass('is-invalid')
            $('.invalid-feedback').html('').css('marginTop', '0px')
  
            // if res has key errors, show error input message
            if (res.hasOwnProperty('errors')) {  
              // add is-invalid class and show error message
              for (let error in res.errors) {
                $(`#${error}`).addClass('is-invalid');
                $(`#${error}`).next().html(res.errors[error]).css('marginTop', '5px');
                $(`#${error}`).val('')
              }

              // if res has key data, show preview image
              if (res.hasOwnProperty('data')) $('.preview-img > img').attr('src', `${baseurl}/assets/images/profile-images/${res.data}`)
              return
            }
          }
          
          // if edit profile success
          window.location.href = `${baseurl}/user/${res.data}`
        }, 500);
      }, 
      // if ajax request failed
      error: function (err) {
        btn.html('Edit').attr('disabled', false);
        alert(err.responseText)
        alert('Terjadi kesalahan, silahkan coba lagi.')
      }
    })
  })
})

