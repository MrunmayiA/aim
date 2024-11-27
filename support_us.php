<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Us - Payment</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
        }

        .payment-container {
            background-color: white;
            padding: 40px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            text-align: center;
            width: 100%;
            max-width: 450px;
            transition: box-shadow 0.3s ease;
        }

        .payment-container:hover {
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
            font-weight: bold;
        }

        p {
            color: #666;
            margin-bottom: 30px;
        }

        input[type="text"], input[type="number"], input[type="email"] {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
            box-sizing: border-box;
        }

        input[type="text"]:focus, input[type="number"]:focus, input[type="email"]:focus {
            border-color: #74ebd5;
            outline: none;
        }

        .input-row {
            display: flex;
            justify-content: space-between;
        }

        .input-row input {
            width: 48%;
        }

        button {
            background-color: #74ebd5;
            color: white;
            border: none;
            padding: 15px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 8px;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        button:hover {
            background-color: #4fc3d3;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        button:active {
            background-color: #45a049;
        }

        .footer-text {
            margin-top: 20px;
            font-size: 14px;
            color: #888;
        }

        .footer-text a {
            color: #74ebd5;
            text-decoration: none;
        }

        .footer-text a:hover {
            text-decoration: underline;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }

        .modal-content h3 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .modal-content p {
            margin: 20px 0;
            font-size: 16px;
            color: #555;
        }

        .close-button {
            background-color: #74ebd5;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .close-button:hover {
            background-color: #4fc3d3;
        }

        /* Loader Styles */
        .loader {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            font-size: 18px;
            color: #333;
            font-weight: bold;
            z-index: 10;
        }

        .loader p {
            margin: 0;
        }
    </style>
</head>
<body>

<div class="payment-container">
    <h2>Get the premium version at just Rs.60 per month!</h2>
    <p>Your contributions help us keep the platform running. Thank you for your support!</p>

    <form id="paymentForm">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <input type="text" name="card_number" placeholder="Card Number" maxlength="16" required>
        
        <div class="input-row">
            <input type="text" name="expiry_date" placeholder="MM/YY" maxlength="5" required>
            <input type="number" name="cvv" placeholder="CVV" maxlength="3" required>
        </div>
        
        <input type="number" name="amount" placeholder="Amount" required>

        <button type="submit">Proceed Payment</button>
    </form>

    <div class="footer-text">
        <p>All payments are securely processed. <a href="#">Learn more</a></p>
    </div>
</div>

<!-- Loader for processing -->
<div id="loader" class="loader" style="display: none;">
    <p>Processing Payment...</p>
</div>

<!-- Modal for success notification -->
<div id="successModal" class="modal">
    <div class="modal-content">
        <h3>Thank You!</h3>
        <p>Your payment has been successfully processed. Enjoy premium features.</p>
        <button class="close-button" onclick="closeModal()">Close</button>
    </div>
</div>

<script>
    const form = document.getElementById('paymentForm');
    const modal = document.getElementById('successModal');
    const loader = document.getElementById('loader');

    form.addEventListener('submit', function(event) {
        event.preventDefault();  // Prevent actual form submission for demo

        // Show the loader
        loader.style.display = 'block';

        // Simulate payment processing delay of 4 seconds
        setTimeout(function() {
            // Hide the loader
            loader.style.display = 'none';

            // Show the success modal
            modal.style.display = 'flex';
        }, 4000);
    });

    function closeModal() {
        modal.style.display = 'none';
    }
</script>

</body>
</html>
