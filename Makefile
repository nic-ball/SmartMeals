deps:
	php ./composer.phar install

test_phpspec:
	vendor/bin/phpspec run

test_phpcs:
	vendor/bin/phpcs --standard=PSR2 src/

test: test_phpspec test_phpcs
