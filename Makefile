DC = docker-compose -f ./build/dev/docker-compose.yml
PHP_NO_DEBUG = php -c ./test/config/php.ini

########################################################################################################################
################################################## DEV TOOLS ###########################################################
########################################################################################################################
i: init
init: start
	$(DC) exec php composer install

start:
	$(DC) up -d

stop:
	$(DC) down

rebuild:
	$(DC) build --no-cache

nginx-sh:
	$(DC) exec nginx sh

php-sh:
	$(DC) exec php sh

########################################################################################################################
#################################################### TESTS #############################################################
########################################################################################################################
t: tests
tests: sa ut it at

cs: code-sniffer
code-sniffer:
	$(DC) exec php $(PHP_NO_DEBUG) ./vendor/bin/phpcs --standard=test/config/phpcs.xml src test public

cs-fix: code-sniffer-fixer
code-sniffer-fixer:
	$(DC) exec php $(PHP_NO_DEBUG) ./vendor/bin/phpcbf --standard=test/config/phpcs.xml src test public

stan:
	$(DC) exec php $(PHP_NO_DEBUG) ./vendor/bin/phpstan analyse -c test/config/phpstan.neon --no-interaction --no-ansi --no-progress

md: mess-detector
mess-detector:
	$(DC) exec php $(PHP_NO_DEBUG) ./vendor/bin/phpmd src,test,public text cleancode,codesize,controversial,unusedcode,naming

mn: magic-numbers
magic-numbers:
	$(DC) exec php $(PHP_NO_DEBUG) ./vendor/bin/phpmnd --extensions=array,assign,default_parameter,operation,property --include-numeric-string --ignore-numbers=-1,0,1 --hint --progress -n src

sa: static-analysis
static-analysis: cs stan md mn

ut: unit-tests
unit-tests:
	$(DC) exec php $(PHP_NO_DEBUG) ./vendor/bin/phpunit -c test/config/phpunit.xml --testsuite unit --coverage-text

it: integration-tests
integration-tests:
	$(DC) exec php $(PHP_NO_DEBUG) ./vendor/bin/phpunit -c test/config/phpunit.xml --testsuite integration --coverage-text

at: acceptance-tests
acceptance-tests:
	$(DC) exec php $(PHP_NO_DEBUG) ./vendor/bin/behat -c test/config/behat.yml test/acceptance --strict -f progress
