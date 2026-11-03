(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();

    // Initiate WOW.js
    new WOW().init();

    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });

    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 150, 'easeInOutExpo');
        return false;
    });

    // Initialize Owl Carousels
    $(".services-carousel").owlCarousel({
        autoplay: false,
        smartSpeed: 1000,
        center: false,
        dots: false,
        loop: true,
        margin: 50,
        nav: true,
        navText: [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsiveClass: true,
        responsive: {
            0: { items: 1 },
            768: { items: 2 },
            992: { items: 3 }
        }
    });

    // Team carousel
    $(".team-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        center: false,
        dots: false,
        loop: true,
        margin: 50,
        nav: true,
        navText: [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsiveClass: true,
        responsive: {
            0: { items: 1 },
            768: { items: 2 },
            992: { items: 3 }
        }
    });

    // Testimonial carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        center: true,
        dots: true,
        loop: true,
        margin: 0,
        nav: true,
        navText: false,
        responsiveClass: true,
        responsive: {
            0: { items: 1 },
            576: { items: 1 },
            768: { items: 2 },
            992: { items: 3 }
        }
    });

    // Client carousel
    $(".client-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        center: false,
        dots: false,
        loop: true,
        margin: 50,
        nav: true,
        navText: [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsiveClass: true,
        responsive: {
            0: { items: 1 },
            576: { items: 2 },
            768: { items: 3 },
            992: { items: 4 },
            1200: { items: 4 }
        }
    });

    // Fact Counter
    $(document).ready(function () {
        $('.counter-value').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 2000,
                easing: 'easeInQuad',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    });

    // Function to scroll to the contact section
    function scrollToContact() {
        $('html, body').animate({
            scrollTop: $('#contact').offset().top
        }, 1000); // Duration in milliseconds
    }

  
   function scrollToContact() {
        $('html, body').animate({
            scrollTop: $('#training').offset().top
        }, 1000); // Duration in milliseconds
    }

    

    /*==========  Contact Form validation  ==========*/
    var contactResult = $('.contact-result');

    $("#contactForm1").validate({
        debug: false,
        submitHandler: function (form) {
            $(contactResult).html('Please Wait...');

            $.ajax({
                type: "POST",
                url: $(form).attr('action'),
                data: $(form).serialize(),
                timeout: 20000,
                success: function () {
                    $(contactResult).html('<div class="alert alert-success" role="alert"><strong>Thank you. We will contact you shortly.</strong></div>').delay(3000).fadeOut(2000);
                    $(form).trigger('reset');
                    history.replaceState(null, null, '#contact-form');
                    scrollToContact();
                },
                error: function () {
                    $(contactResult).html('<div class="alert alert-danger" role="alert"><strong>There was an error. Please try again.</strong></div>').delay(3000).fadeOut(2000);
                    history.replaceState(null, null, '#contact-form');
                    scrollToContact();
                }
            });
            return false;
        }
    });

    /*==========  Request Quote Form validation  ==========*/
    $("#contactForm2").validate({
        debug: false,
        submitHandler: function (form) {
            $(contactResult).html('Please Wait...');
            $.ajax({
                type: "POST",
                url: $(form).attr('action'),
                data: $(form).serialize(),
                timeout: 20000,
                success: function () {
                    $(contactResult).html('<div class="alert alert-success" role="alert"><strong>Thank you. We will contact you shortly.</strong></div>').delay(3000).fadeOut(2000);
                    $(form).trigger('reset');
                    history.replaceState(null, null, '#contact');
                    scrollToContact();
                },
                error: function () {
                    $(contactResult).html('<div class="alert alert-danger" role="alert"><strong>There was an error. Please try again.</strong></div>').delay(3000).fadeOut(2000);
                    history.replaceState(null, null, '#contact');
                    scrollToContact();
                }
            });
            return false;
        }
    });
 /*=========Training Detail Form Validation ======*/
  $("#contactForm4").validate({
        debug: false,
        submitHandler: function (form) {
            $(contactResult).html('Please Wait...');
            $.ajax({
    type: "POST",
    url: "{{ route('saveTraining') }}",
    data: $(form).serialize(),
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    timeout: 20000,
    success: function (response) {
        $(contactResult).html('<div class="alert alert-success" role="alert"><strong>Thank you. We will contact you shortly.</strong></div>').delay(3000).fadeOut(2000);
        $(form).trigger('reset');
        history.replaceState(null, null, '#training');
        scrollToContact();
    },
    error: function (xhr) {
        console.log(xhr.responseText); // Check for error details
        $(contactResult).html('<div class="alert alert-danger" role="alert"><strong>There was an error. Please try again.</strong></div>').delay(3000).fadeOut(2000);
        history.replaceState(null, null, '#training');
        scrollToContact();
    }
});

            return false;
        }
    });
  
    var contactForm = $("#contactForm3"),
        contactResult = $('.contact-result');

    contactForm.validate({
        debug: false,
        submitHandler: function (form) {
            $(contactResult).html('Please Wait...');

            $.ajax({
                type: "POST",
                url: contactForm.attr('action'),
                data: new FormData(form),
                contentType: false,
                processData: false,
                timeout: 20000,
                success: function (msg) {
                    $(contactResult).html('<div class="alert alert-success" role="alert"><strong>Thank you. We will contact you shortly.</strong></div>');
                    contactForm[0].reset();
                    setTimeout(function () {
                        $(contactResult).fadeOut(2000);
                    }, 3000);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $(contactResult).html('<div class="alert alert-danger" role="alert"><strong>There was an error processing your request. Please try again later.</strong></div>');
                }
            });
            return false;
        }
    });

    $(document).ready(function () {
        if (window.location.hash === '#contact') {
            scrollToContact();
        }
    });

    $(document).ready(function () {
        if (window.location.hash === '#contact-form') {
            scrollToContact();
        }
    });

   $(document).ready(function () {
        if (window.location.hash === '#training') {
            scrollToContact();
        }
    });
  
  
  
})(jQuery);
