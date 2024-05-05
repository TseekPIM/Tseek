(function ($) {
  "use strict";

  /*===========================================
        Índice
    01. On Load Function
    02. pré carregamento
    03. ativar menu mobile
    04. Sticky fix
    05. Scroll voltar para topo da pág
    06. Set Background Image
    07. menu lateral
    08. busca
    09. play
    10. filtro Menu
    11. posião
    12. Title Rotate
    13. passar slide
    14. intervalo dos slides
    15. Zoom na iamgem
    16. quantidade
    17. entrada de classificação
    18. Animaão
    19. Button Hove Effect
  =============================================*/


  /*---------- 01. On Load Function ----------*/  
  $(window).on('load', function () {    
    $('.preloader').hide();
  });

  /*---------- 02. pré carregamento ----------*/
  if ($('.preloader').length > 0) {
    $('.preloaderCls').each(function () {
      $(this).on('click', function (e) {
        e.preventDefault();
        $('.preloader').css('display', 'none');
      })
    });
  };



  /*---------- 03. ativar menu mobile ----------*/
  $('.mobile-menu-active').vsmobilemenu({
    menuContainer: '.vs-mobile-menu',
    expandScreenWidth: $('.mobile-menu-active').data('expand'),
    menuToggleBtn: '.vs-menu-toggle',
  });



  /*---------- 04. Sticky fix ----------*/
  var lastScrollTop = '';
  var scrollToTopBtn = '.scrollToTop'

  function stickyMenu($targetMenu, $toggleClass) {
    var st = $(window).scrollTop();
    if ($(window).scrollTop() > 600) {
      if (st > lastScrollTop) {
        $targetMenu.removeClass($toggleClass);

      } else {
        $targetMenu.addClass($toggleClass);
      };
    } else {
      $targetMenu.removeClass($toggleClass);
    };
    lastScrollTop = st;
  };
  $(window).on("scroll", function () {
    stickyMenu($('.sticky-header'), "active");
    if ($(this).scrollTop() > 400) {
      $(scrollToTopBtn).addClass('show');
    } else {
      $(scrollToTopBtn).removeClass('show');
    }
  });



  /*---------- 05. Scroll voltar para topo da pág ----------*/
  $(scrollToTopBtn).on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({
      scrollTop: 0
    }, 3000);
    return false;
  });




  /*---------- 06.Set Background Image ----------*/
  if ($('[data-bg-src]').length > 0) {
    $('[data-bg-src]').each(function () {
      var src = $(this).attr('data-bg-src');
      $(this).css({
        'background-image': 'url(' + src + ')'
      });
    });
  };





  /*---------- 07. menu lateral ----------*/
  function popupSideMenu($sideMenu, $sideMunuOpen, $sideMenuCls, $toggleCls) {
    // Sidebar Popup
    $($sideMunuOpen).on('click', function (e) {
      e.preventDefault();
      $($sideMenu).addClass($toggleCls);
    });
    $($sideMenu).on('click', function (e) {
      e.stopPropagation();
      $($sideMenu).removeClass($toggleCls)
    });
    var sideMenuChild = $sideMenu + ' > div';
    $(sideMenuChild).on('click', function (e) {
      e.stopPropagation();
      $($sideMenu).addClass($toggleCls)
    });
    $($sideMenuCls).on('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      $($sideMenu).removeClass($toggleCls);
    });
  };
  popupSideMenu('.sidemenu-wrapper', '.sideMenuToggler', '.sideMenuCls', 'show');





  /*---------- 08. busca ----------*/
  function popupSarchBox($searchBox, $searchOpen, $searchCls, $toggleCls) {
    $($searchOpen).on('click', function (e) {
      e.preventDefault();
      $($searchBox).addClass($toggleCls);
    });
    $($searchBox).on('click', function (e) {
      e.stopPropagation();
      $($searchBox).removeClass($toggleCls);
    });
    $($searchBox).find('form').on('click', function (e) {
      e.stopPropagation();
      $($searchBox).addClass($toggleCls);
    });
    $($searchCls).on('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      $($searchBox).removeClass($toggleCls);
    });
  };
  popupSarchBox('.popup-search-box', '.searchBoxTggler', '.searchClose', 'show');



  


  /*----------- 09. play  ----------*/
  /* play img view */
  $('.popup-image').magnificPopup({
    type: 'image',
    gallery: {
      enabled: true
    }
  });

  /* play video view */
  $('.popup-video').magnificPopup({
    type: 'iframe'
  });




  /*----------- 10. filtro Menu ----------*/
  $('.filter-active').imagesLoaded(function () {
    var $filter = '.filter-active',
      $filterItem = '.grid-item',
      $filterMenu = '.filter-menu-active';

    if ($($filterMenu).length > 0) {
      var $grid = $($filter).isotope({
        itemSelector: $filterItem,
        filter: '*',
        masonry: {
          
          columnWidth: $filterItem
        }
      });
  
      // filtrar itens ao clicar
      $($filterMenu).on('click', 'button', function () {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({
          filter: filterValue
        });
      });
  
      // classe menu
      $($filterMenu).on('click', 'button', function (event) {
        event.preventDefault();
        $(this).addClass('active');
        $(this).siblings('.active').removeClass('active');
      });
    };
  });





  /*----------- 11. posição ----------*/
  $.fn.indicator = function () {
    var $menu = $(this),
      $linkBtn = $menu.find('a'),
      $btn = $menu.find('button');

    $menu.append('<span class="indicator"></span>');
    var $line = $menu.find('.indicator');  
    // verificar qual botão esta disponível
    if ($linkBtn.length) {
      var $currentBtn = $linkBtn;
    } else if ($btn.length) {
      var $currentBtn = $btn
    }
    // botão remover
    $currentBtn.on('click', function (e) {
      e.preventDefault();
      $(this).addClass('active');
      $(this).siblings('.active').removeClass('active');
      linePos()
    })
    // Indicator Position
    function linePos() {
      var $btnActive = $menu.find('.active'),
        $height = $btnActive.css('height'),
        $width = $btnActive.css('width'),
        $top = $btnActive.position().top + 'px',
        $left = $btnActive.position().left + 'px';
      $line.css({
        top: $top,
        left: $left,
        width: $width,
        height: $height,
      })
    }

    if ($menu.hasClass('vs-slider-tab')) {
      var linkslide = $menu.data('asnavfor');
      $(linkslide).on('afterChange', function (event, slick, currentSlide, nextSlide) {
        setTimeout(linePos, 10)
      });
    }    
    linePos()
  }

  
  if ($('.filter-menu-style1').length) {
    $('.filter-menu-style1').indicator();
  }
  if ($('.tab-indicator').length) {
    $('.tab-indicator').indicator();
  }







  /*----------- 12. Title Rotate ----------*/
  if($('.title-rotate').length) {
    $('.title-rotate').each(function () {
      var $title = $(this);
      var $letter = $title.text().split('');
      $title.html('')
      for (var i = 0; i < $letter.length; i++) {
        $title.prepend('<span class="letter">' + $letter[i] + '</span>')
      }
    })
  }



  /*----------- 13. passar slide   ----------*/
  $.fn.vsslideTab = function(btn){
    $(this).each(function(){
      var $menu = $(this),
      slider = $menu.data('asnavfor'),
      $btn = $menu.find(btn);
      var i = 0;
      // alterar qnd clicar 
      $btn.each(function(){
        $(this).attr('data-slide-go-to', i)
        i++
        $(this).on('click', function(e){
          e.preventDefault();
          var slideno = $(this).data('slide-go-to');
          $(slider).slick('slickGoTo', slideno);
        })
      })
      // mudar a classe qnd mudar o slide
      $(slider).on('afterChange', function (event, slick, currentSlide, nextSlide) {
        $btn.removeClass('active');
        $('[data-slide-go-to=' + currentSlide + ']').addClass('active');
      });
    });
  };

  if ($('.vs-slider-tab').length) {
    $('.vs-slider-tab').vsslideTab('.tab-btn');
  }

  

  /*----------- 14. intervalo dos slides----------*/
  $("#slider-range").slider({
    range: true,
    min: 40,
    max: 600,
    values: [60, 570],
    slide: function (event, ui) {
      $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
    }
  });
  $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));
  
  
  /*----------- 15. zoom na imagem ----------*/
  if ($('.zoom-thumb').length) {
    $('.zoom-thumb').each(function(){
      $(this).on('click', function(){
        var srcSet = $(this).data('zoom-image');
        $('.zoom-img').attr('src', srcSet);
      })
    })
  }


  /*----------- 16. quantidade ----------*/
  $('.quantity-plus').each(function () {
    $(this).on('click', function () {
      var $qty = $(this).siblings(".qty-input");
      var currentVal = parseInt($qty.val());
      if (!isNaN(currentVal)) {
        $qty.val(currentVal + 1);
      }
    })
  });

  $('.quantity-minus').each(function () {
    $(this).on('click', function () {
      var $qty = $(this).siblings(".qty-input");
      var currentVal = parseInt($qty.val());
      if (!isNaN(currentVal) && currentVal > 1) {
        $qty.val(currentVal - 1);
      }
    });
  })

  /*----------- 17. entrada de classificação ----------*/
  if ($('.vs-rating-input').length > 0) {
    $('.vs-rating-input').each(function () {
      $(this).find('span').on('click', function () {
        $('.vs-rating-input span').addClass('active');
        $(this).nextAll('span').removeClass('active');
      });
    });
  };




  /*----------- 18. Animação ----------*/
  $.fn.tabAnimation = function (){
    $(this).on('hide.bs.tab', function (e) {
      var $old_tab = $($(e.target).attr("href"));
      var $new_tab = $($(e.relatedTarget).attr("href"));

      if ($new_tab.index() < $old_tab.index()) {
        $old_tab.css('position', 'relative').css("bottom", "0").show();
        $old_tab.animate({
          "bottom": "-200px"
        }, 300, function () {
          $old_tab.css("bottom", 0).removeAttr("style");
        });
      } else {
        $old_tab.css('position', 'relative').css("top", "0").show();
        $old_tab.animate({
          "top": "-200px"
        }, 300, function () {
          $old_tab.css("top", 0).removeAttr("style");
        });
      }
    });
    $(this).on('show.bs.tab', function (e) {
      var $new_tab = $($(e.target).attr("href"));
      var $old_tab = $($(e.relatedTarget).attr("href"));

      if ($new_tab.index() > $old_tab.index()) {
        $new_tab.css('position', 'relative').css("bottom", "-200px");
        $new_tab.animate({
          "bottom": "0"
        }, 500);
      } else {
        $new_tab.css('position', 'relative').css("top", "-200px");
        $new_tab.animate({
          "top": "0"
        }, 500);
      }
    });
  }
  
  $('a[data-bs-toggle="tab"]').tabAnimation();



  /*----------- 19. Button Hove Effect ----------*/
  $.fn.hoverClass = function(element, eleClass){
    $(this).each(function(){
      $(this).on('mouseenter', function () {
        $(element).addClass(eleClass);
      }).on('mouseleave', function () {
        $(element).removeClass(eleClass);
      })
    })
  };
  
  $('.vs-btn:not(.style3), .ls-arrow, .slick-arrow').hoverClass('.vs-cursor, .vs-cursor2', 'style2');



  /*----------- 20. Hero Slider Active ----------*/

  $('.vs-hero-carousel').each(function () {
    var vsHslide = $(this);

    function d(data) {
      return vsHslide.data(data)
    }


    //  personalisar style   
    vsHslide.on('sliderWillLoad', function (event, slider) {

      // Definir a variável
      var respLayer = jQuery(this).find('.ls-responsive'),
        lsDesktop = 'ls-desktop',
        lsLaptop = 'ls-laptop',
        lsTablet = 'ls-tablet',
        lsMobile = 'ls-mobile',
        windowWid = jQuery(window).width(),
        lgDevice = 1025,
        mdDevice = 993,
        smDevice = 768;

      // definir estilos em camadas
      respLayer.each(function () {
        var layer = jQuery(this);

        function lsd(data) {
          return (layer.data(data) === '') ? layer.data(null) : layer.data(data);
        }
        var respStyle = (windowWid < smDevice) ? lsd(lsMobile) : ((windowWid < mdDevice ? lsd(lsTablet) : ((windowWid < lgDevice) ? lsd(lsLaptop) : lsd(lsDesktop)))),
          mainStyle = (layer.attr('style') !== undefined) ? layer.attr('style') : ' ';
        layer.attr('style', mainStyle + respStyle);
      });

    });


    vsHslide.layerSlider({
      allowRestartOnResize: true,
      maxRatio: (d('maxratio') ? d('maxratio') : 1),
      type: (d('slidertype') ? d('slidertype') : 'responsive'),
      pauseOnHover: (d('pauseonhover') ? true : false),
      navPrevNext: (d('navprevnext') ? true : false),
      hoverPrevNext: (d('hoverprevnext') ? true : false),
      hoverBottomNav: (d('hoverbottomnav') ? true : false),
      navStartStop: (d('navstartstop') ? true : false),
      navButtons: (d('navbuttons') ? true : false),
      loop: ((d('loop') == false) ? false : true),
      autostart: (d('autostart') ? true : false),
      height: (($(window).width() < 767) ? (d('sm-height') ? d('sm-height') : d('height')) : (d('height') ? d('height') : 1080)),
      responsiveUnder: (d('responsiveunder') ? d('responsiveunder') : 1220),
      layersContainer: (d('container') ? d('container') : 1220),
      showCircleTimer: (d('showcircletimer') ? true : false),
      skinsPath: 'layerslider/skins/',
      thumbnailNavigation: ((d('thumbnailnavigation') == false) ? false : true)
    });

    vsHslide.find('[data-ls-go]').each(function () {
      $(this).on('click', function (e) {
        e.preventDefault();
        var target = $(this).data('ls-go');
        vsHslide.layerSlider(target)
      });
    });

    

  });

  
  /*----------- 21. contador ----------*/
  $('.counter-number').each(function(){
    var counter = $(this);
    var text = counter.html().split('');
    counter.html('');    
    for (var i = 0; i < text.length; i++) {
      var digit = '<span class="digit">' + text[i] + '</span>'
      counter.append(digit)
    }
  })
  
  
  /*----------- 22. animaão de slide ----------*/
  $.fn.slickHero = function (){
    var slider = $(this);

    $('[data-ani-duration]').each(function () {
      var durationTime = $(this).data('ani-duration');
      $(this).css('animation-duration', durationTime);
    });
  
    $('[data-ani-delay]').each(function () {
      var delayTime = $(this).data('ani-delay');
      $(this).css('animation-delay', delayTime);
    });
  
    $('[data-ani]').each(function () {
      var animaionName = $(this).data('ani');
      $(this).addClass(animaionName);
      $('.slick-current [data-ani]').addClass('animated');
    });
  
    $('.vs-carousel').on('afterChange', function (event, slick, currentSlide, nextSlide) {
      $('[data-ani]').removeClass('animated');
      $('.slick-current [data-ani]').addClass('animated');
    });
  }

  if($('.hero-slick').length) {
    $('.hero-slick').slickHero();
  }
  
  // login
  $(".info-item .btn").click(function () {
    $(".container").toggleClass("log-in");
  });
  $(".container-form .btn").click(function () {
    $(".container").addClass("active");
  });
  


})(jQuery);