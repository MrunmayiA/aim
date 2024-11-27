<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page - Asset Inventory Management</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');

        @keyframes gradientAnimation {
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

        @keyframes floatAnimation {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
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
            animation: gradientAnimation 8s ease infinite;
            overflow: hidden; /* Prevent scrollbars */
        }

        .floating-image {
            position: absolute;
            top: 13%;
            left: 20%;
            width: 150px; /* Adjust size */
            height: auto;
            animation: floatAnimation 4s ease-in-out infinite;
            opacity: 0.8;
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

        h1 {
            margin-bottom: 20px;
            font-size: 28px;
            color: #333;
            font-weight: bold;
        }

        p.author {
            font-size: 16px;
            color: #666;
            margin-bottom: 30px;
        }

        .button-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            justify-items: center;
            padding: 20px;
        }

        button {
            background-color: #74ebd5;
            border: none;
            color: white;
            padding: 20px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 8px;
            width: 100%;
            max-width: 300px;
            box-sizing: border-box;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        button:hover {
            background-color: #4fc3d3;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        button:active {
            background-color: #45a049;
        }

        @media (max-width: 768px) {
            .button-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .button-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Floating Image -->
    <img src="compter.png" alt="Floating Icon" class="floating-image">

    <!-- Main Container -->
    <div class="container">
        <p class="author"></p>
        <h1>Asset Inventory Management</h1>
        <div class="button-container">
            <button onclick="window.location.href='search_assets.php'">Search Assets</button>
            <button onclick="location.href='add_assets.php'">Add Assets</button>
            <button onclick="location.href='delete_asset.php'">Delete Assets</button>
            <button onclick="location.href='view_inventory.php'">View Inventory</button>
            <button onclick="location.href='add_employee.php'">Add Employee</button>
            <button onclick="location.href='search_employee.php'">Search Employee</button>
            <button onclick="location.href='delete_employee.php'">Delete Employee</button>
            <button onclick="location.href='view_employee.php'">View Employees</button>
            <button onclick="location.href='asset_alloc.php'">View Asset Allocation</button>
            <button onclick="location.href='assign_asset.php'">Assign Assets</button>
            <button onclick="location.href='support_us.php'">Buy Premium</button>
        </div>
    </div>
</body>
</html>
