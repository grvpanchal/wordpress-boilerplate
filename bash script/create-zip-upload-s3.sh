#!/bin/sh
dt=$(date '+%d_%b_%Y-%H_%M_%S');
aws_region = us-east-1
aws_profile = profile_name
tar -czvf uploads_"$dt"-bk.tar.gz /path/to/directory-or-file
# tar -czvf uploads_"$dt"-bk.tar.gz /path/to/directory-or-file --exclude=/path/to/exclude/directory-or-file
# aws s3 cp uploads_"$dt"-bk.tar.gz s3://bucket_name/path --region ${aws_region} --profile ${}
aws s3 cp uploads_"$dt"-bk.tar.gz s3://bucket_name/path --region ${aws_region}
