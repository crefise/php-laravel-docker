start:
	docker run -p 80:8181 peace-for-hair

build:
	docker build -t peace-for-hair .

stop:
	docker stop php-laravel-docker