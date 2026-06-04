.PHONY: lab-up lab-down lab-test php-lint

lab-up:
	cd ctf-labs/php-web && docker compose up --build

lab-down:
	cd ctf-labs/php-web && docker compose down

lab-test:
	php ctf-labs/php-web/tests/smoke_test.php

php-lint:
	find . -name "*.php" -print0 | xargs -0 -n1 php -l
