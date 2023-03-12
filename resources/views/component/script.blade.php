<!-- JS Implementing Plugins -->
<script src="/assets/js/vendor.min.js"></script>

<script src="/assets/vendor/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js"></script>

<!-- JS Front -->
<script src="/assets/js/theme.min.js"></script>
<script src="/assets/js/hs.theme-appearance-charts.js"></script>

{{-- tulis text --}}
<script src="/node_modules/quill/dist/quill.min.js"></script>
<script src="/assets/js/hs.quill.js"></script>

<script src="/node_modules/flatpickr/dist/flatpickr.min.js"></script>
<script src="/assets/js/hs.flatpickr.js"></script>

<script src="/node_modules/dropzone/dist/min/dropzone.min.js"></script>
<script src="/assets/js/hs.dropzone.js"></script>

<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.js"></script>

<script>
  (function() {
    // INITIALIZATION OF DROPZONE
    // =======================================================
    HSCore.components.HSDropzone.init('.js-dropzone')
  })();
</script>

<script>
  (function() {
    // INITIALIZATION OF FLATPICKR
    // =======================================================
    HSCore.components.HSFlatpickr.init('.js-flatpickr')
  })();
</script>

<script>
  (function() {
    // INITIALIZATION OF QUILLJS EDITOR
    // =======================================================
    HSCore.components.HSQuill.init('.js-quill')
  })();
</script>


<!-- JS Plugins Init. -->
<script>
  (function() {
    // INITIALIZATION OF HEADER
    // =======================================================
    new HSHeader('#header').init()


    // INITIALIZATION OF NAV SCROLLER
    // =======================================================
    new HsNavScroller('.js-nav-scroller', {
      delay: 400,
      offset: 140
    })


    // INITIALIZATION OF LISTJS COMPONENT
    // =======================================================
    HSCore.components.HSList.init('#docsSearch');
    const docsSearch = HSCore.components.HSList.getItem('docsSearch');


    // GET JSON FILE RESULTS
    // =======================================================
    fetch('../assets/json/docs-search.json')
    .then(response => response.json())
    .then(data => {
      docsSearch.add(data)
    })


    // INITIALIZATION OF GO TO
    // =======================================================
    new HSGoTo('.js-go-to')


    // INITIALIZATION OF FLATPICKR
    // =======================================================
    HSCore.components.HSFlatpickr.init('.js-flatpickr')

    HSCore.components.HSFlatpickr.init('#js-flatpickr-disabling-dates', {
      disable: [
        function (date) {
          // return true to disable
          return (date.getDay() === 0 || date.getDay() === 6);
        }
      ]
    })
  })()
</script>

