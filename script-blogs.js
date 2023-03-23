window.addEventListener("load",function(){
    const loader = document.querySelector(".loader");
    loader.className += " hidden";
});

$(function () {
    $(document).scroll(function () {
      var $nav = $(".navbar-change");
      $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    });
  });