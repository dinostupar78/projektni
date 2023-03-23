window.addEventListener("load",function(){
    const loader = document.querySelector(".loader");
    loader.classNqme += " hidden";
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

$(function () {
    $(document).scroll(function () {
      var $nav = $(".navbar-change");
      $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    });
  });