<!-- JS Plugins Init. -->
<script>
  (function() {
    localStorage.removeItem('hs_theme')

    window.onload = function () {
      

      // INITIALIZATION OF NAVBAR VERTICAL ASIDE
      // =======================================================
      new HSSideNav('.js-navbar-vertical-aside').init()


      // INITIALIZATION OF FORM SEARCH
      // =======================================================
      const HSFormSearchInstance = new HSFormSearch('.js-form-search')

      if (HSFormSearchInstance.collection.length) {
        HSFormSearchInstance.getItem(1).on('close', function (el) {
          el.classList.remove('top-0')
        })

        document.querySelector('.js-form-search-mobile-toggle').addEventListener('click', e => {
          let dataOptions = JSON.parse(e.currentTarget.getAttribute('data-hs-form-search-options')),
            $menu = document.querySelector(dataOptions.dropMenuElement)

          $menu.classList.add('top-0')
          $menu.style.left = 0
        })
      }


      // INITIALIZATION OF BOOTSTRAP DROPDOWN
      // =======================================================
      HSBsDropdown.init()


      // INITIALIZATION OF CHARTJS
      // =======================================================
      HSCore.components.HSChartJS.init('.js-chart')


      // INITIALIZATION OF CHARTJS
      // =======================================================
      HSCore.components.HSChartJS.init('#updatingBarChart')
      const updatingBarChart = HSCore.components.HSChartJS.getItem('updatingBarChart')

      // Call when tab is clicked
      document.querySelectorAll('[data-bs-toggle="chart-bar"]').forEach(item => {
        item.addEventListener('click', e => {
          let keyDataset = e.currentTarget.getAttribute('data-datasets')

          const styles = HSCore.components.HSChartJS.getTheme('updatingBarChart', HSThemeAppearance.getAppearance())

          if (keyDataset === 'lastWeek') {
            updatingBarChart.data.labels = ["Apr 22", "Apr 23", "Apr 24", "Apr 25", "Apr 26", "Apr 27", "Apr 28", "Apr 29", "Apr 30", "Apr 31"];
            updatingBarChart.data.datasets = [
              {
                "data": [120, 250, 300, 200, 300, 290, 350, 100, 125, 320],
                "backgroundColor": styles.data.datasets[0].backgroundColor,
                "hoverBackgroundColor": styles.data.datasets[0].hoverBackgroundColor,
                "borderColor": styles.data.datasets[0].borderColor,
                "maxBarThickness": 10
              },
              {
                "data": [250, 130, 322, 144, 129, 300, 260, 120, 260, 245, 110],
                "backgroundColor": styles.data.datasets[1].backgroundColor,
                "borderColor": styles.data.datasets[1].borderColor,
                "maxBarThickness": 10
              }
            ];
            updatingBarChart.update();
          } else {
            updatingBarChart.data.labels = ["May 1", "May 2", "May 3", "May 4", "May 5", "May 6", "May 7", "May 8", "May 9", "May 10"];
            updatingBarChart.data.datasets = [
              {
                "data": [200, 300, 290, 350, 150, 350, 300, 100, 125, 220],
                "backgroundColor": styles.data.datasets[0].backgroundColor,
                "hoverBackgroundColor": styles.data.datasets[0].hoverBackgroundColor,
                "borderColor": styles.data.datasets[0].borderColor,
                "maxBarThickness": 10
              },
              {
                "data": [150, 230, 382, 204, 169, 290, 300, 100, 300, 225, 120],
                "backgroundColor": styles.data.datasets[1].backgroundColor,
                "borderColor": styles.data.datasets[1].borderColor,
                "maxBarThickness": 10
              }
            ]
            updatingBarChart.update();
          }
        })
      })


      // INITIALIZATION OF CHARTJS
      // =======================================================
      HSCore.components.HSChartJS.init('.js-chart-datalabels', {
        plugins: [ChartDataLabels],
        options: {
          plugins: {
            datalabels: {
              anchor: function (context) {
                var value = context.dataset.data[context.dataIndex];
                return value.r < 20 ? 'end' : 'center';
              },
              align: function (context) {
                var value = context.dataset.data[context.dataIndex];
                return value.r < 20 ? 'end' : 'center';
              },
              color: function (context) {
                var value = context.dataset.data[context.dataIndex];
                return value.r < 20 ? context.dataset.backgroundColor : context.dataset.color;
              },
              font: function (context) {
                var value = context.dataset.data[context.dataIndex],
                  fontSize = 25;

                if (value.r > 50) {
                  fontSize = 35;
                }

                if (value.r > 70) {
                  fontSize = 55;
                }

                return {
                  weight: 'lighter',
                  size: fontSize
                };
              },
              formatter: function (value) {
                return value.r
              },
              offset: 2,
              padding: 0
            }
          },
        }
      })

      // INITIALIZATION OF SELECT
      // =======================================================
      HSCore.components.HSTomSelect.init('.js-select')


      // INITIALIZATION OF CLIPBOARD
      // =======================================================
      HSCore.components.HSClipboard.init('.js-clipboard')
    }
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

  {{-- datatable export --}}
  <!-- JS Implementing Plugins -->
<script src="/node_modules/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="/node_modules/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="/node_modules/jszip/dist/jszip.min.js"></script>
<script src="/node_modules/pdfmake/build/pdfmake.min.js"></script>
<script src="/node_modules/pdfmake/build/vfs_fonts.js"></script>
<script src="/node_modules/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="/node_modules/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="/node_modules/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<script>
  (function () {
    // INITIALIZATION OF DATATABLES
    // =======================================================
    HSCore.components.HSDatatables.init('.js-datatable')
    const exportDatatable = HSCore.components.HSDatatables.getItem('exportDatatable')

    document.getElementById('export-copy').addEventListener('click', function () {
      exportDatatable.button('.buttons-copy').trigger()
    })

    document.getElementById('export-excel').addEventListener('click', function () {
      exportDatatable.button('.buttons-excel').trigger()
    })

    document.getElementById('export-csv').addEventListener('click', function () {
      exportDatatable.button('.buttons-csv').trigger()
    })

    document.getElementById('export-pdf').addEventListener('click', function () {
      exportDatatable.button('.buttons-pdf').trigger()
    })

    document.getElementById('export-print').addEventListener('click', function () {
      exportDatatable.button('.buttons-print').trigger()
    })
  })()
</script>