<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title><?php echo $data['headTitle']; ?></title>
    <meta name="description" content="Marketing Dashboard">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <!-- Call App Mode on ios devices -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no">
    
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>/css/vendors.bundle.css">
    <link id="appbundle" rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>css/app.bundle.css">
    <link id="mytheme" rel="stylesheet" media="screen, print" href="#">
    <link id="myskin" rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>css/skin-master.css">
    <!-- ENDING GLOBAL MANDATORY STYLES -->

    <!-- Favicon Icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5">
</head>
<!-- END HEAD -->

<!-- START BODY -->
<body class="mod-bg-1 mod-nav-link ">
    <div class="page-wrapper">
        <div class="page-inner">
            <!-- BEGIN Left Aside -->
            <?php echo view('layout/sidebar'); ?>
            <!-- END Left Aside -->

            <div class="page-content-wrapper">
                <!-- BEGIN Page Header -->
                <?php echo view('layout/header'); ?>
                <!-- END Page Header -->

                <!-- BEGIN Page Content -->
                <?php echo view($data['module']); ?>
                <!-- END Page Content -->

                <!-- BEGIN Page Footer -->
                <?php echo view('layout/footer'); ?>
                <!-- END Page Footer -->

                <!-- this overlay is activated only when mobile menu is triggered -->
                <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->
            </div>
        </div>
    </div>


    <script src="<?php echo base_url(); ?>/js/vendors.bundle.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>/js/app.bundle.js" type="text/javascript"></script>
    <script type="text/javascript">
        /* Activate smart panels */
        $('#js-page-content').smartPanel();
    </script>
</body>
<!-- END BODY -->
</html>