$(document).ready(function () {
  // submit register form
  $('#register-form').on('submit', function (e) {
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
          // if success, change button text to Daftar akun and enable it
          btn.html('Daftar akun').attr('disabled', false);
          // parse json response
          res = JSON.parse(res);
          
          // if res has key errors, show error message
          if (res.hasOwnProperty('errors')) {
            $('.eye-icon').css('top', '68%')
            // customize position of eye icon
            if(res.errors.hasOwnProperty('password')) $('#password').parent().find('.eye-icon').css('top', '53%')
            if(res.errors.hasOwnProperty('konfirmasi_password')) $('#konfirmasi_password').parent().find('.eye-icon').css('top', '53%')

            // remove all is-invalid class and invalid-feedback text
            $('.form-group > input').removeClass('is-invalid')
            $('.invalid-feedback').html('').css('marginTop', '0px')

            // add is-invalid class and show error message
            for (let error in res.errors) {
              $(`#${error}`).addClass('is-invalid');
              $(`#${error}`).next().html(res.errors[error]).css('marginTop', '5px');
            }
            return
          }

          // if register success, show success alert
          Swal.fire({
            icon: 'success',
            title: res.message,
            text: 'Anda akan dialihkan menuju Dasbor.',
            confirmButtonText: 'Oke, Siap',
            confirmButtonColor: '#0c0b52',
            allowOutsideClick: false,
          }).then((result) => {
            if (result.isConfirmed) {
              // if success and user click "Oke, Siap", redirect to dashboard
              window.location.href = `${baseurl}/user/${res.data}`;
            }
          })
        }, 500);
      }, 
      // if ajax request failed
      error: function (err) {
        btn.html('Daftar akun').attr('disabled', false);
        alert(err.responseText)
        alert('Terjadi kesalahan, silahkan coba lagi.')
      }
    })
  })  

  $('#login-form').on('submit', function (e) {
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
          // if success, change button text to Masuk and enable it
          btn.html('Masuk').attr('disabled', false);
          // parse json response
          res = JSON.parse(res);

          // if res status is false
          if (!res.status) {
            // default customizations
            $('.form-group > input').removeClass('is-invalid')
            $('.invalid-feedback').html('').css('marginTop', '0px')
            $('.eye-icon').css('top', '68%')

            // if res has key errors, show error message
            if (res.hasOwnProperty('errors')) {
              if(res.errors.hasOwnProperty('password')) $('#password').parent().find('.eye-icon').css('top', '53%')
              
              // add is-invalid class and show error message
              for (let error in res.errors) {
                $(`#${error}`).addClass('is-invalid');
                $(`#${error}`).next().html(res.errors[error]).css('marginTop', '5px');
              }
              return
            }

            // if login failed (credentials error), show error message in Alert danger
            $(new Alert('danger', res.message).create()).insertBefore('#login-form > .form-group:first-child')
            // reset password field
            $('#password').val('')
            $('#password').focus()
            $('#password').addClass('is-invalid')
            return
          }
          
          // if Login success, show success alert
          Swal.fire({
            icon: 'success',
            title: res.message,
            text: 'Anda akan dialihkan menuju Dasbor.',
            confirmButtonText: 'Oke, Siap',
            confirmButtonColor: '#0c0b52',
            allowOutsideClick: false,
          }).then((result) => {
            // if success and user click "Oke, Siap", redirect to dashboard
            if (result.isConfirmed) {
              window.location.href = `${baseurl}/user/${res.data}`;
            }
          })
        }, 500);
      }, 
      // if ajax request failed
      error: function (err) {
        btn.html('Masuk').attr('disabled', false);
        alert(err.responseText)
        alert('Terjadi kesalahan, silahkan coba lagi.')
      }
    })
  })  

  // show hide password function
  $('.eye-icon').on('click', function () {
    $(this).toggleClass('fa-eye fa-eye-slash')
    let type = ($(this).parent().find('input').attr('type') == 'text') ? 'password' : 'text'
    $(this).parent().find('input').attr('type', type)
  })

  // logout function
  $('.btn-logout').on('click', function (e) {
    e.preventDefault()
    Swal.fire({
      icon: 'question',
      title: 'Apakah anda yakin ingin keluar?',
      text: 'Anda akan dialihkan menuju halaman utama.',
      reverseButtons: true,
      showCancelButton: true,
      cancelButtonText: 'Batal',
      confirmButtonText: 'Yakin, Keluar',
      confirmButtonColor: '#0c0b52',
      cancelButtonColor: '#d33',
      allowOutsideClick: false,
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          icon: 'success',
          title: 'Terima Kasih!',
          text: 'Anda telah berhasil keluar.',
          allowOutsideClick: false,
          showConfirmButton: false,
        })
        setTimeout(() => {
          // redirect to logout url
          window.location.href = `${baseurl}/auth/logout`;
        }, 1250);
      }
    })
  })  
})





