all:
	docker-compose up -d
.PHONY: all

stop:
	docker-compose stop
.PHONY: stop

down:
	docker-compose stop asteroide-db asteroide-proxy asteroide-api
	docker-compose rm -f asteroide-proxy asteroide-api