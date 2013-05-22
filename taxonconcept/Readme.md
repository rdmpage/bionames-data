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
