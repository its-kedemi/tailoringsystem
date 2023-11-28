<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    color: #fff;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: #000 url('C:/Users/HP/Desktop/bacground 1.jpeg') center center fixed;
    background-size: cover;
}


        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(255, 255, 255, 0.1);
            width: 300px;
            border: 2px solid #eceaea;
        }

        h2, label {
            text-align: left;
            color: #000;
        }

        input, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 2px solid #f7efef;
            border-radius: 5px;
            background: #f3f0f0;
            color: #0e0d0d;
        }

        button {
            background-color: #007BFF;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <form action="" method="post" onsubmit="login(event)">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br>

            <!-- Mathematical question for authentication -->
            <label for="mathQuestion" id="mathQuestionLabel"></label><br>
            <input type="text" id="mathQuestion" name="mathQuestion" required><br>

            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        // Function to generate a random mathematical question
        function generateMathQuestion() {
            const num1 = Math.floor(Math.random() * 10) + 1;
            const num2 = Math.floor(Math.random() * 10) + 1;
            return `What is ${num1} + ${num2}?`;
        }

        // Function to set the generated question in the label
        function setMathQuestion() {
            const mathQuestionLabel = document.getElementById('mathQuestionLabel');
            const mathQuestion = generateMathQuestion();
            mathQuestionLabel.textContent = mathQuestion;
        }

        // Function to execute on page load
        window.onload = function () {
            setMathQuestion(); // Set initial question
        };

        // Function to handle login form submission
        function login(event) {
            event.preventDefault();

            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const mathAnswer = document.getElementById('mathQuestion').value;

            // Extract the numbers from the question
            const [num1, num2] = document.getElementById('mathQuestionLabel').textContent.match(/\d+/g);

            // Check if the mathematical question is answered correctly
            if (mathAnswer.trim() !== String(Number(num1) + Number(num2))) {
                alert('Incorrect answer to the mathematical question. Please try again.');
                setMathQuestion(); // Generate a new question
                return;
            }

            // Continue with username and password authentication
            if (username === 'admin' && password === 'admin123') {
                localStorage.setItem('isAuthenticated', true);
                localStorage.setItem('userRole', 'Admin');
            } else {
                if (username === 'user' && password === 'user123') {
                    localStorage.setItem('isAuthenticated', true);
                    localStorage.setItem('userRole', 'User');
                } else {
                    alert('Invalid username or password');
                    setMathQuestion(); // Generate a new question
                    return;
                }
            }

            const userRole = localStorage.getItem('userRole');
            if (userRole === 'Admin') {
                window.location.href = 'admin.php';
            } else {
                window.location.href = 'index.php';
            }
        }
    </script>
</body>
</html>
