<?php
/**
 * Admin Dashboard
 * View and manage contact form submissions
 */

session_start();

// Check if user is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit;
}

// Include database configuration
require_once 'config.php';

// Handle delete request
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $delete_id = intval($_GET['delete']);
    $stmt = $conn->prepare("DELETE FROM contacts WHERE id = ?");
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    $stmt->close();
    header('Location: admin_dashboard.php');
    exit;
}

// Fetch all contacts
$sql = "SELECT * FROM contacts ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - H.OneElectricPro</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #ecf0f1;
        }
        
        .header {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .header h1 {
            font-size: 1.8rem;
        }
        
        .header-right {
            display: flex;
            gap: 20px;
            align-items: center;
        }
        
        .username {
            font-size: 1rem;
        }
        
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-logout {
            background-color: #e74c3c;
            color: white;
        }
        
        .btn-logout:hover {
            background-color: #c0392b;
        }
        
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }
        
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }
        
        .stat-card {
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .stat-card h3 {
            color: #666;
            font-size: 1rem;
            margin-bottom: 10px;
        }
        
        .stat-card .number {
            font-size: 2.5rem;
            color: #0066cc;
            font-weight: bold;
        }
        
        .messages-section {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .messages-section h2 {
            margin-bottom: 25px;
            color: #2c3e50;
        }
        
        .message-card {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #0066cc;
        }
        
        .message-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .message-info h3 {
            color: #2c3e50;
            margin-bottom: 5px;
        }
        
        .message-info p {
            color: #666;
            font-size: 0.9rem;
        }
        
        .message-body {
            color: #333;
            line-height: 1.6;
            margin-bottom: 15px;
        }
        
        .message-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.85rem;
            color: #999;
        }
        
        .btn-delete {
            background-color: #e74c3c;
            color: white;
            padding: 8px 15px;
            font-size: 0.9rem;
        }
        
        .btn-delete:hover {
            background-color: #c0392b;
        }
        
        .no-messages {
            text-align: center;
            padding: 40px;
            color: #999;
        }
        
        .contact-details {
            display: flex;
            gap: 20px;
            margin-top: 10px;
            flex-wrap: wrap;
        }
        
        .contact-detail {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                gap: 15px;
            }
            
            .message-header {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>⚡ Admin Dashboard</h1>
        <div class="header-right">
            <span class="username">Welcome, <?php echo htmlspecialchars($_SESSION['admin_username']); ?></span>
            <a href="admin_logout.php" class="btn btn-logout">Logout</a>
        </div>
    </div>
    
    <div class="container">
        <div class="stats">
            <div class="stat-card">
                <h3>Total Messages</h3>
                <div class="number"><?php echo $result->num_rows; ?></div>
            </div>
            <div class="stat-card">
                <h3>Today's Messages</h3>
                <div class="number">
                    <?php
                    $today_sql = "SELECT COUNT(*) as count FROM contacts WHERE DATE(created_at) = CURDATE()";
                    $today_result = $conn->query($today_sql);
                    $today_count = $today_result->fetch_assoc()['count'];
                    echo $today_count;
                    ?>
                </div>
            </div>
            <div class="stat-card">
                <h3>This Week</h3>
                <div class="number">
                    <?php
                    $week_sql = "SELECT COUNT(*) as count FROM contacts WHERE YEARWEEK(created_at) = YEARWEEK(NOW())";
                    $week_result = $conn->query($week_sql);
                    $week_count = $week_result->fetch_assoc()['count'];
                    echo $week_count;
                    ?>
                </div>
            </div>
        </div>
        
        <div class="messages-section">
            <h2>Contact Messages</h2>
            
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <div class="message-card">
                        <div class="message-header">
                            <div class="message-info">
                                <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                                <div class="contact-details">
                                    <div class="contact-detail">
                                        <span>📧</span>
                                        <a href="mailto:<?php echo htmlspecialchars($row['email']); ?>">
                                            <?php echo htmlspecialchars($row['email']); ?>
                                        </a>
                                    </div>
                                    <div class="contact-detail">
                                        <span>📞</span>
                                        <a href="tel:<?php echo htmlspecialchars($row['phone']); ?>">
                                            <?php echo htmlspecialchars($row['phone']); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="?delete=<?php echo $row['id']; ?>" 
                               class="btn btn-delete" 
                               onclick="return confirm('Are you sure you want to delete this message?')">
                                Delete
                            </a>
                        </div>
                        
                        <div class="message-body">
                            <strong>Message:</strong><br>
                            <?php echo nl2br(htmlspecialchars($row['message'])); ?>
                        </div>
                        
                        <div class="message-footer">
                            <span>Received: <?php echo date('F j, Y, g:i a', strtotime($row['created_at'])); ?></span>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="no-messages">
                    <p>No messages yet. Check back later!</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <?php $conn->close(); ?>
</body>
</html>