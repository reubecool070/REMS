# REMS - Remote Employee Monitoring System
## Front-End UI (PHP)

A modern, responsive web application for monitoring remote employee app usage on macOS. Built with pure PHP, HTML, CSS, and minimal JavaScript.

## 🎯 Project Overview

This is the front-end UI implementation for the Remote Employee Monitoring System (REMS) - a BCA 4th Semester project for Tribhuvan University, Nepal. The system provides a clean interface for admins and employees to view application usage reports.

## ✨ Features

### Admin Dashboard
- **Employee Overview**: Monitor all employees and their work hours
- **Statistics Cards**: Quick view of total employees, active users, average work hours, and productivity rate
- **Top Applications Chart**: Visual representation of most used applications across the team
- **Recent Activity Feed**: Real-time updates on employee activities
- **Search & Filter**: Easily find and filter employee data

### Employee Dashboard
- **Personal Stats**: View your daily work hours, productive hours, and break time
- **App Usage Tracking**: Detailed breakdown of applications used throughout the day
- **Weekly Hours Chart**: Visual representation of work hours across the week
- **Productivity Insights**: Personalized insights and productivity metrics
- **Recent Sessions**: Detailed log of application usage sessions

### Common Features
- **Responsive Design**: Works seamlessly on desktop, tablet, and mobile devices
- **Modern UI**: Clean, professional interface with smooth animations
- **Role-Based Access**: Separate dashboards for Admin and Employee roles
- **Secure Authentication**: Session-based login system
- **Print Support**: Export reports directly from the dashboard

## 🛠️ Technology Stack

- **Backend/Frontend**: PHP 7.4+
- **Styling**: Custom CSS3 with CSS Variables
- **Icons**: Inline SVG icons
- **Authentication**: PHP Sessions

## 📁 Project Structure

```
REMS/
├── index.php                          # Login page
├── login-handler.php                  # Authentication handler
├── logout.php                         # Logout handler
├── admin-dashboard.php                # Admin dashboard
├── employee-dashboard.php             # Employee dashboard
├── css/
│   └── style.css                      # Main stylesheet
├── includes/
│   ├── header.php                     # Common header
│   ├── footer.php                     # Common footer
│   ├── admin-nav.php                  # Admin navigation
│   └── employee-nav.php               # Employee navigation
└── README.md                          # This file
```

## 🚀 Installation & Setup

### Prerequisites
- PHP 7.4 or higher
- Apache/Nginx web server
- XAMPP, WAMP, or MAMP (for local development)

### Installation Steps

1. **Clone or Download the Project**
   ```bash
   cd /path/to/your/webserver/htdocs
   cp -r REMS ./
   ```

2. **Configure Web Server**
   - For XAMPP: Place the project in `htdocs` folder
   - For WAMP: Place in `www` folder
   - For MAMP: Place in `htdocs` folder

3. **Start Web Server**
   - Start Apache from your control panel
   - Ensure PHP is enabled

4. **Access the Application**
   ```
   http://localhost/REMS/
   ```

## 👤 Demo Credentials

### Admin Login
- **Email**: admin@rems.com
- **Password**: admin123
- **Role**: Admin

### Employee Login
- **Email**: employee@rems.com
- **Password**: emp123
- **Role**: Employee

## 📸 Screenshots

### Login Page
Clean and modern login interface with demo credentials displayed for easy testing.

### Admin Dashboard
- Employee overview table with real-time status
- Statistical cards showing key metrics
- Application usage charts
- Recent activity feed

### Employee Dashboard
- Personal productivity statistics
- Detailed app usage breakdown
- Weekly work hours visualization
- Productivity insights

## 🎨 Design Features

- **Color Scheme**: Modern indigo/purple gradient with clean white backgrounds
- **Typography**: System fonts for optimal readability
- **Spacing**: Consistent spacing using CSS variables
- **Shadows**: Subtle shadows for depth and hierarchy
- **Animations**: Smooth transitions and hover effects
- **Icons**: Inline SVG icons for crisp display at any size

## 🔐 Security Features (Current Implementation)

- Session-based authentication
- Role-based access control
- Logout functionality
- Input sanitization with `htmlspecialchars()`

## 📝 Future Backend Integration

This is currently a **front-end only** implementation with sample data. To integrate with a backend:

1. **Database Setup**
   - Create MySQL database
   - Implement user authentication table
   - Create app usage tracking tables

2. **Replace Sample Data**
   - Update `admin-dashboard.php` to fetch from database
   - Update `employee-dashboard.php` to fetch user-specific data
   - Implement `login-handler.php` with proper database validation

3. **API Integration**
   - Create API endpoints for data retrieval
   - Implement data synchronization with macOS app
   - Add real-time updates

## 🧪 Testing

1. **Login Functionality**
   - Test with demo credentials
   - Verify role-based redirection
   - Test logout functionality

2. **Responsive Design**
   - Test on various screen sizes
   - Verify mobile navigation
   - Check print functionality

3. **Dashboard Features**
   - Verify all charts display correctly
   - Test search and filter functions
   - Check data table interactions

## 📱 Responsive Breakpoints

- **Desktop**: 1200px and above
- **Tablet**: 768px - 1199px
- **Mobile**: 480px - 767px
- **Small Mobile**: Below 480px

## 🎓 Academic Information

- **Project**: Remote Employee Monitoring System (REMS)
- **Course**: Project-I (BCA 4th Semester)
- **Institution**: Tribhuvan University, Nepal
- **Academic Year**: 2025-2026

## 📄 License

This is an academic project created for educational purposes.

## 🤝 Contributing

This is an academic project. For suggestions or improvements:
1. Document the issue
2. Propose the solution
3. Test thoroughly before implementation

## 📞 Support

For academic inquiries or technical support related to this project, please contact through the institution.

## ✅ Checklist

- [x] Login page with authentication
- [x] Admin dashboard with employee overview
- [x] Employee dashboard with personal stats
- [x] Responsive design
- [x] Modern UI with animations
- [x] Role-based access control
- [x] Print functionality
- [ ] Database integration (Future)
- [ ] Real-time data updates (Future)
- [ ] macOS app integration (Future)

## 🎯 Project Goals

This front-end implementation demonstrates:
- Clean, modern web design principles
- Responsive layout techniques
- PHP session management
- Role-based user interfaces
- Data visualization concepts
- Professional UI/UX practices

---

**Built with ❤️ for BCA 4th Semester Project**

*Last Updated: January 2026*

