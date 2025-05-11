<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            background: #f4f6f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }
        .login-container {
            width: 100%;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: #fff;
            padding: 2.5rem 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            width: 100%;
            max-width: 350px;
        }
        .login-card h2 {
            margin-top: 0;
            margin-bottom: 1.5rem;
            text-align: center;
            color: #333;
        }
        .login-card label {
            display: block;
            margin-bottom: 0.5rem;
            color: #555;
            font-weight: 500;
        }
        .login-card input[type="text"],
        .login-card input[type="password"] {
            width: 100%;
            padding: 0.7rem;
            margin-bottom: 1.2rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            transition: border 0.2s;
        }
        .login-card input[type="text"]:focus,
        .login-card input[type="password"]:focus {
            border-color: #007bff;
            outline: none;
        }
        .login-card button {
            width: 100%;
            padding: 0.8rem;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
        }
        .login-card button:hover {
            background: #0056b3;
        }
        .error-message {
            color: #d8000c;
            background: #ffd2d2;
            border: 1px solid #d8000c;
            padding: 0.7rem;
            border-radius: 5px;
            margin-bottom: 1rem;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <h2>Admin Login</h2>
            <?php if (isset($error)) echo '<div class="error-message">'.$error.'</div>'; ?>
            <form method="post">
                <label>Username</label>
                <input type="text" name="username" required autofocus>
                <label>Password</label>
                <input type="password" name="password" required>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
