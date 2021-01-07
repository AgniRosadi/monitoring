 <!-- Footer -->
 <footer class="sticky-footer bg-white">
     <div class="container my-auto">
         <div class="copyright text-center my-auto">
             <span>Copyright &copy; Lan Developer <?= date('Y'); ?></span>
         </div>
     </div>
 </footer>
 <!-- End of Footer -->

 </div>
 <!-- End of Content Wrapper -->

 </div>
 <!-- End of Page Wrapper -->

 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
     <i class="fas fa-angle-up"></i>
 </a>

 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                 <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
             </div>
         </div>
     </div>
 </div>

 <!-- Bootstrap core JavaScript-->
 <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
 <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
 <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
 <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

 <script src="<?= base_url('assets/'); ?>vendor/js/dataTables.responsive.min.js"></script>
 <script src="<?= base_url('assets/'); ?>vendor/js/responsive.bootstrap4.min.js"></script>

 <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>
 <script src="<?= base_url('assets/'); ?>chart.js/Chart.min.js"></script>
 <script src="<?= base_url('assets/'); ?>js/demo.js"></script>

 <script>
     $('#kode_kolam').change(function() {
         var kode_kolam = $("#kode_kolam").val();

         $.ajax({

             url: "<?php echo base_url('admin/kolam_aja') ?>",
             method: "post",
             data: {
                 kode_kolam: kode_kolam
             },

             success: function(data) {

                 $('#kl').html(data)
             }
         })
     });

     // Set new default font family and font color to mimic Bootstrap's default styling
     Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
     Chart.defaults.global.defaultFontColor = '#292b2c';

     // Bar Chart Example
     var ctx = document.getElementById("myBarChart");

     var myLineChart = new Chart(ctx, {
         type: 'bar',
         data: {
             labels: ["January", "February", "March", "April", "May", "June"],
             datasets: [{
                 label: "Revenue",
                 backgroundColor: "rgba(2,117,216,1)",
                 borderColor: "rgba(2,117,216,1)",
                 data: [4215, 5312, 6251, 7841, 9821, 14984],
             }],
         },
         options: {
             scales: {
                 xAxes: [{
                     time: {
                         unit: 'month'
                     },
                     gridLines: {
                         display: false
                     },
                     ticks: {
                         maxTicksLimit: 6
                     }
                 }],
                 yAxes: [{
                     ticks: {
                         min: 0,
                         max: 15000,
                         maxTicksLimit: 5
                     },
                     gridLines: {
                         display: true
                     }
                 }],
             },
             legend: {
                 display: false
             }
         }
     });

     $(function() {

         var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
         //  var data_size = [];
         //  var data_kolam = [];
         //  $.post("<?= base_url('udang.php/Grafik/getData') ?>",
         //      function(data) {

         //      var obj = JSON.parse(data);
         //      $.each(obj, function(test, item) {
         //          data_size.push(item.size);
         //          data_kolam.push(item.kode_kolam);
         //      });
         //  })
         var areaChartData = {
             labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
             datasets: [{
                     label: 'Digital Goods',
                     backgroundColor: 'rgba(60,141,188,0.9)',
                     borderColor: 'rgba(60,141,188,0.8)',
                     pointRadius: false,
                     pointColor: '#3b8bba',
                     pointStrokeColor: 'rgba(60,141,188,1)',
                     pointHighlightFill: '#fff',
                     pointHighlightStroke: 'rgba(60,141,188,1)',
                     data: [28, 48, 40, 19, 86, 27, 90]
                 },
                 {
                     label: 'Electronics',
                     backgroundColor: 'rgba(210, 214, 222, 1)',
                     borderColor: 'rgba(210, 214, 222, 1)',
                     pointRadius: false,
                     pointColor: 'rgba(210, 214, 222, 1)',
                     pointStrokeColor: '#c1c7d1',
                     pointHighlightFill: '#fff',
                     pointHighlightStroke: 'rgba(220,220,220,1)',
                     data: [65, 59, 80, 81, 56, 55, 40]
                 },
             ]
         }

         var areaChartOptions = {
             maintainAspectRatio: false,
             responsive: true,
             legend: {
                 display: false
             },
             scales: {
                 xAxes: [{
                     gridLines: {
                         display: false,
                     }
                 }],
                 yAxes: [{
                     gridLines: {
                         display: false,
                     }
                 }]
             }
         }

         // This will get the first returned node in the jQuery collection.
         var areaChart = new Chart(areaChartCanvas, {
             type: 'line',
             data: areaChartData,
             options: areaChartOptions
         })
     })
 </script>
 <script>
     ctx = document.getElementById('graph');
     var chart = new Chart(ctx, {
         type: 'line',
         data: {
             labels: [<?= implode(",", $x) ?>],
             datasets: [{
                     label: 'Realisasi Kehadiran',
                     data: [<?= implode(",", $y) ?>],
                     backgroundColor: 'rgba(12, 199, 132, 0.2)',
                     borderWidth: 1
                 },
                 {
                     label: 'Regresi Linier',
                     data: [<?= implode(",", $regresi->all) ?>],
                     backgroundColor: 'rgba(255, 99, 132, 0.2)',
                     borderWidth: 1
                 },
             ]
         }
     });
 </script>
 </body>
 <html>