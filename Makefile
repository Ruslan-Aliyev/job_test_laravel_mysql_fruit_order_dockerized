all:
	@make preliminaries
	@make buildup 
	@make data
preliminaries:
	docker-compose run --rm app cp .env.example .env
	docker-compose run --rm app chmod -R 777 storage
	docker-compose run --rm app composer install
	docker-compose run --rm app php artisan key:generate
buildup:
	docker-compose up -d --build
data:
	docker-compose exec app php artisan migrate:fresh --seed