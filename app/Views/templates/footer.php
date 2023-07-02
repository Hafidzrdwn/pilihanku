</div>
<footer class="p-30 bg-secondary text-primary text-center fs-18 fw-semibold">
  <p class="footer-text">
    &copy; 2023 PilihanKu | All Rights Reserved
  </p>
</footer>
</div>
<?php if (isset($_SESSION['isLogin'])) : ?>
  <div class="modal-img-overlay">
    <div class="modal-img-content">
      <img src="<?= BASEURL . '/assets/images/profile-images/' . $_SESSION['user_auth']['profile']; ?>" alt="user profile image">
    </div>
    <button type="button" class="close-modal" onclick="return this.parentElement.style.display = 'none'">&times;</button>
  </div>
<?php endif; ?>
<script>
  const baseurl = "<?= BASEURL; ?>";
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js "></script>
<script src="https://kit.fontawesome.com/2e160f1ac0.js" crossorigin="anonymous"></script>
<script src="<?= BASEURL; ?>/assets/js/script.js?v=<?php echo time(); ?>"></script>
<script src="<?= BASEURL; ?>/assets/js/auth.js?v=<?php echo time(); ?>"></script>
<script src="<?= BASEURL; ?>/assets/js/voting.js?v=<?php echo time(); ?>"></script>
<script src="<?= BASEURL; ?>/assets/js/utils/Alert.js?v=<?php echo time(); ?>"></script>
</body>

</html>