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
})

