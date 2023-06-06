<?php
	$data = "1;alert('xss');";
?>
<script>
    var data = <?php echo $data ?>;
</script>