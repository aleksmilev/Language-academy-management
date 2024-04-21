#!/bin/bash

for i in $(sudo docker ps -a -q); do
    sudo docker stop $i
    sudo docker rm $i
done

sudo docker ps -a -q    