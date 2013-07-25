#!/bin/bash
echo "Listen $IP:$PORT"
echo "Press Ctrl+C to Stop"
httpd -d ~/lib/httpd \
    -c "Listen $IP:$PORT" \
    -c "DocumentRoot $HOME/$C9_PID/public" \
    -c "ErrorLog $HOME/$C9_PID/logs/errors.log" \
    -c "LogLevel debug" \
    -c 'LogFormat "%h %l %u %t \"%r\" %>s %b" common' \
    -c "CustomLog $HOME/$C9_PID/logs/access.log common" \
    -X \
    -E $HOME/$C9_PID/logs/start.err