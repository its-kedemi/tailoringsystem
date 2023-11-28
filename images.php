<!DOCTYPE html>
<html>
<head>
    <title>Zetech Tailor - Our Collection</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 200px;
            margin: 10px;
            text-align: center;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 5px 5px 0 0;
        }

        .card h3 {
            margin: 0;
            padding: 10px 0;
        }
    </style>
</head>
<body>
    <?php
    // Define an array of images with their corresponding captions
    $images = [
        ["C:/Users/HP/Desktop/tailor system/images.css/dress.jpeg", "DRESS"],
        ["C:/Users/HP/Desktop/tailor system/images.css/suit.webp", "SUIT"],
        ["C:/Users/HP/Desktop/tailor system/images.css/short.jpg", "SHORT"],
        ["C:/Users/HP/Desktop/tailor system/images.css/Cardigan.webp", "CARDIGAN"],
        ["C:/Users/HP/Desktop/tailor system/images.css/MESH OUTFIT.jpeg", "MESH OUTFIT"],
        ["C:/Users/HP/Desktop/tailor system/images.css/Best Cute Sweaters for Women,.jpeg", "Best Cute Sweaters for Women"],
        ["C:/Users/HP/Desktop/tailor system/images.css/LEATHER WIDE LEG TROUSER - BLACK _ 4.jpeg", "WIDE LEG TROUSER - BLACK"],
        ["C:/Users/HP/Desktop/tailor system/images.css/suit 1.jpeg", "BLACK SUIT"],
        ["C:/Users/HP/Desktop/tailor system/images.css/Raglan Sleeve Letter Graphic Cardigan.jpeg", "Graphic Cardigan"],
        // Add more image entries as needed
    ];

    // Loop through the images array and generate HTML for each image
    foreach ($images as $image) {
        echo '<div class="card">';
        echo '<img src="' . $image[0] . '" alt="' . $image[1] . '">';
        echo '<h3>' . $image[1] . '</h3>';
        echo '</div>';
    }
    ?>
</body>
</html>
