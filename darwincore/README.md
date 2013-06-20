DarwinCore
----------

### Build Darwin Core Archive dump for BioNames

See [Darwin Core Text Guide](http://rs.tdwg.org/dwc/terms/guides/text/index.htm) for background, and [EOL Content Partners: Contribute Using Archives](http://eol.org/info/329).

As per [EOL Deliverable](https://trello.com/c/dwoZ193L) generate a Darwin Core archive file containing taxa, references, and link between taxa and reference.

From bionames-data root 

	cd darwincore

	php darwincore.php

This generates meta.xml, taxa.tsv, references.tsv, and media.tsv. These need to be zipped:

	zip bionames.zip meta.xml taxa.tsv references.tsv and media.tsv

Can validate using [EOL Archive and Spreadsheet Validator](http://services.eol.org/dwc_validator/)

### Building Darwin Core directly from MySQL

The original plan was to generate Darwin Core Archive from the database in CouchDB, which has augmented bibliographic data. However, because the database was still being built (and, more important, indexed) this wasn't possible. So, in order to provide a Dwc-A file for EOL by the deadline I generated it from the MySQL database that I use to clean the data.

[Darwin Core Text Guide](http://rs.tdwg.org/dwc/terms/guides/text/index.htm)

#### Taxa


	SELECT 
	  IFNULL(concat('urn:lsid:organismnames.com:name:', id), ''), 
	  IFNULL(nameComplete, ''), 
	  IFNULL(rank, ''), 
	  IFNULL(sici,'') 
	  INTO outfile '/tmp/taxa.txt' 
      	FIELDS TERMINATED BY '\t' 
      	LINES TERMINATED BY '\n' 
	FROM 
	names
	WHERE sici IS NOT NULL
	LIMIT 10

#### References




#### Media






  
