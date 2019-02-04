



<?php
/*
exec('cd %~dp0');
exec('start C:/Users/Server/Desktop/Servers/Atlas/AtlasTools/RedisDatabase/redis-server.exe ./redis.conf');
exec('');
exec('');
exec('');
exec('');
*/
exec('c:\WINDOWS\system32\cmd.exe /c START C:\Users\Server\Desktop\Servers\Atlas\AtlasTools\RedisDatabase\redis-server_start.bat');

/*
tasklist /FI "IMAGENAME eq redis-server.exe" 2>NUL | find /I /N "redis-server.exe">NUL
if "%ERRORLEVEL%"=="0" goto end

start redis-server.exe ./redis.conf

:end
exit
*/


?>