i: up script

script:
	./.scripts/install-app.sh

up:
	docker-compose up -d

down:
	docker-compose down

docker-build:
	docker-compose up --build -d

