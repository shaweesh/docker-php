up:
	docker-compose up --build -d

down:
	docker-compose down

logs:
	docker-compose logs -f

shell:
	docker-compose exec web sh

node-shell:
	docker-compose exec node sh

python-shell:
	docker-compose exec python sh