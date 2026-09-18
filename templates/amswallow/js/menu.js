(function ($) {
  'use strict';

  $(function () {
    var $body = $('body');
    var $html = $('html');
    var $open = $('#right-menu-open');
    var $close = $('#right-menu-close');
    var $backdrop = $('#right-menu-backdrop');

    function openMenu() {
      $body.addClass('right-menu-open');
      $html.addClass('right-menu-open');
      $open.attr('aria-expanded', 'true');
    }

    function closeMenu() {
      $body.removeClass('right-menu-open');
      $html.removeClass('right-menu-open');
      $open.attr('aria-expanded', 'false');
    }

    $open.on('click', openMenu);
    $close.on('click', closeMenu);
    $backdrop.on('click', closeMenu);

    $(document).on('keydown', function (event) {
      if (event.key === 'Escape') {
        closeMenu();
      }
    });
  });
}(jQuery));
