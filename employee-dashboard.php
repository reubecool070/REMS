<?php
session_start();

// Check if user is logged in and is employee
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'employee') {
    header('Location: index.php');
    exit();
}

$user_name = $_SESSION['user_name'] ?? 'Employee';

// Sample data for demonstration (will be replaced with database queries later)
$today_stats = [
    'total_hours' => 8.5,
    'productive_hours' => 7.2,
    'break_time' => 1.3,
    'apps_used' => 12
];

$app_usage_today = [
    ['name' => 'Xcode', 'duration' => 245, 'category' => 'Development', 'percentage' => 48],
    ['name' => 'Safari', 'duration' => 89, 'category' => 'Browser', 'percentage' => 17],
    ['name' => 'VS Code', 'duration' => 76, 'category' => 'Development', 'percentage' => 15],
    ['name' => 'Slack', 'duration' => 54, 'category' => 'Communication', 'percentage' => 11],
    ['name' => 'Mail', 'duration' => 28, 'category' => 'Email', 'percentage' => 5],
    ['name' => 'Terminal', 'duration' => 18, 'category' => 'Development', 'percentage' => 4]
];

$weekly_hours = [
    ['day' => 'Mon', 'hours' => 8.2],
    ['day' => 'Tue', 'hours' => 7.8],
    ['day' => 'Wed', 'hours' => 8.5],
    ['day' => 'Thu', 'hours' => 7.9],
    ['day' => 'Fri', 'hours' => 8.5],
    ['day' => 'Sat', 'hours' => 0],
    ['day' => 'Sun', 'hours' => 0]
];

$max_hours = max(array_column($weekly_hours, 'hours'));

include 'includes/header.php';
include 'includes/employee-nav.php';
?>

<div class="dashboard-container">
    <div class="dashboard-header">
        <div>
            <h1>My Dashboard</h1>
            <p>Track your app usage and productivity</p>
        </div>
        <div class="header-actions">
            <button class="btn-secondary" onclick="window.print()">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zM5 14H4v-3h1v3zm6 2H7v-2h6v2h-2zm4-2h-1v-3h1v3z"/>
                </svg>
                Download Report
            </button>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon blue">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div class="stat-content">
                <h3>Total Hours Today</h3>
                <p class="stat-value"><?php echo number_format($today_stats['total_hours'], 1); ?>h</p>
                <span class="stat-change positive">On track</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon green">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div class="stat-content">
                <h3>Productive Hours</h3>
                <p class="stat-value"><?php echo number_format($today_stats['productive_hours'], 1); ?>h</p>
                <span class="stat-change positive"><?php echo round(($today_stats['productive_hours'] / $today_stats['total_hours']) * 100); ?>% efficiency</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon orange">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div class="stat-content">
                <h3>Break Time</h3>
                <p class="stat-value"><?php echo number_format($today_stats['break_time'], 1); ?>h</p>
                <span class="stat-change neutral">Within limit</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon purple">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/>
                </svg>
            </div>
            <div class="stat-content">
                <h3>Apps Used</h3>
                <p class="stat-value"><?php echo $today_stats['apps_used']; ?></p>
                <span class="stat-change neutral">Today</span>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="content-grid">
        <!-- Today's App Usage -->
        <div class="card app-usage-card">
            <div class="card-header">
                <h2>Today's App Usage</h2>
                <select class="time-filter">
                    <option>Today</option>
                    <option>This Week</option>
                    <option>This Month</option>
                </select>
            </div>
            <div class="app-usage-list">
                <?php foreach ($app_usage_today as $app): ?>
                <div class="app-usage-item">
                    <div class="app-details">
                        <div class="app-icon-placeholder">
                            <?php echo strtoupper(substr($app['name'], 0, 2)); ?>
                        </div>
                        <div class="app-info">
                            <span class="app-name"><?php echo htmlspecialchars($app['name']); ?></span>
                            <span class="app-category"><?php echo htmlspecialchars($app['category']); ?></span>
                        </div>
                    </div>
                    <div class="app-stats">
                        <div class="app-duration"><?php echo $app['duration']; ?> min</div>
                        <div class="progress-bar-small">
                            <div class="progress-fill" style="width: <?php echo $app['percentage']; ?>%"></div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Weekly Hours Chart -->
        <div class="card">
            <div class="card-header">
                <h2>Weekly Work Hours</h2>
            </div>
            <div class="chart-container">
                <div class="bar-chart">
                    <?php foreach ($weekly_hours as $day): ?>
                    <div class="bar-item">
                        <div class="bar-wrapper">
                            <div class="bar" style="height: <?php echo $max_hours > 0 ? ($day['hours'] / $max_hours) * 100 : 0; ?>%">
                                <span class="bar-value"><?php echo number_format($day['hours'], 1); ?>h</span>
                            </div>
                        </div>
                        <span class="bar-label"><?php echo $day['day']; ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Productivity Insights -->
    <div class="card">
        <div class="card-header">
            <h2>Productivity Insights</h2>
        </div>
        <div class="insights-grid">
            <div class="insight-card green">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <h3>Great Progress!</h3>
                <p>You're 85% more productive than last week</p>
            </div>
            <div class="insight-card blue">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <h3>Time Management</h3>
                <p>Your average session length is 2.5 hours</p>
            </div>
            <div class="insight-card purple">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
                <h3>Most Productive</h3>
                <p>You work best between 9 AM - 12 PM</p>
            </div>
        </div>
    </div>

    <!-- Recent Sessions -->
    <div class="card">
        <div class="card-header">
            <h2>Recent Sessions</h2>
        </div>
        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Application</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Duration</th>
                        <th>Category</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Xcode</strong></td>
                        <td>09:15 AM</td>
                        <td>11:20 AM</td>
                        <td>2h 5m</td>
                        <td><span class="category-badge development">Development</span></td>
                    </tr>
                    <tr>
                        <td><strong>Safari</strong></td>
                        <td>11:30 AM</td>
                        <td>12:15 PM</td>
                        <td>45m</td>
                        <td><span class="category-badge browser">Browser</span></td>
                    </tr>
                    <tr>
                        <td><strong>Slack</strong></td>
                        <td>01:00 PM</td>
                        <td>01:30 PM</td>
                        <td>30m</td>
                        <td><span class="category-badge communication">Communication</span></td>
                    </tr>
                    <tr>
                        <td><strong>VS Code</strong></td>
                        <td>02:00 PM</td>
                        <td>04:15 PM</td>
                        <td>2h 15m</td>
                        <td><span class="category-badge development">Development</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

