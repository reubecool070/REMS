<?php
session_start();

// Check if user is logged in and is admin
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: index.php');
    exit();
}

$user_name = $_SESSION['user_name'] ?? 'Admin';

// Sample data for demonstration (will be replaced with database queries later)
$employees = [
    [
        'id' => 1,
        'name' => 'John Doe',
        'email' => 'john@company.com',
        'total_hours' => 8.5,
        'productive_hours' => 7.2,
        'status' => 'active'
    ],
    [
        'id' => 2,
        'name' => 'Jane Smith',
        'email' => 'jane@company.com',
        'total_hours' => 7.8,
        'productive_hours' => 6.9,
        'status' => 'active'
    ],
    [
        'id' => 3,
        'name' => 'Mike Johnson',
        'email' => 'mike@company.com',
        'total_hours' => 8.2,
        'productive_hours' => 7.5,
        'status' => 'active'
    ],
    [
        'id' => 4,
        'name' => 'Sarah Williams',
        'email' => 'sarah@company.com',
        'total_hours' => 6.5,
        'productive_hours' => 5.8,
        'status' => 'idle'
    ]
];

$top_apps = [
    ['name' => 'Xcode', 'usage' => 245, 'percentage' => 35],
    ['name' => 'Safari', 'usage' => 178, 'percentage' => 25],
    ['name' => 'VS Code', 'usage' => 142, 'percentage' => 20],
    ['name' => 'Slack', 'usage' => 89, 'percentage' => 13],
    ['name' => 'Mail', 'usage' => 49, 'percentage' => 7]
];

include 'includes/header.php';
include 'includes/admin-nav.php';
?>

<div class="dashboard-container">
    <div class="dashboard-header">
        <div>
            <h1>Admin Dashboard</h1>
            <p>Monitor and manage employee app usage</p>
        </div>
        <div class="header-actions">
            <button class="btn-secondary" onclick="window.print()">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zM5 14H4v-3h1v3zm6 2H7v-2h6v2h-2zm4-2h-1v-3h1v3z"/>
                </svg>
                Export Report
            </button>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon blue">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </div>
            <div class="stat-content">
                <h3>Total Employees</h3>
                <p class="stat-value"><?php echo count($employees); ?></p>
                <span class="stat-change positive">+2 this month</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon green">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div class="stat-content">
                <h3>Active Today</h3>
                <p class="stat-value">3</p>
                <span class="stat-change neutral">75% of total</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon purple">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div class="stat-content">
                <h3>Avg. Work Hours</h3>
                <p class="stat-value">7.8h</p>
                <span class="stat-change positive">+0.5h from last week</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon orange">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
            </div>
            <div class="stat-content">
                <h3>Productivity Rate</h3>
                <p class="stat-value">87%</p>
                <span class="stat-change positive">+3% this week</span>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="content-grid">
        <!-- Employees Table -->
        <div class="card employees-card">
            <div class="card-header">
                <h2>Employee Overview</h2>
                <div class="card-actions">
                    <input type="text" placeholder="Search employees..." class="search-input">
                </div>
            </div>
            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Employee</th>
                            <th>Email</th>
                            <th>Total Hours</th>
                            <th>Productive Hours</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($employees as $employee): ?>
                        <tr>
                            <td>
                                <div class="employee-info">
                                    <div class="avatar"><?php echo strtoupper(substr($employee['name'], 0, 2)); ?></div>
                                    <span><?php echo htmlspecialchars($employee['name']); ?></span>
                                </div>
                            </td>
                            <td><?php echo htmlspecialchars($employee['email']); ?></td>
                            <td><?php echo number_format($employee['total_hours'], 1); ?>h</td>
                            <td><?php echo number_format($employee['productive_hours'], 1); ?>h</td>
                            <td>
                                <span class="status-badge <?php echo $employee['status']; ?>">
                                    <?php echo ucfirst($employee['status']); ?>
                                </span>
                            </td>
                            <td>
                                <button class="btn-icon" title="View Details" onclick="viewEmployeeDetails(<?php echo $employee['id']; ?>)">
                                    <svg width="18" height="18" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Top Applications Chart -->
        <div class="card">
            <div class="card-header">
                <h2>Most Used Applications</h2>
                <select class="time-filter">
                    <option>Today</option>
                    <option>This Week</option>
                    <option>This Month</option>
                </select>
            </div>
            <div class="chart-container">
                <?php foreach ($top_apps as $app): ?>
                <div class="app-usage-item">
                    <div class="app-info">
                        <span class="app-name"><?php echo htmlspecialchars($app['name']); ?></span>
                        <span class="app-time"><?php echo $app['usage']; ?> min</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: <?php echo $app['percentage']; ?>%"></div>
                    </div>
                    <span class="app-percentage"><?php echo $app['percentage']; ?>%</span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="card">
        <div class="card-header">
            <h2>Recent Activity</h2>
        </div>
        <div class="activity-list">
            <div class="activity-item">
                <div class="activity-icon blue">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="activity-content">
                    <p><strong>John Doe</strong> started working on Xcode</p>
                    <span class="activity-time">2 minutes ago</span>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-icon green">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="activity-content">
                    <p><strong>Jane Smith</strong> completed 8 hours of productive work</p>
                    <span class="activity-time">15 minutes ago</span>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-icon purple">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                    </svg>
                </div>
                <div class="activity-content">
                    <p><strong>Mike Johnson</strong> exceeded daily work hour goal</p>
                    <span class="activity-time">1 hour ago</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function viewEmployeeDetails(employeeId) {
    alert('View detailed report for employee ID: ' + employeeId + '\n(This will be implemented with backend)');
}
</script>

<?php include 'includes/footer.php'; ?>

