<?php
session_start();
if (!isset($_SESSION['user_id']) && !isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerita Kita</title>
    <link rel="stylesheet" href="../css/home.css">
    <script src="../script/post.js" defer></script>
</head>

<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <ul class="menu">
                <li><a href="../FrontEnd/home.php" class="menu-item active"><i class="icon"></i>Home</a></li>
                <li><a href="#" class="menu-item"><i class="icon"></i>Explore</a></li>
                <li><a href="#" class="menu-item"><i class="icon"></i>Notifications</a></li>
                <li><a href="#" class="menu-item"><i class="icon"></i>Messages</a></li>
                <li><a href="#" class="menu-item"><i class="icon"></i>Bookmarks</a></li>
                <li><a href="#" class="menu-item"><i class="icon"></i>Communities</a></li>
                <li><a href="./profile.php" class="menu-item"><i class="icon"></i>Profile</a></li>
                <li><a href="#" class="menu-item"><i class="icon"></i>Settings</a></li>
            </ul>
            <button class="post-button" onclick="openPostForm()">Post</button>
            <div class="account">
                <img src="../img/profilepicture.jpg" alt="Profile Picture">
                <i>@<?php echo $_SESSION['username']; ?></i>
            </div>
        </div>

        <div class="main-content">
            <h1>Cerita Kita</h1><br>
            <!-- Post Form Modal -->
            <div id="postModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closePostForm()">&times;</span>
                    <h1>Create a Post</h1>
                    <form id="postForm" onsubmit="submitPost(event)">
                        <textarea name="content" placeholder="What's happening?" required></textarea>
                        <button type="submit">Post</button>
                    </form>
                </div>
            </div>

            <div class="feed" id="feed">

            </div>
        </div>

        <div class="trending">
            <div class="trending-for-you">
                <h2>Trends for you</h2>
                <ul class="trending-list">
                </ul>
            </div>
            <div class="follow">
                <h2>Who to follow</h2>
            </div>
        </div>
    </div>
</body>

</html>