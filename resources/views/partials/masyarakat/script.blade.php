<!-- JS Implementing Plugins -->
<script src="/assets/js/vendor.min.js"></script>

<!-- JS Front -->
<script src="/assets/js/theme.min.js"></script>

<script src="/assets/js/myscript.js"></script>
<script src="/node_modules/bootstrap-icons-1.10.3"></script>
<script src="/node_modules/bootstrap-icons-1.10.3/fonts"></script>



<!-- JS Plugins Init. -->
<script>
  (function() {
    // INITIALIZATION OF NAVBAR
    // =======================================================
    new HSHeader('#header').init()


    // INITIALIZATION OF GO TO
    // =======================================================
    new HSGoTo('.js-go-to')


    // TRANSFORMATION
    // =======================================================
    const $figure = document.querySelector('.js-img-comp')

    if (window.pageYOffset) {
      $figure.style.transform = `rotateY(${-18 + window.pageYOffset}deg) rotateX(${window.pageYOffset / 5}deg)`
    }

    let y = -18 + window.pageYOffset,
      x = 55 - window.pageYOffset

    const figureTransformation = function () {
      if (-18 + window.pageYOffset / 5 > 0) {
        y = 0
      }

      if (55 - window.pageYOffset / 3 < 0) {
        x = 0
      }

      y = -18 + window.pageYOffset / 5 < 0 ? -18 + window.pageYOffset / 5 : y
      x = 55 - window.pageYOffset / 3 > 0 ? 55 - window.pageYOffset / 3 : x
      $figure.style.transform = `rotateY(${y}deg) rotateX(${x}deg)`
    }

    figureTransformation()
    window.addEventListener('scroll', figureTransformation)
  })()
</script>

<!-- Style Switcher JS -->

<script>
    (function () {
      // STYLE SWITCHER
      // =======================================================
      const $dropdownBtn = document.getElementById('selectThemeDropdown') // Dropdowon trigger
      const $variants = document.querySelectorAll(`[aria-labelledby="selectThemeDropdown"] [data-icon]`) // All items of the dropdown

      // Function to set active style in the dorpdown menu and set icon for dropdown trigger
      const setActiveStyle = function () {
        $variants.forEach($item => {
          if ($item.getAttribute('data-value') === HSThemeAppearance.getOriginalAppearance()) {
            $dropdownBtn.innerHTML = `<i class="${$item.getAttribute('data-icon')}" />`
            return $item.classList.add('active')
          }

          $item.classList.remove('active')
        })
      }

      // Add a click event to all items of the dropdown to set the style
      $variants.forEach(function ($item) {
        $item.addEventListener('click', function () {
          HSThemeAppearance.setAppearance($item.getAttribute('data-value'))
        })
      })

      // Call the setActiveStyle on load page
      setActiveStyle()

      // Add event listener on change style to call the setActiveStyle function
      window.addEventListener('on-hs-appearance-change', function () {
        setActiveStyle()
      })
    })()
</script>