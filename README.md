
**Multi-Guard REST API Project Design Pattern**

**Project Overview:**
This REST API project is built using Laravel and Sanctum, catering to three types of users: User, Admin, and Agent. The primary functionalities include user registration, user authentication, and product management. User registration is validated, and upon successful registration, a token is generated. For login, tokens are created. The project includes routes that are protected to provide access to authorized users.

watch demo - https://youtu.be/XdUput3iDVg

**Design Pattern Components:**

1. **User Registration:**
   - Users can register by providing necessary details, including name, email, and password.
   - Input data is validated to ensure it meets required criteria (e.g., valid email, strong password).
   - If validation is successful, a new user is created, and a token is generated.

2. **User Authentication:**
   - Users, admins, and agents can log in using email and password through their respective login routes.
   - Upon successful login, a token is generated, allowing them to access protected routes.

3. **API Tokens:**
   - Tokens are utilized for user authentication and authorization.
   - Each user type (User, Admin, Agent) has its own set of tokens to maintain individual access control.

4. **Protected Routes:**
   - Certain routes are protected to ensure only authorized users can access them.
   - Middleware is employed to verify the user's identity and role before granting access.

5. **User, Admin, and Agent Roles:**
   - The application assigns different roles to users (User), administrators (Admin), and agents (Agent).
   - Role-based access control is implemented to manage who can perform specific actions.

**Technology Stack:**
- Laravel Framework: Laravel provides a robust foundation for building the REST API.
- Sanctum: Utilize Laravel Sanctum for API authentication and token management.
- MySQL Database: Store user information and product data in a MySQL database.
- Validation: Implement validation rules to ensure data integrity.
- Middleware: Create custom middleware to manage role-based access control.
- RESTful Routes: Define RESTful routes for user registration, login, and product management.
- Git and GitHub: Employ version control for tracking code changes and collaborative development.

**Design Patterns:**

1. **Role-Based Authentication:** Implement role-based authentication and authorization to control user access to specific endpoints.

2. **RESTful API Design:** Follow RESTful principles for designing API endpoints that adhere to HTTP verbs and status codes.

3. **API Token Management:** Use Laravel Sanctum for token creation, validation, and revocation.

4. **Middleware for Authorization:** Develop custom middleware for verifying user roles and permissions.

**Workflow:**
- Users, Admins, and Agents can register through separate routes and provide required information.
- User registration data is validated, and upon successful validation, a user is created, and a token is generated.
- Users, Admins, and Agents can log in by providing their credentials.
- Upon successful login, a token is generated based on the user's role (User, Admin, Agent).
- Token authentication is used to access protected routes.
- Middleware checks user roles and authorizes or denies access to specific actions.