<nav class="navbar">
    <div class="nav-container">
        <div class="nav-brand">
            <svg width="40" height="40" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="50" height="50" rx="10" fill="#4F46E5"/>
                <path d="M15 20H35M15 25H35M15 30H28" stroke="white" stroke-width="3" stroke-linecap="round"/>
            </svg>
            <span class="brand-text">REMS</span>
        </div>
        
        <div class="nav-menu">
            <a href="admin-dashboard.php" class="nav-link active">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Dashboard
            </a>
            <a href="#" class="nav-link">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                Employees
            </a>
            <a href="#" class="nav-link">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
                Reports
            </a>
            <a href="#" class="nav-link">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                </svg>
                Settings
            </a>
        </div>

        <div class="nav-user">
            <div class="user-info">
                <span class="user-name"><?php echo htmlspecialchars($user_name); ?></span>
                <span class="user-role">Administrator</span>
            </div>
            <div class="user-avatar">AD</div>
            <div class="user-dropdown">
                <a href="#" class="dropdown-item">Profile</a>
                <a href="#" class="dropdown-item">Settings</a>
                <hr>
                <a href="logout.php" class="dropdown-item">Logout</a>
            </div>
        </div>
    </div>
</nav>

