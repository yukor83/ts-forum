test:
	./vendor/bin/phpunit --bootstrap vendor/autoload.php tests

test-verbose:
	./vendor/bin/phpunit --bootstrap vendor/autoload.php tests --display-warnings