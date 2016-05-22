#!/bin/bash

# Move to APP
if [ -d ../CakeTooDoo/app ]; then
	cd ../CakeTooDoo/app
fi

if [ "$CODECOVERAGE" == '1' ]; then
	wget -O codecov.sh https://codecov.io/bash
	bash codecov.sh
fi
