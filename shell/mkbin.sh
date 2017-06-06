#!/bin/bash
tar zcf all.tar.gz all/*
#通过gawk命令截取出all.tar.gz的大小
size=`ls -all | grep all.tar.gz | gawk '{print $5}'`
#生成一个install_hadoop.bin文件，文件内容和上一个脚本一模一样。只是改一定些东西
cp forhadoopinstall.sh  install_hadoop.bin
#把all.tar.gz文件追加进去
cat all.tar.gz >>install_hadoop.bin
#通过sed -i 修改上面定义的size。因为我们要从最终的文件截取size大小出来
#所以这个size大小就是我们all.tar.gz的大小
sed -i "s/size=0/size=$size/g"  install_hadoop.bin

