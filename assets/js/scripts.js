(function($) {
  $(document).ready(function() {
    var parallax = function(el, coefX, coefY) {
      var prevX;
      var prevY;
      var x;
      var y;
      var currentX;
      var currentY;
      var diffX;
      var diffY;
      //var coef = 25;
      $(document).mouseenter(function(e) {
        prevX = e.clientX;
        prevY = e.clientY;
      });
      if ($(el).length) {
        $(document).on("mousemove", function(e) {
          x = e.clientX;
          y = e.clientY;
          diffX = (prevX - x) / coefX;
          diffY = (prevY - y) / coefY;
          if ($(el).css("left")) {
            currentX = $(el)
              .css("left")
              .split("px")[0];
            currentY = $(el)
              .css("bottom")
              .split("px")[0];
          }
          prevX = x;
          prevY = y;
          $(el).css({
            left: currentX - diffX + "px",
            bottom: currentY - diffY + "px"
          });
        });
      }
    };
    parallaxLoad = true;

    parallax(".header-dot_one", 25, -35);
    parallax(".header-dot_two", -35, 20);
    parallax(".header-dot_three", 30, -25);
    parallax(".header-dot_four", -25, 40);
    parallax(".header-dot_five", 30, -30);
    parallax(".header-dot_six", 40, 40);

    $(".fancybox").fancybox({
      loop: true
    });

    function fixedHeader() {
      if ($(".header").hasClass("header-inner")) {
        var gap = 0;
      } else {
        var gap = 18;
      }
      if ($(window).scrollTop() > gap + 12) {
        $(".header-top").addClass("fixed");
      } else {
        $(".header-top").removeClass("fixed");
      }
    }
    fixedHeader();
    $(window).scroll(fixedHeader);

    $(".header-arrow").on("click", function(e) {
      var anchor = $(this);
      $("html, body")
        .stop()
        .animate(
          {
            scrollTop: $(anchor.attr("href")).offset().top - 0
          },
          777
        );
      e.preventDefault();
      return false;
    });

    $(".header-slider").slick({
      autoplay: false,
      infinite: true,
      dots: true,
      arrows: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      swipeToSlide: true,
      swipe: true,
      responsive: [
        {
          breakpoint: 970,
          settings: {
            dots: false
          }
        },
        {
          breakpoint: 620,
          settings: {
            dots: false
          }
        }
      ]
    });

    function sliderCounter() {
      $(".header-slider .header-slider-counter").detach();
      var dotsCount = $(".header-slider .slick-dots li").length;
      var paddingRight =
        $(".header-slider .slick-dots li").outerWidth(true) * dotsCount + 15;
      var allCountSlider = $(".header-slider .slick-slide:not(.slick-cloned)")
        .length;
      var i = $(".header-slider .slick-current").data("slick-index");
      var slideIndex = i + 1;
      $(".header-slider").prepend(
        "<div class='header-slider-counter'><div class='header-slider-counter__current'>" +
          slideIndex +
          "</div><span>/</span><div class='header-slider-counter__all'>" +
          allCountSlider +
          "</div></div>"
      );
      $(".header-slider-counter").css({ paddingRight: paddingRight + "px" });
    }

    $(".header-slider").on("afterChange", function(event, slick, currentSlide) {
      sliderCounter();
    });
    sliderCounter();

    $(".menu-selector").on("click", function() {
      $(".header").toggleClass("opened");
    });

    $(".services-block-item__selector").on("click", function() {
      $(this)
        .parent(".services-block-item")
        .toggleClass("active");
      $(this)
        .parent(".services-block-item")
        .find(".services-block-item__info")
        .slideToggle(400);
    });

    $(".accordion-block-item__title").on("click", function() {
      $(this)
        .parent(".accordion-block-item")
        .toggleClass("active");
      $(this)
        .parent(".accordion-block-item")
        .find(".accordion-block-item__text")
        .slideToggle(400);
    });

    /* Открытые модального окна */
    $(".go-to-modal").on("click", function() {
      var target = $(this).data("target");
      $("#" + target).slideDown(400);
      $(".fakemenu-overlay").show();
    });

    /* Закрытые модального окна */
    $(".modal-close").on("click", function() {
      $(".modal-form").slideUp(400);
      $(".fakemenu-overlay").hide();
    });
    $(".fakemenu-overlay").on("click", function() {
      $(this).hide();
      $(".modal-form").slideUp(400);
    });

    $(".header-menu a").on("click", function() {
      $(".header").removeClass("opened");
    });

    /* Обработка файла начало */
    $(".vacancy-block-form__file input[type=file]").change(function(e) {
      handleFiles(this.files);
    });

    function handleFiles(files) {
      [...files].forEach(uploadFile);
    }

    function uploadFile(file) {
      $(".vacancy-block-form__file__loaded span").text(file.name);
      $(".vacancy-block-form__file__loaded").addClass("active");
    }

    $(".vacancy-block-form__file__remove").on("click", function() {
      $(".vacancy-block-form__file__loaded").removeClass("active");
      $(".vacancy-block-form__file input[type=file]").val("");
    });
    /* Обработка файла конец */
  });
})(jQuery);
