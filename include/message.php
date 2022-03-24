<?php
  if(isset($_GET['errmsg'])){ ?>

<script>
alert("<?php echo $_GET['errmsg']; ?>")
</script>
<?php } ?>

<?php
  if(isset($_GET['msg'])){ ?>
<script>
alert("<?php echo $_GET['msg']; ?>");
</script>
<?php } ?>