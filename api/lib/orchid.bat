@ECHO OFF

setlocal
set PATH=%PATH%;C:\Program Files\MATLAB\MATLAB Runtime\v901\runtime\win64

java -cp "lib;C:\Program Files\MATLAB\MATLAB Runtime\v901\toolbox\javabuilder\jar\javabuilder.jar;lib\CalEn.jar" TestCalEn %1