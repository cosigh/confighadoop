#!/bin/sh

size=0

tail -c $size  install_hadoop.bin >all.tar.gz
tar -zxf all.tar.gz --touch
cd all

#hadoop用户设置 
# 目前暂用root，不做特殊设置
#
#  HADOOP_USERNAME=hadoop
#  HADOOP_USERPWD=123456
#  HADOOP_GROUP=hadoopgrp
#
#  groupdel $HADOOP_GROUP
#  groupadd $HADOOP_GROUP
#
#  userdel -rf $HADOOP_USERNAME
#  useradd -m -d $HADOOP_INS_PATH -g $HADOOP_GROUP -s /bin/bash $HADOOP_USERNAME
#
#  echo $HADOOP_USERPWD | passwd --stdin $HADOOP_USERNAME
#
#
#

#hadoop安装路径
HADOOP_INS_PATH=/home/hadoop
mkdir -p /home/hadoop

#scala安装路径
SCALA_INS_PATH=/home/hadoop

#spark安装路径
SPARK_INS_PATH=/home/hadoop

#hadoop网卡
HADOOP_NETWORKCARD=eth0

#hostname设置
hostname NN
sed -i -e '/HOSTNAME/d' /etc/sysconfig/network
echo "HOSTNAME=NN" >> /etc/sysconfig/network

#cat /etc/sysconfig/network | grep HOSTNAME | awk -F'=' '{print $1"=HADOOP"}' >> /etc/sysconfig/network

#/etc/hosts
sed -i -e '/NN/d' /etc/hosts
ifconfig $HADOOP_NETWORKCARD | grep "inet addr" | awk -F':' '{print $2}' | awk -F' ' '{print $1"\tNN"}' >> /etc/hosts


#防火墙设置
#暂时默认防火墙关闭
#sed -i -e '/50030/d' /etc/sysconfig/iptables
#sed -i -e '/50070/d' /etc/sysconfig/iptables
#echo "-A RH-Firewall-1-INPUT -m state --state NEW -m tcp -p tcp --dport 50030 -j ACCEPT" >> /etc/sysconfig/iptables
#echo "-A RH-Firewall-1-INPUT -m state --state NEW -m tcp -p tcp --dport 50070 -j ACCEPT" >> /etc/sysconfig/iptables


#Java 安装
#默认已安装JAVA-1.7
#
#




#hadoop安装
echo "######################################"
echo "Begin to install Hadoop,please waiting..."
echo "######################################"

tar -zxf hadoop-2.6.5.tar.gz -C $HADOOP_INS_PATH --touch 


yum install -y sudo php php-cli php-devel php-common httpd httpd-devel php-mbstring php-mysql php-pdo php-process mysql mysql-devel mysql-server mysql-libs wget lrzsz dos2unix libxml2 libxml2-devel MySQL-python curl curl-devel libssh2 libssh2-devel automake autoconf make gcc gcc-c++ libstdc++ libstdc++-devel



#chown -R $HADOOP_USERNAME:$HADOOP_GROUP $HADOOP_INS_PATH
sed -i -e '/# set hadoop environment/d' ~/.bash_profile
sed -i -e '/HADOOP_HOME=/d' ~/.bash_profile
sed -i -e '/HADOOP_CONF_DIR=/d' ~/.bash_profile
sed -i -e '/PATH=\$PATH:\$HADOOP_HOME/d' ~/.bash_profile
echo "# set hadoop environment" >> ~/.bash_profile
echo "export HADOOP_HOME=$HADOOP_INS_PATH/hadoop-2.6.5" >> ~/.bash_profile
echo "export HADOOP_CONF_DIR=\$HADOOP_HOME/etc/hadoop" >> ~/.bash_profile
echo "export PATH=\$PATH:\$HADOOP_HOME/bin:\$HADOOP_HOME/sbin" >> ~/.bash_profile
source ~/.bash_profile


tar -zxf scala-2.10.5.tar.gz -C $SCALA_INS_PATH --touch 


sed -i -e '/# set scala environment/d' ~/.bash_profile
sed -i -e '/SCALA_HOME=/d' ~/.bash_profile
sed -i -e '/PATH=\$PATH:\$SCALA_HOME/d' ~/.bash_profile
echo "# set scala environment" >> ~/.bash_profile
echo "export SCALA_HOME=$SCALA_INS_PATH/scala-2.10.5" >> ~/.bash_profile
echo "export PATH=\$PATH:\$SCALA_HOME/bin" >> ~/.bash_profile
source ~/.bash_profile



tar -zxf spark-1.6.0.tar.gz -C $SPARK_INS_PATH --touch 


sed -i -e '/# set spark environment/d' ~/.bash_profile
sed -i -e '/SPARK_HOME=/d' ~/.bash_profile
sed -i -e '/SPARK_CONF_DIR=/d' ~/.bash_profile
sed -i -e '/PATH=\$PATH:\$SPARK_HOME/d' ~/.bash_profile
echo "# set spark environment" >> ~/.bash_profile
echo "export SPARK_HOME=$SPARK_INS_PATH/spark-1.6.0" >> ~/.bash_profile
echo "export SPARK_CONF_DIR=\$SPARK_HOME/conf" >> ~/.bash_profile
echo "export PATH=\$PATH:\$SPARK_HOME/bin" >> ~/.bash_profile
source ~/.bash_profile






#hadoop配置
#echo "Begin to config hadoop,Please waiting..."~/.bash_profile
#IPADDR=`ifconfig $HADOOP_NETWORKCARD | grep "inet addr" | awk -F':' '{print $2}' | awk -F' ' '{print $1}'`
## 暂无


#ssh配置
echo "######################################"
echo "Begin to set ssh,Please waiting..."
echo "######################################"

rm -fr ~root/.ssh
ssh-keygen  -t rsa -P '' -f ~root/.ssh/id_rsa
cat ~root/.ssh/id_rsa.pub >> ~root/.ssh/authorized_keys




#chmod 600 ~root/.ssh/authorized_keys





tar -zxf html.tar.gz -C /var/www/html --touch
service httpd start
chkconfig httpd on


cd ../
rm -fr all 

source ~/.bash_profile


echo "reboot to make configs enabled"

exit




