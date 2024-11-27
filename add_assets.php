<?php

include('db_conn.php');


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    
    $asset_id = mysqli_real_escape_string($conn, $_POST['asset_id']);
    $product_details = mysqli_real_escape_string($conn, $_POST['product_details']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $brand = mysqli_real_escape_string($conn, $_POST['brand']);
    $asset_barcode = mysqli_real_escape_string($conn, $_POST['asset_barcode']);
    $asset_image_id = mysqli_real_escape_string($conn, $_POST['asset_image_id']);

    
    $sql = "INSERT INTO assets (`Asset ID`, `Product Name/Asset details`, `Category`, `Brand`, `Asset Barcode`, `Asset Image ID`) 
            VALUES ('$asset_id', '$product_details', '$category', '$brand', '$asset_barcode', '$asset_image_id')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New asset added successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Asset</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
       
        @keyframes gradientMotion {
             0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #74ebd5, #ACB6E5, #ff9a9e);
            background-size: 300% 300%;
            animation: gradientMotion 8s ease infinite;
        }

        

        .container {
            background-color: white;
            padding: 40px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            text-align: center;
            width: 100%;
            max-width: 1000px;
            transition: box-shadow 0.3s ease;
        }

        .container:hover {
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
        }

        header {
            background-color: #74ebd5;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            border-radius: 15px 15px 0 0;
        }

        h1 {
            margin: 0;
            font-size: 28px;
        }

        main {
            padding: 20px;
        }

        .add-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #f2f2f2;            
        }

        input[type="text"], select {
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin-bottom: 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 18px;
            border-radius: 8px;
        }

        button {
            background-color: #74ebd5;
            border: none;
            color: white;
            padding: 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 8px;
            width: 100%;
            max-width: 300px;
            box-sizing: border-box;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }

        button:hover {
            background-color: #4fc3d3;
        }

        @media (max-width: 768px) {
            .container {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Add Asset</h1>
        </header>
        <main>
            <div class="add-container">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <input type="text" name="asset_id" id="asset_id" placeholder="Enter Asset ID...." required>
                    <input type="text" name="product_details" id="product_details" placeholder="Enter Product Name/Asset details...." required>
                    <div>
                        <label for="category"></label>
                        <select id="category" name="category" onchange="showBrands()" required>
                            <option value="">Select Category</option>
                            <option value="laptops">Laptops</option>
                            <option value="mice">Mice</option>
                            <option value="printers">Printers</option>
                            <option value="wifi_routers">WiFi Routers</option>
                            <option value="headphones">Headphones</option>
                            <option value="keyboard">Keyboard</option>
                        </select>
                    </div>
                    <div id="brands" style="display:none;">
                        <label for="brand"></label>
                        <select id="brand" name="brand" required>
                            <option value="">Select Brand</option>
                        </select>
                    </div>
                    <input type="text" name="asset_barcode" id="asset_barcode" placeholder="Enter Asset Barcode...." required>
                    <input type="text" name="asset_image_id" placeholder="Enter Asset Image ID...." required>
                    <button type="submit" name="submit">Add Asset</button>
                </form>
            </div>
        </main>
    </div>

    <script>
        function showBrands() {
            var category = document.getElementById("category").value;
            var brandsDropdown = document.getElementById("brands");
            var brandsSelect = document.getElementById("brand");
            brandsSelect.innerHTML = "<option value=''>Select Brand</option>";
            if (category) {
                brandsDropdown.style.display = "block";
                if (category === "laptops") {
                    addOptions(["HP", "Dell", "Apple", "Lenovo", "RedGear"], brandsSelect);
                } else if (category === "mice") {
                    addOptions(["Logitech", "Razer", "SteelSeries", "Corsair", "Microsoft"], brandsSelect);
                } else if (category === "printers") {
                    addOptions(["HP", "Epson", "Canon", "Brother", "Samsung"], brandsSelect);
                } else if (category === "wifi_routers") {
                    addOptions(["TP-Link", "Netgear", "Linksys", "ASUS", "D-Link"], brandsSelect);
                } else if (category === "headphones") {
                    addOptions(["Sony", "Bose", "Sennheiser", "JBL", "Audio-Technica"], brandsSelect);
                }
            } else {
                brandsDropdown.style.display = "none";
            }
        }

        function addOptions(options, selectElement) {
            options.forEach(function (option) {
                var optionElement = document.createElement("option");
                optionElement.text = option;
                optionElement.value = option;
                selectElement.appendChild(optionElement);
            });
        }
    </script>
</body>
</html>
