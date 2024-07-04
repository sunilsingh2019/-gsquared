

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
