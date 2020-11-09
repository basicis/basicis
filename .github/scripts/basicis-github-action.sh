#!/bin/bash
# With This on server 

cd basicis/ &&
git pull origin dev &&

if [composer update]; then
  exit 0
fi

exit $?