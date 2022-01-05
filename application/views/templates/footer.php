</div>
</div>
</div>
<?php if (isset($_SESSION['notifikasi'])) { ?>
  <script type="text/javascript">
    toastr.options.closeButton = true;
    toastr.<?= $_SESSION['warna'] ?>('<?= $_SESSION['judul'] ?>', '<?= $_SESSION['pesan'] ?>');
  </script>
<?php } ?>
<footer>
  <div class="pull-right">
    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
  </div>
  <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

<!-- Bootstrap -->
<script src="<?= base_url() ?>vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?= base_url() ?>vendors/nprogress/nprogress.js"></script>

<!-- Datatables -->
<script src="<?= base_url() ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url() ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?= base_url() ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= base_url() ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?= base_url() ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?= base_url() ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?= base_url() ?>vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="<?= base_url() ?>vendors/jszip/dist/jszip.min.js"></script>
<script src="<?= base_url() ?>vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url() ?>vendors/pdfmake/build/vfs_fonts.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?= base_url() ?>/build/js/custom.min.js"></script>
</body>

</html>