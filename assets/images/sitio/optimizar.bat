@echo off
echo Optimizing JPEG ^& PNG Images...

forfiles /s /m *.jpg /c "cmd /c @\"jpegtran.exe\" -copy none -optimize -progressive -outfile @file @file"
forfiles /s /m *.png /c "cmd /c @\"optipng.exe\" -o7 -strip all @file"
echo. & echo Process done!
pause