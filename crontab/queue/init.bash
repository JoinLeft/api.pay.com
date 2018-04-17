#!/bin/bash
# 启动程序
function start(){
    nohup /usr/local/php/bin/php /data/wwwroot/api.test.com/crontab/queue/Resque.php --count=10
    # >> /data/wwwlogs/output 2>&1 &
}
# 关闭程序
function stop(){
    kill -9 $(ps -ef|grep Resque |awk '$0 !~/grep/ {print $2}' |tr -s '\n' ' ')
}

# 睡眠5s等待redis启动
sleep 5s

case "$1" in
  start)
    start
    ;;
  stop)
    stop
    ;;
  status)
      ps aux | grep Resque
    ;;
  restart)
    stop
    start
    ;;
  *)
    echo $"Usage: $0 {start|stop|status|restart}"
    exit 2
esac

exit $?