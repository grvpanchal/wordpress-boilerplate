#!/bin/bash
while IFS=, read -r col1 col2 col3 col4
do
    if [ $col1 = "name" ]; then
        continue
    fi
    if [ $col3 = "available" ]; then
        if [ $col2 = "active" ]; then
            # wp plugin install $col1 --force --activate --version=$col4
            echo "wp plugin install $col1 --force --activate --version=$col4"
        else
            
            # wp plugin install $col1 --force --version=$col4
            echo "wp plugin install $col1 --force --version=$col4"
        fi
    else
        echo "Plugin $col1 is not available. Please install manually or add in repo"
    fi
    
done < plugins.csv