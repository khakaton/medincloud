<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php echo getFavicons(); ?>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  <title>Builder</title>

  <!-- Scripts -->

  <script>
    window.ALTRP_DEBUG = <?php echo json_encode( ! ! get_altrp_setting( 'altrp_debug', false ) ); ?>;
    window.altrpMenus = [];
    let _token = '<?php echo e(csrf_token()); ?>';
  </script>
  <?php if( env( 'ALTRP_SETTING_ADMIN_LOGO' ) ): ?>
  <script>
    window.admin_logo = <?php echo env( 'ALTRP_SETTING_ADMIN_LOGO' ); ?>;
    window.altrpMenus = [];
  </script>
  <?php endif; ?>
  <script>
    let altrp_version = '<?php echo config( 'app.altrp_version' ); ?>';

    window.altrpMenus = [];
    
  </script>

  <script src="<?php echo e(altrp_asset( '/modules/admin/admin.js', 'http://localhost:3002/' )); ?>" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">

</head>
<body>
<div id="admin">

</div>
</body>
</html>
<?php /**PATH /var/www/samara.medin.cloud/resources/views/admin.blade.php ENDPATH**/ ?>