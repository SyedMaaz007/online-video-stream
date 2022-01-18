<script src="vendor/jquery/jquery-3.5.1.min.js">
	
</script><script src="vendor/jquery/sweetalert2.all.min.js"></script>


<?php
if(isset($_SESSION['status']) && $_SESSION['status'] != '')
{
?>
<script>
Swal.fire({icon: '<?php echo $_SESSION['code']; ?>',title: '<?php echo $_SESSION['status']; ?>',showConfirmButton: true});
</script>
<?php
unset($_SESSION['status']);
unset($_SESSION['code']);
}
?>