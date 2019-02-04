cd %~dp0
tasklist /FI "IMAGENAME eq redis-server.exe" 2>NUL | find /I /N "redis-server.exe">NUL
if "%ERRORLEVEL%"=="0" goto start 

goto end

:start
echo REDIS SERVER ONLINE > redis_status.txt
exit

:end
echo REDIS SERVER OFFLINE > redis_status.txt
exit