<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <style>
    
        :root {
            --primary-color: #08182e; 
            --secondary-color: #f79d18; 
            --background-color: black; 
            --text-color: White; 
            --button-background: #f79d18; 
            --button-hover-background: #7b7b7b; 
        }
        
        html, body {
            height: 100vh;
            margin: 0;
            overflow: hidden;
            background: var(--primary-color);
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Varela Round', Sans-serif;
            color: var(--text-color);
        }

        .main {
            text-align: center;
            position: relative;
        }

        h1 {
            font-size: 100px;
            margin: 0;
            font-weight: bold;
        }

        p {
            font-size: 20px;
            margin: 10px 0;
            line-height: 1.4;
        }

        button {
            background: var(--button-background);
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            color: var(--text-color);
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: var(--button-hover-background);
        }

        .bubble {
            background: #f79d18;
            border-radius: 50%;
            position: absolute;
            opacity: 0.6;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .bubble:nth-child(1) {
            top: 15%;
            left: 15%;
            height: 20vmin;
            width: 20vmin;
        }

        .bubble:nth-child(2) {
            top: 25%;
            left: 36%;
            height: 15vmin;
            width: 15vmin;
        }

        .bubble:nth-child(3) {
            top: 28%;
            right: 20%;
            height: 25vmin;
            width: 25vmin;
        }

        .bubble:nth-child(4) {
            top: 50%;
            right: 10%;
            height: 18vmin;
            width: 18vmin;
        }

        .bubble:nth-child(5) {
            top: 70%;
            left: 10%;
            height: 30vmin;
            width: 30vmin;
        }
    </style>
</head>
<body>
    <div class="main">
        <h1>4<a style="color:#f79d18;">0</a>4</h1>
        <p>It looks like you're lost...<br>That's a trouble?</p>
        <button onclick="window.history.back();">Go Back</button>
    </div>
    <!-- Bubble elements -->
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
</body>
</html>
