<!-- resources/views/sidebar.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Example</title>
    <style>
        body {
            display: flex;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            width: 250px;
            background-color: #333;
            color: white;
            height: 100vh;
            padding: 20px;
                margin-right:300px;
            position: fixed;

        }

        .sidebar {
            position: fixed;
            top: 56px; /* Adjust based on your navbar height */
            bottom: 0;
            width: 250px; /* Set a fixed width for the sidebar */
            overflow-y: auto; /* Enable scrolling for the sidebar */
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            margin: 15px 0;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
        }
        .sidebar ul li a:hover {
            text-decoration: underline;
        }
        .content {
            padding: 20px;
            flex-grow: 2;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>My Sidebar</h2>
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('posts.index') }}">Manage Posts</a></li>

            <!-- Add more links as needed -->
        </ul>
    </div>

</body>
</html>
