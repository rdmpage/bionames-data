ION fetching
============

2013-07-18

Local copy ends at 4964979
ION ends at 5102577
fetching... 4964979 to 

2013-12-29

Local copy ends at 5102577
ION ends at 5133885


1. Grab ION RDF

/Users/rpage/Desktop/Stuff 2013-more/ion_harvest

mkdir rdf
php fetch_rdf.php

2. Grab ION HTML

mkdir rdf
php fetch_html.php


3. Process RDF

php process.php > out.sql

Import SQL file

4. Process HTML

php process_html_author.php > out.sql

Import SQL file


4.5. Fix parsing

Try to fix errors in praising references

cd bionames-data/cleaning/ion-ris
php fix.php > f.sql

Import SQL file


5. Add ISSNs

Add ISSNs to newly added articles

cd bionames-data/cleaning/ion-ris
php fix_issn.php > issn.sql

Import SQL file


6. Link to DOIs, etc.

cd bionames-data/cleaning/ion-ris
~~php ris.php > doi.sql~~
php doi > doi.sql


Import SQL file

6.5. Update BioNames

cd bionames-data/publications

php test.php


7. Clusters

Get list of names newly added, and rebuild clusters for these

cd bionames-data/cleaning/ion-clustering

SELECT DISTINCT nameComplete from `names-5148072`;

php cluster_names.php 


8. Update clusters in BioNames

Get list of clusters modified today, then add those

SELECT cluster_id from names WHERE DATE_SUB(CURDATE(),INTERVAL 3 HOUR) <= updated;

cd bionames-data/clusters

php test.php







