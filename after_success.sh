#!/bin/bash

# Move to APP
if [ -d /app ]; then
	cd /app
fi

if [ "$CODECOVERAGE" == '1' ]; then
	wget -O codecov.sh https://codecov.io/bash
	bash codecov.sh
fi
