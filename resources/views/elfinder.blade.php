<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
    <title>elFinder 2.1.x source version with PHP connector</title>

    <!-- Section CSS -->
    <!-- jQuery UI (REQUIRED) -->
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

    <!-- elFinder CSS (REQUIRED) -->
    <link rel="stylesheet" type="text/css" href="vendor/elfinder/css/elfinder.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/elfinder/css/theme.css">

    <!-- Section JavaScript -->
    <!-- jQuery and jQuery UI (REQUIRED) -->
    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <![endif]-->
    <!--[if gte IE 9]><!-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--<![endif]-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!-- elFinder JS (REQUIRED) -->
    <script src="vendor/elfinder/js/elfinder.min.js"></script>

    <!-- Extra contents editors (OPTIONAL) -->
    <script src="vendor/elfinder/js/extras/editors.default.min.js"></script>

    <!-- GoogleDocs Quicklook plugin for GoogleDrive Volume (OPTIONAL) -->
    <!--<script src="js/extras/quicklook.googledocs.js"></script>-->

    <!-- elFinder initialization (REQUIRED) -->
    <script type="text/javascript" charset="utf-8">
        // Documentation for client options:
        // https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
        $(document).ready(function() {
            $('#elfinder').elfinder(
                // 1st Arg - options
                {
                    cssAutoLoad : false,               // Disable CSS auto loading
                    baseUrl : './',                    // Base URL to css/*, js/*
                    url : 'vendor/elfinder/php/connector.minimal.php',
                },
            )
                .dialog({modal: true});
        });
    </script>
</head>
<body>

<!-- Element where elFinder will be created (REQUIRED) -->
<div id="elfinder"></div>

</body>
</html>
