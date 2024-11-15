// Function to open the post modal
function openPostForm() {
    const modal = document.getElementById("postModal");
    if (modal) {
        modal.style.display = "block";
    } else {
        console.error("Modal element not found");
    }
}

// Function to close the post modal
function closePostForm() {
    const modal = document.getElementById("postModal");
    if (modal) {
        modal.style.display = "none";
    } else {
        console.error("Modal element not found");
    }
}

// Function to handle form submission for a new post
function submitPost(event) {
    event.preventDefault(); // Prevent form from submitting normally

    const form = document.getElementById("postForm");
    if (!form) {
        console.error("Post form element not found");
        return;
    }
    const formData = new FormData(form);

    fetch("../BackEnd/submit_post.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log(data); // Check the response
        if (data && !data.error) {
            addPostToFeed(data);  // Add the post to the feed on success
            closePostForm();      // Close the modal
            form.reset();          // Reset the form fields
        } else {
            alert("Failed to post. Please try again.");
            console.error("Error data:", data);
        }
    })
    .catch(error => {
        console.error("Error submitting post:", error);
        alert("An error occurred while submitting the post.");
    });
}

// Function to add a post element to the feed
function addPostToFeed(post) {
    const feed = document.getElementById("feed");
    if (!feed) {
        console.error("Feed element not found");
        return;
    }   

    const postElement = document.createElement("div");
    postElement.classList.add("post");
    postElement.innerHTML = `
        <div class="post-content">
            <p style="border-bottom:1px solid #38444d;"><strong>${sanitizeHTML(post.username)}</strong></p><br>
            <p>${sanitizeHTML(post.content)}</p><br>
            <i style="display:flex;"><small>${new Date(post.created_at).toLocaleString()}</small></i>
        </div>
    `;
    feed.prepend(postElement); // Add the new post at the top of the feed
}

// Sanitize HTML to prevent XSS attacks
function sanitizeHTML(str) {
    const temp = document.createElement("div");
    temp.textContent = str;
    return temp.innerHTML;
}

// Load initial posts from the database when the page loads
document.addEventListener("DOMContentLoaded", function() {
    const feed = document.getElementById("feed");
    if (!feed) {
        console.error("Feed element not found");
        return;
    }

    fetch("../BackEnd/profile.php")
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        .then(posts => {
            if (Array.isArray(posts)) {
                posts.forEach(post => addPostToFeed(post));
            } else {
                console.error("Error: Expected posts to be an array", posts);
            }
        })
        .catch(error => {
            console.error("Error loading posts:", error);
        });
});
