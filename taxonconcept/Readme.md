Taxon concepts

See classifications/gbif and classifications/ncbi for details on those classifications


### EOL

We can use EOL to provide pictures of taxa, and ultimately a way to link GBIF and NCBI





#### Load EOL taxon data

From bionames-data root 

	cd taxonconcept

	php load_eol.php

This assumes we have a file of EOL taxon ids, one per line. This code simply fetches the corresponding JSON from EOL, adds a "_id" and "type" field, and stores it in CouchDB.

#### Linking NCBI tax_id to EOL

EOL currently (20 May 2013) knows about NCBI, so we can simply construct a view to map NCBI to EOL, and also NCBI to one or more EOL images.


#### Linking GBIF to EOL

EOL has this mapping it is not part of the JSON for a page, so we need to get it via the API

	SELECT DISTINCT gbif_id INTO OUTFILE "/tmp/gbif_mapping.txt"
	FIELDS TERMINATED BY '\t' LINES TERMINATED BY '\n'
	FROM names_to_concept WHERE gbif_id <> 0;

	Query OK, 1201723 rows affected (35.79 sec)

From bionames-data root 

	cd taxonconcept

	cp /tmp/gbif_mapping.txt .

	php load_eol.php

