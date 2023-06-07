$(document).ready(function () {


  $('#register-form').on('submit', function (e) {
    e.preventDefault();
    let form = $(this);
    let url = form.attr('action');
    let data = form.serializeArray();
    let btn = form.find('button[type="submit"]');
    btn.html('<i class="fa fa-spinner fa-spin"></i> Loading...').attr('disabled', true);
    $.ajax({
      url: url,
      type: 'POST',
      data: data,
      success: function (res) {
        setTimeout(() => {
          btn.html('Daftar akun').attr('disabled', false);
          res = JSON.parse(res);
          
          if (res.hasOwnProperty('errors')) {
            $('.eye-icon').css('top', '68%')

            if(res.errors.hasOwnProperty('password')) $('#password').parent().find('.eye-icon').css('top', '53%')
            if(res.errors.hasOwnProperty('konfirmasi_password')) $('#konfirmasi_password').parent().find('.eye-icon').css('top', '53%')

            $('.form-group > input').removeClass('is-invalid')
            $('.invalid-feedback').html('').css('marginTop', '0px')
            for (let error in res.errors) {
              $(`#${error}`).addClass('is-invalid');
              $(`#${error}`).next().html(res.errors[error]).css('marginTop', '5px');
            }
            return
          }

          Swal.fire({
            icon: 'success',
            title: res.data,
            text: 'Anda akan dialihkan menuju Dasbor.',
            confirmButtonText: 'Oke, Siap',
            confirmButtonColor: '#0c0b52',
            allowOutsideClick: false,
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = `${baseurl}/user/${res.code}`;
            }
          })
        }, 500);
      }
    })
  })  

  $('.eye-icon').on('click', function () {
    
    $(this).toggleClass('fa-eye fa-eye-slash')
    let type = ($(this).parent().find('input').attr('type') == 'text') ? 'password' : 'text'
    $(this).parent().find('input').attr('type', type)
  
  })


})