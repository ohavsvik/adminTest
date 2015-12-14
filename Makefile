#!/usr/bin/make -f
#
#

#
# phpunit
#
.PHONY: phpunit

phpunit:
	phpunit --configuration .phpunit.xml
