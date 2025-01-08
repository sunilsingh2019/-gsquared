Challenge Overview – Senior PHP Developer

Project Brief: You are tasked with creating a custom content management feature for a fictional educational website. This feature will allow administrators to manage courses, and users to view and enrol in these courses. The implementation should be done using either WordPress or Drupal, leveraging the platform's capabilities to ensure scalability and maintainability.

Part 1: Solution Design

Requirements:

Course Management:
Administrators should be able to create, edit, and delete courses.
Each course should have a title, description, instructor, start date, end date, and capacity.
Enrolment System:
Users should be able to view available courses.
Users should be able to enrol in courses, respecting the capacity limit.
Users should receive a confirmation email upon successful enrolment.
Reporting:
Administrators should be able to view a report of all enrolments per course.
 

Deliverables:

A high-level architecture diagram of the proposed solution.
A detailed explanation of the chosen architecture.
Justification for using WordPress or Drupal for this implementation.
Database schema design for storing course and enrolment information.
 

Evaluation Criteria:

Clarity and completeness of the design.
Scalability and maintainability of the proposed solution.
Appropriate use of WordPress or Drupal features and best practices.
Thoughtfulness in handling potential edge cases and security concerns.
 

 

Part 2: Coding Task

 

Task: Implement a simplified version of the course management feature described in Part 1 using either WordPress or Drupal. Focus on the following functionalities:

Course Creation and Management:
Create a custom post type for courses (WordPress) or a custom content type (Drupal).
Implement a basic form for administrators to add/edit course information.
Course Listing and Enrolment:
Create a frontend page to list all available courses.
Implement a basic enrolment form for users to enrol in a course.
Ensure the enrolment form respects the course capacity.
Confirmation Email:
Send a confirmation email to users upon successful enrolment.
 

Deliverables:

Source code of the implemented solution.
Instructions on how to set up and test the solution locally.
Any assumptions made during implementation.
 

Evaluation Criteria:

Code quality and adherence to best practices.
Use of platform-specific features and proper extensibility.
Functionality completeness based on the requirements.
Proper handling of form validation and error cases.
Security considerations, including data sanitisation and validation.
 

 

Submission Guidelines:

 

Submit all design documents (architecture diagram, explanations, database schema) as a PDF.
Ensure all source code is well-documented and submitted in a ZIP file.
Provide a README file with setup instructions and any relevant information.
 

 

Interview Discussion:

 

During the final round interview, be prepared to:

Walk through your design and implementation.
Discuss the reasoning behind your architectural choices.
Explain how you handled specific challenges and potential improvements.
Answer questions related to PHP, WordPress/Drupal, and web development best practices.

### Instructions on How to Set Up and Test the Solution Locally

1. **Clone the Repository**
   - Clone the repository to your local machine:
     ```bash
     git clone <repository-url>
     cd <repository-directory>
     ```

2. **Install Lando**
   - Ensure Lando is installed on your machine. If not, follow the installation guide from the [Lando documentation](https://docs.lando.dev/basics/installation.html).

3. **Start Lando**
   - Start the Lando environment from the project directory:
     ```bash
     lando start
     ```

4. **Import the Database**
   - Import the provided database file:
     ```bash
     lando db-import <file_name.sql>
     ```

5. **Access the WordPress Site**
   - Access the local WordPress site via the Lando URL (typically `http://<project-name>.lndo.site`).

6. **Set Up Environment Variables**
   - Configure the environment variables in the `.env` file located in the project root:
     ```env
     DB_NAME='your_db_name'
     DB_USER='your_db_user'
     DB_PASSWORD='your_db_password'
     DB_HOST='localhost'
     WP_ENV='development'
     WP_HOME='http://<project-name>.lndo.site'
     WP_SITEURL='http://<project-name>.lndo.site/wp'
     ```

7. **Install Composer Dependencies**
   - Install the necessary dependencies using Composer:
     ```bash
     lando composer install
     ```

8. **Install Node.js Dependencies**
   - Install the necessary dependencies using npm or Yarn:
     ```bash
     lando npm install
     ```

9. **Build Assets**
   - Build the necessary frontend assets:
     ```bash
     lando npm run build
     ```
