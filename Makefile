SONARSCANNER_VERSION=4.8.0

sonar:
	docker run --rm -it \
		--name sonarscanner \
		-v $(PWD):/usr/src \
		-e SONAR_HOST_URL=$(SONAR_HOST_URL) \
		-e SONAR_TOKEN=$(SONAR_TOKEN) \
		sonarsource/sonar-scanner-cli:$(SONARSCANNER_VERSION)

upgrade:
	docker run -it -w /data -v ${PWD}:/data --entrypoint php --rm sineverba/php56xc:1.6.0 -d memory_limit=-1 /usr/bin/composer update

test:
	docker run -it -w /data -v ${PWD}:/data --entrypoint php --rm sineverba/php56xc:1.6.0 -d memory_limit=-1 /usr/bin/composer test
