::tiba batch
:: tiba batch
::@echo off
title TIBA BATCH
mode con cols=80 lines=10
color 1F

::sc config wampapache start= disabled
::sc config wampmysqld start= disabled

sc config wampapache start= auto
sc config wampmysqld start= auto

pause > nul

::exit











