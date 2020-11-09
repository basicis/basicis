#!/bin/bash
mkdir $HOME/.ssh
echo $ID_RSA > $HOME/.ssh/id_rsa &&
echo $ID_RSA_PUB > $HOME/.ssh/id_rsa.pub &&
ssh $SSH_URL -y &&

cd basicis/ &&
git pull origin dev &&

if [composer update]; then
  exit 0
fi

exit $?