echo "#========================"
echo "#Setup redis"
echo "#========================"

sudo yum -y install redis
sudo systemctl start redis.service