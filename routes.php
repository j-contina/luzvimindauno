<?php
// Role-based routing system for Barangay Management System

session_start();

// Define user roles
define('ROLE_USER', 'user');
define('ROLE_SUB_ADMIN', 'sub_admin');
define('ROLE_ADMIN', 'admin');

// Function to check user authentication
function isAuthenticated() {
    return isset($_SESSION['user_id']) && isset($_SESSION['user_role']);
}

// Function to check user role
function hasRole($requiredRole) {
    if (!isAuthenticated()) {
        return false;
    }
    
    $userRole = $_SESSION['user_role'];
    
    switch ($requiredRole) {
        case ROLE_ADMIN:
            return $userRole === ROLE_ADMIN;
        case ROLE_SUB_ADMIN:
            return $userRole === ROLE_ADMIN || $userRole === ROLE_SUB_ADMIN;
        case ROLE_USER:
            return in_array($userRole, [ROLE_ADMIN, ROLE_SUB_ADMIN, ROLE_USER]);
        default:
            return false;
    }
}

// Function to redirect based on role
function redirectByRole() {
    if (!isAuthenticated()) {
        header('Location: login.php');
        exit();
    }
    
    $userRole = $_SESSION['user_role'];
    
    switch ($userRole) {
        case ROLE_ADMIN:
            header('Location: admin/dashboard.php');
            break;
        case ROLE_SUB_ADMIN:
            header('Location: subadmin/dashboard.php');
            break;
        case ROLE_USER:
            header('Location: user/dashboard.php');
            break;
        default:
            header('Location: login.php');
            break;
    }
    exit();
}

// Function to get dashboard URL by role
function getDashboardUrl($role) {
    switch ($role) {
        case ROLE_ADMIN:
            return 'admin/dashboard.php';
        case ROLE_SUB_ADMIN:
            return 'subadmin/dashboard.php';
        case ROLE_USER:
            return 'user/dashboard.php';
        default:
            return 'login.php';
    }
}

// Function to require authentication
function requireAuth() {
    if (!isAuthenticated()) {
        header('Location: ../login.php');
        exit();
    }
}

// Function to require specific role
function requireRole($role) {
    requireAuth();
    
    if (!hasRole($role)) {
        // Redirect to appropriate dashboard based on user's actual role
        $userRole = $_SESSION['user_role'];
        $dashboardUrl = getDashboardUrl($userRole);
        header('Location: ../' . $dashboardUrl);
        exit();
    }
}

// Function to get user info
function getUserInfo() {
    if (!isAuthenticated()) {
        return null;
    }
    
    return [
        'id' => $_SESSION['user_id'],
        'name' => $_SESSION['user_name'] ?? 'User',
        'role' => $_SESSION['user_role'],
        'email' => $_SESSION['user_email'] ?? ''
    ];
}

// Function to log user activity
function logActivity($action, $details = '') {
    if (!isAuthenticated()) {
        return;
    }
    
    $userId = $_SESSION['user_id'];
    $userRole = $_SESSION['user_role'];
    $timestamp = date('Y-m-d H:i:s');
    
    // In a real application, you would log this to a database
    // For now, we'll just create a simple log entry
    $logEntry = "[$timestamp] User ID: $userId, Role: $userRole, Action: $action, Details: $details\n";
    
    // You could write to a log file or database here
    // file_put_contents('logs/activity.log', $logEntry, FILE_APPEND);
}

// Function to check if user can access a specific feature
function canAccess($feature) {
    if (!isAuthenticated()) {
        return false;
    }
    
    $userRole = $_SESSION['user_role'];
    
    // Define feature permissions
    $permissions = [
        'view_dashboard' => [ROLE_USER, ROLE_SUB_ADMIN, ROLE_ADMIN],
        'manage_users' => [ROLE_ADMIN],
        'manage_staff' => [ROLE_ADMIN],
        'review_documents' => [ROLE_SUB_ADMIN, ROLE_ADMIN],
        'approve_requests' => [ROLE_SUB_ADMIN, ROLE_ADMIN],
        'generate_reports' => [ROLE_SUB_ADMIN, ROLE_ADMIN],
        'system_settings' => [ROLE_ADMIN],
        'view_analytics' => [ROLE_SUB_ADMIN, ROLE_ADMIN],
        'manage_documents' => [ROLE_USER, ROLE_SUB_ADMIN, ROLE_ADMIN],
        'schedule_appointments' => [ROLE_USER, ROLE_SUB_ADMIN, ROLE_ADMIN]
    ];
    
    return isset($permissions[$feature]) && in_array($userRole, $permissions[$feature]);
}

