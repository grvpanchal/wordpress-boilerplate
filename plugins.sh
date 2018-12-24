#!/bin/bash
while IFS=, read -r col1 col2 col3 col4
do
    if [ $col1 = "name" ]; then
        continue
    fi
    
    if [ $col2 = "active" ]; then
        # wp plugin install $col1 --force --activate --version=$col4
        echo "wp plugin install $col1 --force --activate --version=$col4"
    else
        # wp plugin install $col1 --force --version=$col4
        echo "wp plugin install $col1 --force --version=$col4"
    fi
    
done < plugins.csv