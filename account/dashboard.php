<?php
session_start();
?>
<script>
    const email = localStorage.getItem('Email');
    const dbemail = "<?php echo $_SESSION['email'] ?? ''; ?>";
    const name = "<?php echo $_SESSION['name'] ?? ''; ?>";

    if (email === dbemail) {
        localStorage.setItem('login', true);
       window.location.href = '/';
    } else {
        window.location.href = '/#login';
    }
</script>


