<?php
// Database connection
include 'config.php';

// Check if form is submitted
if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $comment_id = $_POST['comment_id'];

    // Insert like or dislike
    if ($action === 'like' || $action === 'dislike') {
        $user_id = 1; // Replace with user ID from session or authentication
        $query = "INSERT INTO likes (user_id, comment_id, like) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE like = IF(like = 1 AND ? = 1, 0, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iiii", $user_id, $comment_id, $action === 'like' ? 1 : 0, $action === 'like' ? 1 : 0);
        $stmt->execute();
    }

    // Insert reply
    if ($action === 'reply') {
        $user_id = 1; // Replace with user ID from session or authentication
        $content = $_POST['content'];
        $query = "INSERT INTO comments (user_id, parent_id, content) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iis", $user_id, $comment_id, $content);
        $stmt->execute();
    }
}

// Fetch comments and likes
$query = "SELECT c.*, COUNT(l.id) as likes, SUM(l.like) as total_likes FROM comments c LEFT JOIN likes l ON c.id = l.comment_id AND l.like = 1 GROUP BY c.id";
$result = $conn->query($query);

$comments = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Comments</title>
</head>
<body>
    <div id="comments">
        <?php foreach ($comments as $comment): ?>
            <div class="comment">
                <p><?php echo htmlspecialchars($comment['content']); ?></p>
                <div class="actions">
                    <button class="like" data-comment-id="<?php echo htmlspecialchars($comment['id']); ?>">Like (<?php echo htmlspecialchars($comment['total_likes']); ?>)</button>
                    <button class="dislike" data-comment-id="<?php echo htmlspecialchars($comment['id']); ?>">Dislike (<?php echo htmlspecialchars($comment['likes'] - $comment['total_likes']); ?>)</button>
                    <button class="reply" data-comment-id="<?php echo htmlspecialchars($comment['id']); ?>">Reply</button>
                </div>
                <div class="replies">
                    <?php // Fetch and display replies here ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Reply form modal -->
    <div id="replyModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form id="replyForm">
                <input type="hidden" name="comment_id" value="">
                <textarea name="content" placeholder="Write your reply here..."></textarea>
                <button type="submit">Submit</button>
            </form>
        </div>
    </