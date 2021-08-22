<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Robots Editor</title>

    <!-- Scripts -->
    <script>
        let _token = '<?php echo e(csrf_token()); ?>';

    </script>
    <?php if( env( 'ALTRP_SETTING_ADMIN_LOGO' ) ): ?>
    <script>
        window.admin_logo = <?php echo env('ALTRP_SETTING_ADMIN_LOGO'); ?>;

    </script>
    <?php endif; ?>
    <script>
        let _altrpVersion = '<?php echo e(getCurrentVersion()); ?>';

    </script>
    
    <script src="<?php echo e(altrp_asset( '/modules/robots/robots.js', 'http://localhost:3006/' )); ?>" crossorigin defer></script>

    <script>
      window.container_width = <?php echo e(get_altrp_setting('container_width', '1440')); ?>;

    </script>
    <link rel="stylesheet" href="<?php echo e(asset( '/modules/editor/editor.css?' ) . getCurrentVersion()); ?>">
    
</head>

<body>
    <div id="robots-editor">

    </div>
</body>

</html>
<?php /**PATH /var/www/samara.medin.cloud/resources/views/robots.blade.php ENDPATH**/ ?>