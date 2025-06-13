# =====================================================
# ✅ Makefile: DevOps Shortcuts for Dockerized Project
# -----------------------------------------------------
# Author: Majd Shawish
# Date: June 2025
# Description: Simplifies Docker, Dev Tools, and Project Ops
# =====================================================

# 🐳 Docker Compose Control
up:
	docker-compose up --build -d

down:
	docker-compose down

restart:
	docker-compose restart

rebuild:
	docker-compose down
	docker-compose up --build -d

ps:
	docker-compose ps

logs:
	docker-compose logs -f

clean:
	docker-compose down -v --remove-orphans
	docker system prune -f

# 🐚 Shell Access
shell:
	docker-compose exec web sh

node-shell:
	docker-compose exec node sh

python-shell:
	docker-compose exec python sh

# 📦 Dependency Installation
composer-install:
	docker-compose exec web sh -c "composer install"

node-install:
	docker-compose exec node sh -c "npm install"

python-install:
	docker-compose exec python sh -c "pip install -r requirements.txt"

# 🧪 Testing
test:
	docker-compose exec web ./vendor/bin/phpunit

# 🩺 Health Checks
health:
	docker inspect --format='{{.Name}} => {{range .State.Health.Log}}{{.End}}: {{.Output}}{{end}}' $$(docker ps -q)

# 🌐 Open Tools in Browser
open:
	start https://localhost

open-node:
	start https://localhost:3000

open-python:
	start https://localhost:5000

open-mailhog:
	start http://localhost:8025

open-phpmyadmin:
	start http://localhost:8081

open-pgadmin:
	start http://localhost:8084

open-filebrowser:
	start http://localhost:8082

# 💾 Database Backups
export-mysql:
	docker exec docker-php-db-1 sh -c 'mysqldump -u root -proot dev_db' > backup.sql

export-postgres:
	docker exec docker-php-postgres-1 pg_dump -U root dev_db > pg_backup.sql

# ⚡ Vite Development
vite:
	docker-compose exec node sh -c "npx vite"

vite-dev:
	docker-compose exec node sh -c 'npm install && npx vite'

# 🔐 SSL Certificate (local dev with mkcert)
ssl:
	mkcert -key-file ssl/server.key -cert-file ssl/server.crt localhost 127.0.0.1 ::1