#!/bin/sh
dt=$(date '+%d_%b_%Y-%H_%M_%S');
aws_region = us-east-1
aws_profile = profile_name
#wget -r -nH --cut-dirs=5 -nc ftp://user:pass@server//absolute/path/to/directory
#-nH avoids the creation of a directory named after the server name
#-nc avoids creating a new file if it already exists on the destination (it is just skipped)
#--cut-dirs=5 allows me to take the content of /absolute/path/to/directory and to put it in the directory where I launch wget. The number 5 is used to filter out the 5 components of the path. The double slash means an extra component.
#Better use wget -m (--mirror). wget -r is limited to a recursion depth of 5 by default


wget -m -nH -nc ftp://username:password@server_ip//path/to/directory


tar -czvf uploads_"$dt"-bk.tar.gz /path/to/directory-or-file
aws s3 cp uploads_"$dt"-bk.tar.gz s3://bucket_name/path --region ${aws_region}
