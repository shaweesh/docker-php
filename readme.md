# PHP Development Environment with Docker

A comprehensive Docker-based development environment for PHP applications, including Apache, SSL, databases, frontend tools, and modern utilities — fully containerized.

---

## 🚀 Features

- PHP 8.2 with Apache + SSL
- Python backend support (Flask or FastAPI)
- MariaDB and PostgreSQL databases
- Redis for caching and queues
- Xdebug for PHP debugging
- Node.js frontend with support for:
  - Vue 3 + Vite
  - React + Vite
  - Vanilla JS + Vite
- Development Tools:
  - PHPMyAdmin (MySQL)
  - Adminer (All DBs)
  - PgAdmin (PostgreSQL)
  - File Browser
  - MailHog (Email testing)

---

## 🧰 Prerequisites

- Docker
- Docker Compose
- [mkcert](https://github.com/FiloSottile/mkcert) (for trusted local SSL)

---

## 📁 Project Structure

```

.
├── apache-config/       # Apache configuration (vhost.conf)
├── html/                # Web root for PHP
├── nodejs/
│   ├── vue/             # Vue 3 + Vite frontend
│   ├── react/           # React + Vite frontend
│   ├── vanilla/         # Vanilla JS + Vite
│   └── active/          # Active frontend mounted to container
├── php-config/          # PHP configuration (php.ini)
├── python/              # Python backend (Flask or FastAPI)
│   ├── app.py
│   └── requirements.txt
├── ssl/                 # SSL certificates (generated with mkcert)
├── docker-compose.yml
├── Dockerfile
└── README.md

````

---

## 🧪 Services

| Service        | Description                            | Port(s)        |
|----------------|----------------------------------------|----------------|
| **Web Server** | Apache + PHP 8.2 with SSL              | 80, 443        |
| **MariaDB**    | MySQL-compatible DB                    | Internal only  |
| **PostgreSQL** | SQL DB for advanced use cases          | Internal only  |
| **Redis**      | In-memory cache & queue store          | 6379           |
| **Node.js**    | Frontend dev server (Vite)             | 3000 (HTTPS)   |
| **Python**     | Backend API server                     | 5000 (HTTPS)   |
| **PHPMyAdmin** | MySQL DB manager                       | 8081           |
| **Adminer**    | Universal DB manager                   | 8083           |
| **PgAdmin**    | PostgreSQL manager                     | 8084           |
| **File Browser** | Web file manager                    | 8082           |
| **MailHog**    | Email testing tool                     | 1025, 8025     |

---

## ⚙️ Getting Started

### 1. Clone the project
```bash
git clone https://github.com/shaweesh/docker-php
cd docker-php
````

### 2. Generate trusted local SSL certificates

```bash
mkcert -key-file ssl/server.key -cert-file ssl/server.crt localhost 127.0.0.1 ::1
```

> 💡 Requires [mkcert](https://github.com/FiloSottile/mkcert)

### 3. Select your frontend stack

```bash
cp -r nodejs/vue/* nodejs/active/       # or react/, vanilla/
```

### 4. Start services

```bash
make up
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

* Mode: `debug,develop`
* Host: `host.docker.internal`
* Port: `9003` (default for Xdebug 3)

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
make up

# Stop all services
make down

# View logs
make logs

# Rebuild everything
make rebuild

# Access web container (Apache + PHP)
make shell

# Access Node container
make node-shell

# Access Python container
make python-shell
```

---

## 🌐 Switch Frontend Stack (Vue / React / Vanilla)

```bash
# Switch to Vue
cp -r nodejs/vue/* nodejs/active/

# Switch to React
cp -r nodejs/react/* nodejs/active/

# Switch to Vanilla JS
cp -r nodejs/vanilla/* nodejs/active/

# Rebuild Node container
make rebuild
```

---

## 🎯 Enjoy Full-Stack PHP, Python & JavaScript Development — Simplified with Docker!