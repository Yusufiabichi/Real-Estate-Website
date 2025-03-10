<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loader</title>
    <link rel="stylesheet" href="../css/loader.css">
</head>
<body>
    <div class="loader-wrapper">
        <span class="loader">
            <span class="loader-inner">
                <!-- <img src="../assets/img/logo.png" alt=""> -->
            </span>
        </span>
    </div>


    <script>
        $(window).on("load", function(){
            $(".loader-wrapper").fadeOut("slow");
        });
    </script>
</body>
</html>