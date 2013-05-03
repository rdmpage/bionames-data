Did you mean
============

Support for approximate string matching ("did you mean"). 


#### Source

Get name strings from ION, GBIF, and NCBI and merge together (see SQL in all_names.sql)

#### Build database

Use [SimString](http://www.chokkan.org/software/simstring/) to create database

simstring -b -d all_names.db < all_names.txt

#### Test

Run simstring, which expects input from STDIN, so type or paste in a name and hit ↵ In the example below we are searching for "Dobsonia andersoni"

	simstring -d all_names.db -t 0.8 cosine

	Dobsonia andersoni
		Dobsonia andersoni
		Dobsonia anderseni
	2 strings retrieved (0.003442 sec)


#### PHP wrapper

Simple PHP wrapper that uses code from [How to pass variables as stdin into command line from PHP](http://stackoverflow.com/questions/2390604/how-to-pass-variables-as-stdin-into-command-line-from-php) to query database.







