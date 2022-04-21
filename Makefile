define deploy-c
	docker-compose exec -T app bash -c
endef

init:
	docker-compose build --no-cache
	docker-compose up -d
	$(deploy-c) 'composer install'
	$(deploy-c) 'touch database/database.sqlite'
	$(deploy-c) 'chmod 777 -R storage bootstrap/cache database'
	$(deploy-c) 'php artisan migrate'
up:
	docker-compose up -d
down:
	docker-compose down
