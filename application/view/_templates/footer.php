
        </div>
        </div>

        <!-- /page content -->
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo URL;?>Admin/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo URL; ?>js/editUser.js"></script>
    <script src="<?php echo URL; ?>js/editLodging.js"></script>
    <script src="<?php echo URL; ?>js/editBooking.js"></script>
    <script src="<?php echo URL; ?>js/editClients.js"></script>
    <script src="<?php echo URL; ?>js/editPaymentBooking.js"></script>
    <script src="<?php echo URL; ?>js/editPaymentDirect.js"></script>
    <script src="<?php echo URL; ?>js/editCheckIn.js"></script>
    <!-- llamar al seewalet -->
     <script>
      $(document).ready(function(){
        <?php 
          if(isset($_SESSION['alert']) != false && $_SESSION['alert'] != null){
            echo $_SESSION['alert'];
            $_SESSION['alert'] = null;
          }
        ?>
      })
     </script>
    <!-- Bootstrap -->
   <script src="<?php echo URL;?>Admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo URL;?>Admin/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo URL;?>Admin/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo URL;?>Admin/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="<?php echo URL;?>Admin/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- morris.js -->
    <script src="<?php echo URL;?>Admin/vendors/raphael/raphael.min.js"></script>
    <script src="<?php echo URL;?>Admin/vendors/morris.js/morris.min.js"></script>
    <!-- gauge.js -->
    <script src="<?php echo URL;?>Admin/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo URL;?>Admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo URL;?>Admin/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?php echo URL;?>Admin/vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo URL;?>Admin/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo URL;?>Admin/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo URL;?>Admin/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo URL;?>Admin/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo URL;?>Admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo URL;?>Admin/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo URL;?>Admin/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo URL;?>Admin/vendors/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo URL;?>Admin/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo URL;?>Admin/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo URL;?>Admin/build/js/custom.min.js"></script>


    <!-- Datatables -->
    <script src="<?php echo URL;?>Admin/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo URL;?>Admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo URL;?>Admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo URL;?>Admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo URL;?>Admin/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo URL;?>Admin/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo URL;?>Admin/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo URL;?>Admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo URL;?>Admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo URL;?>Admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo URL;?>Admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo URL;?>Admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>

        <!-- bootstrap-daterangepicker -->
    <script src="<?php echo URL;?>Admin/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo URL;?>Admin/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
  </body>
</html>