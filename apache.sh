#!/bin/bash -e
echo "Listen $IP:$PORT"
echo "Press Ctrl+C to Stop"
# httpd -d ~/lib/httpd \
#     -c "Listen $IP:$PORT" \
#     -c "DocumentRoot $HOME/$C9_PID/public" \
#     -c "ErrorLog $HOME/$C9_PID/logs/errors.log" \
#     -c "LogLevel debug" \
#     -c 'LogFormat "%h %l %u %t \"%r\" %>s %b" common' \
#     -c "CustomLog $HOME/$C9_PID/logs/access.log common" \
#     -X \
#     -E $HOME/$C9_PID/logs/start.err

## from /mnt/shared/bin/run-apache2

source /etc/apache2/envvars || (echo "Error: envvars failed"; exit 1)

get_pid() {
    pidof -s -o $$ apache2
}

kill_apache2() {
    sudo service apache2 stop &>/dev/null || :
    sudo chown -R ubuntu:ubuntu /home/ubuntu/lib/apache2/
    
    while get_pid >/dev/null; do
        killall apache2 &>/dev/null || :
        sleep .3
        killall -9 apache2 &>/dev/null || :
        sleep .3
        # Prefer not to try with sudo
        get_pid &>/dev/null && echo ok && sudo killall -9 apache2 &>/dev/null || :
    done
}

tail_log() {
    while ! PID=`get_pid`; do
        sleep .2
    done
    tail -n 0 --pid=$PID -f $APACHE_LOG_DIR/{access,error}.log 2>/dev/null \
        | tail -n +4 \
        | grep -v "Unclean shutdown of previous Apache"
}

if [ "$APACHE_RUN_USER" == "www-data" ]; then
    echo "Warning: this is a legacy Cloud9 beta workspace." >&2
    echo "Apache may not work as expected." >&2
    echo "If it exits with an error, please create a new Cloud9 workspace." >&2
    echo
fi

mysql-ctl start &>/dev/null || :
if ! [ -e /etc/apache2/mods-enabled/rewrite.load ]; then 
    ( sudo a2enmod rewrite || : ) &>/dev/null
fi

kill_apache2
echo "Started apache2"
apache2ctl -f ~/workspace/dev.conf
tail_log