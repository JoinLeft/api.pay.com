#!/bin/bash
# 启动程序
function start(){
    nohup /Applications/MAMP/bin/php/php7.1.8/bin/php /Applications/MAMP/htdocs/index.php >> /Applications/MAMP/htdocs/output 2>&1 &
}
# 关闭程序
function stop(){
    kill -9 $(ps -ef|grep Resque |awk '$0 !~/grep/ {print $2}' |tr -s '\n' ' ')
}

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