# Barangay Luzviminda Uno Management Information System

A comprehensive web-based management system for Barangay Luzviminda Uno with role-based access control and modern UI/UX design.

## 🏗️ File Structure

```
barangayhub/
├── index.php                 # Main homepage
├── login.php                 # Login page
├── register.php              # Registration page
├── routes.php                # Role-based routing system
├── README.md                 # This file
│
├── admin/                    # Admin dashboard and features
│   └── dashboard.php         # Admin dashboard
│
├── subadmin/                 # Sub-admin dashboard and features
│   └── dashboard.php         # Sub-admin dashboard
│
├── user/                     # User/resident dashboard and features
│   └── dashboard.php         # User dashboard
│
├── assets/                   # Static assets
│   ├── logoo.png            # Logo
│   ├── cover.jpg            # Hero image
│   └── *.svg                # Icon files
│
├── css/                      # Stylesheets
│   └── bootstrap.min.css    # Bootstrap CSS
│
└── js/                       # JavaScript files
    └── bootstrap.bundle.min.js # Bootstrap JS
```

## 👥 User Roles & Permissions

### 1. **User (Resident)**
- **Access Level**: Basic
- **Dashboard**: `user/dashboard.php`
- **Features**:
  - View personal dashboard
  - Request documents
  - Schedule appointments
  - View notifications
  - Manage profile
  - Contact office

### 2. **Sub-Admin (Department Manager)**
- **Access Level**: Intermediate
- **Dashboard**: `subadmin/dashboard.php`
- **Features**:
  - All user features
  - Review documents
  - Approve requests
  - Generate reports
  - Manage department tasks
  - View team performance

### 3. **Admin (System Administrator)**
- **Access Level**: Full
- **Dashboard**: `admin/dashboard.php`
- **Features**:
  - All sub-admin features
  - Manage all users
  - Manage staff
  - System settings
  - Database management
  - Security controls
  - Analytics and reports

## 🎨 Design System

### Color Scheme
- **Primary Blue**: `#0d6efd`
- **Accent Green**: `#28a745`
- **Light Gray**: `#f8f9fa`
- **Warning Orange**: `#fd7e14`
- **Danger Red**: `#dc3545`
- **Info Cyan**: `#0dcaf0`

### Typography
- **Font Family**: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
- **Font Weight**: 300 (light/thin)
- **Font Size**: 0.85em (tiny)
- **Line Height**: 1.4

### Components
- **Card Shadows**: `0 4px 24px rgba(0,0,0,0.08)`
- **Border Radius**: 16px (modern rounded corners)
- **Transitions**: 0.3s ease (smooth animations)

## 🚀 Getting Started

### Prerequisites
- PHP 7.4 or higher
- Web server (Apache/Nginx)
- Modern web browser

### Installation
1. Clone or download the project to your web server directory
2. Ensure all file permissions are set correctly
3. Access the system through your web browser
4. Start with the main `index.php` page

### Navigation Flow
1. **Public Access**: `index.php` (Homepage)
2. **Authentication**: `login.php` or `register.php`
3. **Role-Based Redirect**: Automatically redirected to appropriate dashboard
   - Users → `user/dashboard.php`
   - Sub-Admins → `subadmin/dashboard.php`
   - Admins → `admin/dashboard.php`

## 🔐 Security Features

### Session Management
- 30-minute session timeout
- Role-based access control
- Secure session validation
- Automatic logout on inactivity

### Permission System
- Feature-based permissions
- Role hierarchy enforcement
- Access control validation
- Activity logging

## 📱 Responsive Design

All dashboards are fully responsive and work on:
- Desktop computers
- Tablets
- Mobile phones
- All modern browsers

## 🛠️ Development

### Adding New Features
1. Create new PHP files in appropriate role directories
2. Include `routes.php` for authentication
3. Use `requireRole()` function for access control
4. Follow the established design patterns

### Customization
- Modify CSS variables in `:root` for color changes
- Update sidebar navigation in `routes.php`
- Add new permissions in the `canAccess()` function

## 📊 Dashboard Features

### User Dashboard
- Personal statistics
- Document requests
- Appointment scheduling
- Recent activities
- Quick actions

### Sub-Admin Dashboard
- Department overview
- Document review queue
- Team performance metrics
- Approval workflows
- Report generation

### Admin Dashboard
- System-wide analytics
- User management
- Staff management
- System settings
- Database tools
- Security controls

## 🔄 Updates & Maintenance

### Regular Tasks
- Monitor system logs
- Update user permissions
- Backup database
- Review security settings
- Update system documentation

### Troubleshooting
- Check file permissions
- Verify session configuration
- Review error logs
- Test role-based access
- Validate responsive design

## 📞 Support

For technical support or questions about the system:
- Contact the system administrator
- Review the documentation
- Check the error logs
- Test in different browsers

## 📄 License

This system is developed for Barangay Luzviminda Uno. All rights reserved.

---

**Last Updated**: July 2025
**Version**: 1.0.0
**Developer**: Barangay Management System Team 