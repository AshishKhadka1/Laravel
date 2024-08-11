<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Item Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        .product-item {
            display: flex;
            flex-direction: row;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .image img {
            width: 100%;
            height: auto;
            max-width: 200px;
            border-radius: 5px;
            object-fit: cover;
        }

        .product-details {
            margin-left: 20px;
            flex-grow: 1;
        }

        .product-title {
            font-size: 24px;
            font-weight: bold;
            margin: 0;
            color: #333;
        }

        .product-description {
            font-size: 16px;
            margin: 10px 0;
            color: #666;
        }

        .product-price {
            font-size: 20px;
            color: #b12704;
            font-weight: bold;
        }

        .buy-button {
            background-color: #ff9900;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .buy-button:hover {
            background-color: #e68a00;
        }

    </style>
</head>
<body>
    <div class="product-item">
        <div class="image">       
            <img src="aaa.jpeg" alt="Product Image">
        </div>
        <div class="product-details">
            <h2 class="product-title">Iphone</h2>
            <p class="product-description">
                This is a brief description of the product. It highlights key features and details to entice the customer to make a purchase.
            </p>
            <p class="product-price">$229.99</p>
            <button class="buy-button">Buy Now</button>
        </div>
    </div>
</body>
</html>
