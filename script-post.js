function animateIfInView() {
    $.each($('.wow'), function(key, value) {
     if (isElementInViewport($(value))) {
      $(value).addClass('wow-in-view');
    } else {
      // (Optional) Fade out when out of view
      $(value).removeClass('wow-in-view');
    };
  });
}

window.addEventListener("load",function(){
    const loader = document.querySelector(".loader");
    loader.className += " hidden";
});