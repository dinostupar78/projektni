window.addEventListener("load", function () {
  const loader = document.querySelector(".loader");
  loader.className += " hidden";
});

function animateIfInView() {
  $.each($('.wow'), function (key, value) {
    if (isElementInViewport($(value))) {
      $(value).addClass('wow-in-view');
    } else {
      // (Optional) Fade out when out of view
      $(value).removeClass('wow-in-view');
    };
  });
}

// http://stackoverflow.com/a/7557433/5628
function isElementInViewport(el) {

  //special bonus for those using jQuery
  if (typeof jQuery === "function" && el instanceof jQuery) {
    el = el[0];
  }

  var rect = el.getBoundingClientRect();

  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && /*or $(window).height() */
    rect.right <= (window.innerWidth || document.documentElement.clientWidth) /*or $(window).width() */
  );
}

$(function () {
  $(document).scroll(function () {
    var $nav = $(".navbar-change");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
  });
});