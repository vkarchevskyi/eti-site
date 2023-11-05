-include .env
export $(shell sed 's/=.*//' .env)

.DEFAULT_GOAL := help

PROJECT_DIR ?= /var/www

dc := docker compose -p $(APP_SLUG)
de := $(dc) exec
debackend := $(de) backend /bin/bash -c
det := $(dc) exec -T

.PHONY: help
help: ## Display help
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' Makefile | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

.PHONY: clean
build-erase: ## BUILD: Optional - Erase application environment
	@printf "$$BGreen Stop rm prune and purge all containers $$ColorOff \n"
	docker stop $$(docker ps -a -q) && docker rm $$(docker ps -a -q);\
	docker system prune --volumes --force --all && docker images purge
	@printf "$$BGreen Remove db folders $$ColorOff \n"
	rm -rf ./conf/mysql/db-data
	@printf "$$BGreen Remove app folders $$ColorOff \n"
	rm -rf ../vendor

.PHONY: config
build-setup: ## BUILD: Step1 - Create application configs
	@printf "$$BGreen Create application configs $$ColorOff \n"
	cp -n ../.env.example ../.env || true
	ln -sfn ../.env ./.env
	mkdir -p ./conf/mysql/db-data
	@printf "$$BGreen \n\n Do not forget set passwords in .env file $$ColorOff \n\n"

.PHONY: build
build-construct: ## BUILD: Step2 - Build app containers
	@printf "$$BGreen Build containers (time for a coffee break ☕ !) $$ColorOff \n"
	$(dc) up -d --build

.PHONY: up
up: ## CONTAINER: Start application
	$(dc) up -d

.PHONY: down
down: ## CONTAINER: Stop application
	$(dc) down

.PHONY: restart
restart: ## CONTAINER: Restart application
	$(dc) restart

.PHONY: app-console
app-console: ## CONTAINER: Go into backend console
	$(de) backend /bin/bash

.PHONY: app-logs
app-logs: ## CONTAINER: Show backend logs
	docker logs -f $(APP_SLUG)-backend-1

.PHONY: db-console
db-console: ## CONTAINER: Go into db console
	$(de) db /bin/bash

.PHONY: db-logs
db-logs: ## CONTAINER: Show db logs
	docker logs -f $(APP_SLUG)-db-1

.PHONY: key-generate
key-generate: ## DEV: Generate application key
	@printf "$$BGreen Generating application key $$ColorOff \n"
	$(debackend) 'php artisan key:generate'

.PHONY: storage-link
storage-link: ## DEV: Make storage link to public folder
	@printf "$$BGreen Creating storage link $$ColorOff \n"
	$(debackend) 'php artisan storage:link'

.PHONY: pint
pint: ## DEV: Run code scan and fix command
	@printf "$$BGreen Running pint $$ColorOff \n"
	$(debackend) 'composer pint'

.PHONY: update-project
update-project: ## DEV: Install dependencies
	@printf "$$BGreen Install dependencies $$ColorOff \n"
	$(debackend) 'composer install'
	@printf "$$BGreen Running migrations $$ColorOff \n"
	$(debackend) 'php artisan migrate'
