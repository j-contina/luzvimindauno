<?php // Sub-Admin Dashboard ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sub-Admin Dashboard | Barangay Luzviminda Uno</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="icon" href="../assets/logoo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-blue: #0d6efd;
            --accent-green: #28a745;
            --light-gray: #f8f9fa;
            --card-shadow: 0 4px 24px rgba(0,0,0,0.08);
            --sidebar-width: 280px;
            --warning-orange: #fd7e14;
            --info-cyan: #0dcaf0;
        }
        
        body {
            background: var(--light-gray);
            color: #222;
            font-weight: 300;
            font-size: 0.85em;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        p {
            font-weight: 300;
            font-size: 0.85em;
            line-height: 1.4;
            letter-spacing: 0.2px;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: linear-gradient(180deg, #2c3e50 0%, #34495e 100%);
            color: #fff;
            z-index: 1000;
            transition: transform 0.3s ease;
            box-shadow: 4px 0 20px rgba(0,0,0,0.15);
        }

        .sidebar-header {
            padding: 2rem 1.5rem 1rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            background: rgba(255,255,255,0.05);
        }

        .sidebar-logo {
            width: 48px;
            height: 48px;
            object-fit: contain;
            margin-bottom: 1rem;
        }

        .sidebar-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #fff;
        }

        .sidebar-subtitle {
            font-size: 0.85rem;
            opacity: 0.8;
            color: #ccc;
        }

        .sidebar-nav {
            padding: 1rem 0;
        }

        .nav-section {
            margin-bottom: 1.5rem;
        }

        .nav-section-title {
            padding: 0.5rem 1.5rem;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            color: #95a5a6;
            letter-spacing: 1px;
        }

        .nav-item {
            margin-bottom: 0.25rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            border-radius: 0 2rem 2rem 0;
            margin-right: 1rem;
        }

        .nav-link:hover, .nav-link.active {
            background: rgba(13, 110, 253, 0.2);
            color: #fff;
            transform: translateX(5px);
        }

        .nav-link i {
            width: 20px;
            margin-right: 0.75rem;
            font-size: 1.1rem;
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 2rem;
            min-height: 100vh;
        }

        .page-header {
            background: #fff;
            border-radius: 16px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--card-shadow);
        }

        .welcome-text {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--primary-blue);
            margin-bottom: 0.5rem;
        }

        .date-text {
            color: #666;
            font-size: 0.9rem;
        }

        .subadmin-stats {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .stat-item {
            background: var(--light-gray);
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.8rem;
        }

        .stat-label {
            color: #666;
            margin-bottom: 0.25rem;
        }

        .stat-value {
            font-weight: 600;
            color: var(--primary-blue);
        }

        /* Dashboard Cards */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .dashboard-card {
            background: #fff;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: var(--card-shadow);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 32px rgba(13,110,253,0.12);
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1rem;
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--primary-blue);
        }

        .card-icon {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            color: #fff;
        }

        .icon-blue { background: var(--primary-blue); }
        .icon-green { background: var(--accent-green); }
        .icon-orange { background: var(--warning-orange); }
        .icon-cyan { background: var(--info-cyan); }

        .card-value {
            font-size: 2.2rem;
            font-weight: 700;
            color: #222;
            margin-bottom: 0.5rem;
        }

        .card-description {
            color: #666;
            font-size: 0.85rem;
        }

        /* Quick Actions */
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .action-btn {
            background: #fff;
            border: 2px solid var(--primary-blue);
            color: var(--primary-blue);
            border-radius: 12px;
            padding: 1.2rem;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .action-btn:hover {
            background: var(--primary-blue);
            color: #fff;
            transform: translateY(-3px);
            text-decoration: none;
        }

        .action-btn i {
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }

        /* Content Grid */
        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .activities-section, .pending-section {
            background: #fff;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: var(--card-shadow);
        }

        .section-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-blue);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .view-all {
            font-size: 0.8rem;
            color: var(--primary-blue);
            text-decoration: none;
        }

        .activity-item, .pending-item {
            display: flex;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .activity-item:last-child, .pending-item:last-child {
            border-bottom: none;
        }

        .activity-icon, .pending-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--light-gray);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: var(--primary-blue);
        }

        .activity-content, .pending-content {
            flex: 1;
        }

        .activity-title, .pending-title {
            font-weight: 600;
            color: #222;
            margin-bottom: 0.25rem;
        }

        .activity-time, .pending-time {
            font-size: 0.8rem;
            color: #666;
        }

        .pending-status {
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .status-pending { background: #fff3cd; color: #856404; }
        .status-approved { background: #d1edff; color: #0c5460; }
        .status-rejected { background: #f8d7da; color: #721c24; }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
                padding: 1rem;
            }
            
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
            
            .content-grid {
                grid-template-columns: 1fr;
            }
            
            .quick-actions {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* Toggle Button */
        .sidebar-toggle {
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 1001;
            background: var(--primary-blue);
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: none;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        @media (max-width: 768px) {
            .sidebar-toggle {
                display: flex;
            }
        }
    </style>
</head>
<body>
    <!-- Mobile Toggle Button -->
    <button class="sidebar-toggle" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <img src="../assets/logoo.png" alt="Logo" class="sidebar-logo">
            <div class="sidebar-title">Sub-Admin Dashboard</div>
            <div class="sidebar-subtitle">Department Manager</div>
        </div>
        
        <nav class="sidebar-nav">
            <div class="nav-section">
                <div class="nav-section-title">Main</div>
                <div class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-chart-bar"></i>
                        Reports
                    </a>
                </div>
            </div>

            <div class="nav-section">
                <div class="nav-section-title">Management</div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        Residents
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-file-alt"></i>
                        Documents
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-calendar-alt"></i>
                        Appointments
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-bell"></i>
                        Notifications
                    </a>
                </div>
            </div>

            <div class="nav-section">
                <div class="nav-section-title">Tools</div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cog"></i>
                        Settings
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </a>
                </div>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Page Header -->
        <div class="page-header">
            <div class="welcome-text">Welcome, Sub-Administrator!</div>
            <div class="date-text"><?php echo date('l, F j, Y'); ?></div>
            <div class="subadmin-stats">
                <div class="stat-item">
                    <div class="stat-label">Department</div>
                    <div class="stat-value">Documentation</div>
                </div>
                <div class="stat-item">
                    <div class="stat-label">Assigned Tasks</div>
                    <div class="stat-value">15</div>
                </div>
                <div class="stat-item">
                    <div class="stat-label">Team Members</div>
                    <div class="stat-value">3</div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <a href="#" class="action-btn">
                <i class="fas fa-file-check"></i>
                Review Documents
            </a>
            <a href="#" class="action-btn">
                <i class="fas fa-user-check"></i>
                Approve Requests
            </a>
            <a href="#" class="action-btn">
                <i class="fas fa-calendar-plus"></i>
                Schedule Meeting
            </a>
            <a href="#" class="action-btn">
                <i class="fas fa-chart-line"></i>
                Generate Report
            </a>
        </div>

        <!-- Dashboard Cards -->
        <div class="dashboard-grid">
            <div class="dashboard-card">
                <div class="card-header">
                    <div class="card-title">Pending Reviews</div>
                    <div class="card-icon icon-orange">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
                <div class="card-value">12</div>
                <div class="card-description">Documents awaiting review</div>
            </div>

            <div class="dashboard-card">
                <div class="card-header">
                    <div class="card-title">Approved Today</div>
                    <div class="card-icon icon-green">
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
                <div class="card-value">8</div>
                <div class="card-description">Successfully approved</div>
            </div>

            <div class="dashboard-card">
                <div class="card-header">
                    <div class="card-title">Team Performance</div>
                    <div class="card-icon icon-blue">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
                <div class="card-value">94%</div>
                <div class="card-description">Efficiency rating</div>
            </div>

            <div class="dashboard-card">
                <div class="card-header">
                    <div class="card-title">Processing Time</div>
                    <div class="card-icon icon-cyan">
                        <i class="fas fa-stopwatch"></i>
                    </div>
                </div>
                <div class="card-value">2.3h</div>
                <div class="card-description">Average processing time</div>
            </div>
        </div>

        <!-- Content Grid -->
        <div class="content-grid">
            <!-- Recent Activities -->
            <div class="activities-section">
                <div class="section-title">
                    Recent Activities
                    <a href="#" class="view-all">View All</a>
                </div>
                
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-file-check"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-title">Document Reviewed</div>
                        <div class="activity-time">Barangay Clearance for Maria Santos - 30 minutes ago</div>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-title">Request Approved</div>
                        <div class="activity-time">Indigency Certificate for Juan Dela Cruz - 1 hour ago</div>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-title">Meeting Scheduled</div>
                        <div class="activity-time">Team meeting for tomorrow - 2 hours ago</div>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-title">New Document Received</div>
                        <div class="activity-time">Business Permit application - 3 hours ago</div>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-title">Report Generated</div>
                        <div class="activity-time">Weekly processing report - 4 hours ago</div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests -->
            <div class="pending-section">
                <div class="section-title">
                    Pending Reviews
                    <a href="#" class="view-all">View All</a>
                </div>
                
                <div class="pending-item">
                    <div class="pending-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="pending-content">
                        <div class="pending-title">Indigency Certificate</div>
                        <div class="pending-time">Ana Reyes - 15 min ago</div>
                        <span class="pending-status status-pending">Pending</span>
                    </div>
                </div>

                <div class="pending-item">
                    <div class="pending-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="pending-content">
                        <div class="pending-title">Barangay Clearance</div>
                        <div class="pending-time">Pedro Santos - 45 min ago</div>
                        <span class="pending-status status-pending">Pending</span>
                    </div>
                </div>

                <div class="pending-item">
                    <div class="pending-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="pending-content">
                        <div class="pending-title">Business Permit</div>
                        <div class="pending-time">Luzviminda Cruz - 1 hour ago</div>
                        <span class="pending-status status-approved">Approved</span>
                    </div>
                </div>

                <div class="pending-item">
                    <div class="pending-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="pending-content">
                        <div class="pending-title">Residency Certificate</div>
                        <div class="pending-time">Roberto Garcia - 2 hours ago</div>
                        <span class="pending-status status-pending">Pending</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.querySelector('.sidebar-toggle');
            
            if (window.innerWidth <= 768) {
                if (!sidebar.contains(event.target) && !toggleBtn.contains(event.target)) {
                    sidebar.classList.remove('show');
                }
            }
        });
    </script>
</body>
</html> 