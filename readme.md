# PHP Development Environment with Docker

A comprehensive Docker development environment for PHP applications with multiple services including Apache, MariaDB, PostgreSQL, and development tools.

## Features

- PHP 8.2 with Apache
- MariaDB and PostgreSQL databases
- Xdebug for debugging
- SSL support
- Node.js environment
- Development Tools:
  - PHPMyAdmin
  - Adminer
  - PgAdmin
  - File Browser
  - MailHog for email testing

## Prerequisites

- Docker
- Docker Compose

## Project Structure

```
├── apache-config/       # Apache configuration files
├── html/               # Web root directory
├── php-config/         # PHP configuration
├── ssl/                # SSL certificates
└── var/                # Docker runtime files
```

## Services

- **Web Server**: Apache with PHP 8.2 (ports 80, 443)
- **MariaDB**: MySQL-compatible database
- **PostgreSQL**: Advanced SQL database (port 5432)
- **PHPMyAdmin**: MySQL database management (port 8081)
- **Adminer**: Database management tool (port 8083)
- **PgAdmin**: PostgreSQL management tool (port 8084)
- **File Browser**: Web-based file manager (port 8082)
- **MailHog**: Email testing tool (ports 1025, 8025)
- **Node.js**: JavaScript runtime for frontend development (port 3000)

## Getting Started

1. Clone the repository:
   ```bash
   git clone http://github.com/shaweesh/docker-php
   cd docker-php
   ```

2. Set up SSL certificates:
   ```bash
   openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout ssl/server.key -out ssl/server.crt
   ```

3. Start the services:
   ```bash
   docker-compose up -d
   ```

4. Access the services:
   - Website: https://localhost
   - PHPMyAdmin: http://localhost:8081
   - File Browser: http://localhost:8082
   - Adminer: http://localhost:8083
   - PgAdmin: http://localhost:8084
   - MailHog: http://localhost:8025

## Database Credentials

### MariaDB
- Host: db
- Database: dev_db
- Root Password: root
- User: dev
- Password: devpass

### PostgreSQL
- Host: postgres
- Database: dev_db
- User: root
- Password: root

## Development Tools

### Xdebug
Xdebug is configured for development and debugging. Configure your IDE with:
- Host: host.docker.internal
- Port: 9003

### File Browser
- Default URL: http://localhost:8082
- Mount path: /srv (maps to ./html)

### MailHog
- SMTP Port: 1025
- Web Interface: http://localhost:8025

## Common Commands

```bash
# Start all services
docker-compose up -d

# Stop all services
docker-compose down

# View logs
docker-compose logs

# Rebuild services
docker-compose up -d --build

# Access web container
docker-compose exec web bash
```