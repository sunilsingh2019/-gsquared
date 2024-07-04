# GSquared-Test: Installation Guide

## Prerequisites
- **Lando** (installed with the WordPress recipe)

## Installation Steps

1. **Clone the Repository**
   - Clone the code from the Git repository to your local machine.
   ```bash
   git clone <repository-url>
   cd <repository-directory>
   ```

2. **Start Lando**
   - Navigate to the cloned repository's home directory and start Lando.
   ```bash
   lando start
   ```

3. **Import the Database**
   - Import the database file using the following command:
   ```bash
   lando db-import <file_name.sql>
   ```

Replace `<repository-url>`, `<repository-directory>`, and `<file_name.sql>` with your actual repository URL, directory name, and SQL file name, respectively.