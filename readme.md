# PHP Development Environment with Docker

A comprehensive Docker development environment for PHP applications with multiple services including Apache, MariaDB, PostgreSQL, Redis, Node.js frontend tooling, and modern development utilities.

---

## 🚀 Features

- PHP 8.2 with Apache and SSL
- MariaDB and PostgreSQL databases
- Redis for caching and queues
- Xdebug for debugging
- Node.js environment with support for:
  - Vue 3 + Vite
  - React + Vite
  - Vanilla JS + Vite
- Development Tools:
  - PHPMyAdmin (MySQL)
  - Adminer (All DBs)
  - PgAdmin (PostgreSQL)
  - File Browser
  - MailHog (email testing)

---

## 🧰 Prerequisites

- Docker
- Docker Compose

---

## 📁 Project Structure

```

.
├── apache-config/       # Apache configuration (vhost.conf)
├── html/                # Web root directory for PHP
├── nodejs/
│   ├── vue/             # Vue 3 + Vite frontend
│   ├── react/           # React + Vite frontend
│   ├── vanilla/         # Vite + plain JS frontend
│   └── active/          # Currently active frontend (mounted in container)
├── php-config/          # PHP configuration (php.ini)
├── ssl/                 # SSL certificates (server.crt, server.key)
├── docker-compose.yml
├── Dockerfile
└── README.md

````

---

## 🧪 Services

| Service        | Description                            | Port(s)        |
|----------------|----------------------------------------|----------------|
| **Web Server** | Apache + PHP 8.2 with SSL              | 80, 443        |
| **MariaDB**    | MySQL-compatible DB                    | -              |
| **PostgreSQL** | SQL DB for advanced use cases          | 5432 (internal)|
| **Redis**      | In-memory cache & queue store          | 6379 (internal)|
| **Node.js**    | Frontend development server (Vite)     | 3000           |
| **PHPMyAdmin** | MySQL DB manager                       | 8081           |
| **Adminer**    | Lightweight DB manager (MySQL, PGSQL)  | 8083           |
| **PgAdmin**    | PostgreSQL manager                     | 8084           |
| **File Browser** | Web-based file manager              | 8082           |
| **MailHog**    | Email testing tool                     | 1025, 8025     |

---

## ⚙️ Getting Started

1. Clone the repository:
   ```bash
   git clone http://github.com/shaweesh/docker-php
   cd docker-php
````

2. Generate local SSL certificates (if not already present):

   ```bash
   openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
     -keyout ssl/server.key -out ssl/server.crt
   ```

3. Select the frontend stack:

   ```bash
   cp -r nodejs/vue/* nodejs/active/       # or react/ or vanilla/
   ```

4. Start the services:

   ```bash
   docker-compose up -d --build
   ```

---

## 🔑 Database Credentials

### MariaDB

* Host: `db`
* Database: `dev_db`
* Root Password: `root`
* User: `dev`
* Password: `devpass`

### PostgreSQL

* Host: `postgres`
* Database: `dev_db`
* User: `root`
* Password: `root`

---

## 🧪 Development Tools

### Xdebug

Pre-configured and enabled. Use with your IDE:

* Host: `host.docker.internal`
* Port: `9003`

### File Browser

* URL: [http://localhost:8082](http://localhost:8082)
* Mounted path: `/srv` → `./html`

### MailHog

* SMTP: `localhost:1025`
* UI: [http://localhost:8025](http://localhost:8025)

---

## 📦 Common Commands

```bash
# Start all services
docker-compose up -d

# Stop all services
docker-compose down

# View logs
docker-compose logs -f

# Rebuild services
docker-compose up -d --build

# Access web container
docker-compose exec web bash

# Access Node container
docker-compose exec node sh
```

---

## 🌐 Switching Frontend Stack (Vue / React / Vanilla)

To activate a different frontend stack, just replace the contents of `nodejs/active/`:

```bash
# Vue
cp -r nodejs/vue/* nodejs/active/

# React
cp -r nodejs/react/* nodejs/active/

# Vanilla JS
cp -r nodejs/vanilla/* nodejs/active/
```

Then rebuild the node service:

```bash
docker-compose up -d --build node
```

---

## 🎯 Enjoy a full-stack PHP + JS development experience!