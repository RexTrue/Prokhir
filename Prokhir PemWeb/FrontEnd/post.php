<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Layout</title>
    <link rel="stylesheet" href="../css/post.css">
    <script src="../script/post.js" defer></script>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <ul class="menu">
                <li><a href="#" class="menu-item active"><i class="icon"></i>Home</a></li>
                <li><a href="#" class="menu-item"><i class="icon"></i>Explore</a></li>
                <li><a href="#" class="menu-item"><i class="icon"></i>Notifications</a></li>
                <li><a href="#" class="menu-item"><i class="icon"></i>Messages</a></li>
                <li><a href="#" class="menu-item"><i class="icon"></i>Bookmarks</a></li>
                <li><a href="#" class="menu-item"><i class="icon"></i>Communities</a></li>
                <li><a href="#" class="menu-item"><i class="icon"></i>Profile</a></li>
                <li><a href="#" class="menu-item"><i class="icon"></i>Settings</a></li>
            </ul>
            <div class="account">
                <img src="profile-picture.jpg" alt="Profile Picture">
                <!-- <i><?php echo $_SESSION['username'] ?></i> -->
                <i>@<?php echo $_SESSION['user_id']; ?></i>
            </div>
            <button class="post-button" onclick="openPostForm()">Post</button>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Post Form Modal -->
            <div id="postModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closePostForm()">&times;</span>
                    <h2>Create a Post</h2>
                    <form id="postForm" onsubmit="submitPost(event)">
                        <input type="text" name="username" placeholder="Username" required>
                        <textarea name="content" placeholder="What's happening?" required></textarea>
                        <button type="submit">Post</button>
                    </form>
                </div>
            </div>

            <!-- Feed -->
            <div class="feed" id="feed">
                <!-- Posts will be loaded here via AJAX -->
            </div>
        </div>

        <!-- Trending Section -->
        <div class="trending">
            <!-- Trending content as before -->
        </div>
    </div>
</body>
</html>
