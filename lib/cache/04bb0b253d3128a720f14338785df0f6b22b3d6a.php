<?php if(isset($_SESSION['Messages']['success'])): ?>
    
    
    
    <script>setTimeout(function() {
            swal.fire({
                icon: "success",
                title: "Sucesso!",
                text: "<?php echo e($_SESSION['Messages']['success']); ?>",
                timer: 5000,
                showConfirmButton: false
            });
        }, 500);</script>
<?php endif; ?>

<?php if(isset($_SESSION['Messages']['warning'])): ?>
    
    
    
    <script>setTimeout(function() {
            swal.fire({
                icon: "warning",
                title: "Atenção!",
                text: "<?php echo e($_SESSION['Messages']['warning']); ?>",
                timer: 5000,
                showConfirmButton: false
            });
        }, 500);</script>
<?php endif; ?>

<?php if(isset($_SESSION['Messages']['error'])): ?>
    
    
    
    <script>setTimeout(function() {
            swal.fire({
                icon: "error",
                title: "Ops!",
                text: "<?php echo e($_SESSION['Messages']['error']); ?>",
                timer: 5000,
                showConfirmButton: false
            });
        }, 500);</script>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\login\views/templates/flash_msg.blade.php ENDPATH**/ ?>