Author: Kilian Welker

This project is my solution to a coding task given to me by Kaufland e-commerce

usage:

    php bin/console app:import <path>

arguments:

    path: The path of the file containing the data to be imported into a database. [REQUIRED]

options:

    --input-type <input type>: The format of the input file containing the data to be imported. Defaults to 'xml' [OPTIONAL]

    --db-type <db type>: The type of database the data is imported to. Defaults to 'sqlite' [OPTIONAL]

Currently the only supported input file format is xml and the only supported type of database is sqlite.

Error logs will be saved in the corresponding errorlogs directory.