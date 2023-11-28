<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zetech Tailor - Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        header {
            background-color: #1f1d1d;
            color: #fff;
            padding: 10px;
            width: 100%;
            text-align: center;
        }

        h2 {
            margin: 0;
        }

        div {
            margin-top: 20px;
        }

        a {
            text-decoration: none;
            color: #333;
            background-color: #f0f0f0;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #ddd;
        }
    </style>
    <script>
        function signOut() {
            // Clear user session data (if any)
            sessionStorage.clear();

            // Show confirmation message
            alert("Logged out successfully. See you soon!");

            // Redirect to login page
            window.location.href = "login.php";
        }
    </script>
</head>
<body>
    <header>
        <h2>LOOKING FORWARD TO SEEING YOU SOON BYE FOR NOW</h2>
    </header>

    <div>
        <a href="#" onclick="signOut()">Log Out</a>
    </div>
</body>
</html>
