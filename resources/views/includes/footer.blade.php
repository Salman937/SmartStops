 <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2013 &copy; FlatLab by VectorLab.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('assets/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery.sparkline.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.js') }}" ></script>
    <script src="{{ asset('assets/js/jquery.customSelect.min.js') }}" ></script>
    <script src="{{ asset('assets/js/respond.min.js') }}" ></script>

    <!--right slidebar-->
    <script src="{{ asset('assets/js/slidebars.min.js') }}"></script>

    <!--common script for all pages-->
    <script src="{{ asset('assets/js/common-scripts.js') }}"></script>

    <!--script for this page-->
    <script src="{{ asset('assets/js/sparkline-chart.js') }}"></script>
    <script src="{{ asset('assets/js/easy-pie-chart.js') }}"></script>
    <script src="{{ asset('assets/js/count.js') }}"></script>

  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
			  autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

      $(window).on("resize",function(){
          var owl = $("#owl-demo").data("owlCarousel");
          owl.reinit();
      });

  </script>

  </body>
</html>