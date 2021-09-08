(function () {

  Drupal.behaviors.galactusStickyNav = {
    attach: function(context, settings) {
      var navbar = document.getElementById("ubc7-unit-menu");
      var unitbar = document.getElementById("ubc7-unit");
      var stickynav = navbar.offsetTop;
      var stickyunit = unitbar.offsetTop;
      var latestKnownScrollY = 0;
      var ticking = false;

      function onScroll() {
        latestKnownScrollY = window.scrollY;
        requestTick();
      }

      function requestTick() {
        if(!ticking) {
          window.requestAnimationFrame(update);
        }
        ticking = true;
      }

      function update() {
        ticking = false;
        var currentScrollY = latestKnownScrollY;

        // Toggle classes
        if (currentScrollY > stickyunit) {
          unitbar.classList.add("navigation-is-sticky");
          document.body.classList.add("unit-area-is-sticky");
          navbar.classList.add("navigation-is-sticky");
          document.body.classList.add("unit-menu-is-sticky");
        } else {
          unitbar.classList.remove("navigation-is-sticky");
          document.body.classList.remove("unit-area-is-sticky");
          navbar.classList.remove("navigation-is-sticky");
          document.body.classList.remove("unit-menu-is-sticky");
        }

      }
      // window.requestAnimationFrame(update);
      window.addEventListener('scroll', onScroll, false);
    }
  }
}());
