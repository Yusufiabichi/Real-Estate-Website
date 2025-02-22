<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="">
    <style>
        .whatsapp-container {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 1000;
}

.whatsapp-tooltip {
    position: absolute;
    bottom: 70px;
    right: 5px;
    background: #25d366;
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
    font-size: 14px;
    display: none;
}

.whatsapp-container:hover .whatsapp-tooltip {
    display: block;
}

    </style>
</head>
<body>
    <div class="whatsapp-container">
        <a href="https://wa.me/234XXXXXXXXXX" class="whatsapp-float" target="_blank">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
        </a>
        <div class="whatsapp-tooltip">Chat with us</div>
    </div>
</body>
</html>