upgrade:
	docker run -it -w /data -v ${PWD}:/data --entrypoint php --rm sineverba/php56xc:1.5.0 -d memory_limit=-1 /usr/bin/composer update