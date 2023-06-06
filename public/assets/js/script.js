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
})

if(window.scrollY >= 450) $('.navbar > a.nav-link').css('backgroundColor', '#0c0b52')
