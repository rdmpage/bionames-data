bionames-data
=============

Data loaders for BioNames project


### Journals

### Publications

#### Unique ids

Many publications will lack external identifiers so we create a MD5 hash of a clean citation string and use that to cluster references that are probably the same. If we have very limited publication details (such as journal and year) then we will merge references that are different. To try and minimise this the clean citation string includes any external identifier we may have, such as DOI or BioStor id.

Firstly we dump a list of all ION ids that have publication information:

	SELECT id INTO OUTFILE "/tmp/pub_ids.txt"
	FIELDS TERMINATED BY '\t' LINES TERMINATED BY '\n'
	FROM names where publication IS NOT NULL;

	Query OK, 1520478 rows affected (7 min 9.37 sec)	

Then we read this list and generate MD5 hashes for each publication. From root of bionames-data:

	cd cleaning/ion-pubids

	cp /tmp/pub_ids.txt .

	php unique_pub_ids.php > all.sql

	(about 5 mins)

	mysql -u <username> <password> <db> < all.sql

	(about 5 mins)

#### Load publications into CouchDB

Get list of all MD5 hashes:

	SELECT DISTINCT sici INTO OUTFILE "/tmp/all_md5.txt"
	FIELDS TERMINATED BY '\t' LINES TERMINATED BY '\n'
	FROM names;

	Query OK, 393545 rows affected (2 min 17.07 sec)


From root of bionames-data:

	cd publication

	cp /tmp/all_md5.txt .

	php load_all.php

(overnight)


#### Load GBIF



#### Load clusters

Get list of all cluster ids

	SELECT DISTINCT cluster_id INTO OUTFILE "/tmp/cluster_ids.txt"
	FIELDS TERMINATED BY '\t' LINES TERMINATED BY '\n'
	FROM names;

	Query OK, 3913417 rows affected (19 min 55.74 sec)

From root of bionames-data:

	cd clusters

	cp 	/tmp/cluster_ids.txt .

	php load_all.php





