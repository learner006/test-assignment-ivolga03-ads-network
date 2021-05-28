# test-assignment-ivolga03-ads-network
01 PROBLEM
==========

2. Веб-разработка
На диске лежит файл image.png, размер 20000 на 20000. Вывести картинку как баннер размером 200 на 100 пикселей.
Обратите внимание на размер и пропорции, и подумайте о времени загрузки.
Пришлите ссылку на репозиторий с решением
Важно: решение требует использования PHP, сжатие картинки средствами HTML/CSS является некорректным решением.

02 FILES
========
[!!readme.txt]
[banner.php]
[env.bat]   To run on Windows (Go to http://localhost:8264/)
[index.php]
[doc/output_examples.png] Self-explanatory! Is not it? ;-)

03 ALGORITHM
============
It works! :-) The script is not well tested at the moment but I believe it supports different aspect ratios of the source and destination images. It also centers a source image within the destination rectangle.

04 TEST CASES
=============
There are several ways it can be tested.
1) Playing with dimensions of source and destination images (greater, less)
2) Playing with different aspect ratios of the ones either
3) Combining (1) and (2)! :-)