// Function to get navigation menu based on role
function getNavigationMenu($role) {
    $menus = [
        ROLE_USER => [
            ['icon' => 'fas fa-home', 'title' => 'Dashboard', 'url' => 'user/dashboard.php'],
            ['icon' => 'fas fa-user', 'title' => 'Profile', 'url' => 'user/profile.php'],
            ['icon' => 'fas fa-file-alt', 'title' => 'Documents', 'url' => 'user/documents.php'],
            ['icon' => 'fas fa-calendar', 'title' => 'Appointments', 'url' => 'user/appointments.php'],
            ['icon' => 'fas fa-bell', 'title' => 'Notifications', 'url' => 'user/notifications.php'],
            ['icon' => 'fas fa-cog', 'title' => 'Settings', 'url' => 'user/settings.php']
        ],
        ROLE_SUB_ADMIN => [
            ['icon' => 'fas fa-tachometer-alt', 'title' => 'Dashboard', 'url' => 'subadmin/dashboard.php'],
            ['icon' => 'fas fa-chart-bar', 'title' => 'Reports', 'url' => 'subadmin/reports.php'],
            ['icon' => 'fas fa-users', 'title' => 'Residents', 'url' => 'subadmin/residents.php'],
            ['icon' => 'fas fa-file-alt', 'title' => 'Documents', 'url' => 'subadmin/documents.php'],
            ['icon' => 'fas fa-calendar-alt', 'title' => 'Appointments', 'url' => 'subadmin/appointments.php'],
            ['icon' => 'fas fa-bell', 'title' => 'Notifications', 'url' => 'subadmin/notifications.php']
        ],
        ROLE_ADMIN => [
            ['icon' => 'fas fa-tachometer-alt', 'title' => 'Dashboard', 'url' => 'admin/dashboard.php'],
            ['icon' => 'fas fa-chart-line', 'title' => 'Analytics', 'url' => 'admin/analytics.php'],
            ['icon' => 'fas fa-users', 'title' => 'Residents', 'url' => 'admin/residents.php'],
            ['icon' => 'fas fa-user-tie', 'title' => 'Staff', 'url' => 'admin/staff.php'],
            ['icon' => 'fas fa-file-alt', 'title' => 'Documents', 'url' => 'admin/documents.php'],
            ['icon' => 'fas fa-calendar-alt', 'title' => 'Appointments', 'url' => 'admin/appointments.php'],
            ['icon' => 'fas fa-cog', 'title' => 'Settings', 'url' => 'admin/settings.php'],
            ['icon' => 'fas fa-database', 'title' => 'Database', 'url' => 'admin/database.php'],
            ['icon' => 'fas fa-shield-alt', 'title' => 'Security', 'url' => 'admin/security.php']
        ]
    ];
    
    return $menus[$role] ?? [];
}

// Function to get sidebar title based on role
function getSidebarTitle($role) {
    $titles = [
        ROLE_USER => 'Resident Dashboard',
        ROLE_SUB_ADMIN => 'Sub-Admin Dashboard',
        ROLE_ADMIN => 'Admin Dashboard'
    ];
    
    return $titles[$role] ?? 'Dashboard';
}

// Function to get sidebar subtitle based on role
function getSidebarSubtitle($role) {
    $subtitles = [
        ROLE_USER => 'Resident Portal',
        ROLE_SUB_ADMIN => 'Department Manager',
        ROLE_ADMIN => 'System Administrator'
    ];
    
    return $subtitles[$role] ?? 'User Portal';
}

// Function to handle logout
function logout() {
    session_destroy();
    header('Location: ../login.php');
    exit();
}

// Function to validate session timeout
function validateSession() {
    $timeout = 30 * 60; // 30 minutes
    
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $timeout)) {
        session_destroy();
        header('Location: ../login.php?timeout=1');
        exit();
    }
    
    $_SESSION['last_activity'] = time();
}

// Auto-validate session on every request
validateSession();
?> 