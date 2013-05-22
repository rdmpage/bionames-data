NCBI

### NCBI divisions

	0	|	BCT	|	Bacteria
	1	|	INV	|	Invertebrates
	2	|	MAM	|	Mammals
	3	|	PHG	|	Phages
	4	|	PLN	|	Plants
	5	|	PRI	|	Primates
	6	|	ROD	|	Rodents
	7	|	SYN	|	Synthetic
	8	|	UNA	|	Unassigned
	9	|	VRL	|	Viruses	
	10	|	VRT	|	Vertebrates	
	11	|	ENV	|	Environmental samples	

### NCBI tax_ids

	use ion;

	SELECT tax_id INTO OUTFILE "/tmp/ncbi_taxids.txt"
	FIELDS TERMINATED BY '\t' LINES TERMINATED BY '\n'
	FROM ncbi_nodes
	WHERE division_id IN (1,2,5,6,10);

	Query OK, 289167 rows affected (1.48 sec)	


### Load

From bionames-data root:

	cd classifications/ncbi

	cp /tmp/ncbi_taxids.txt .

	php load_ncbi_all.php


### NCBI taxon names

	use ion;

	SELECT name_txt INTO OUTFILE "/tmp/ncbi_names.txt"
	FIELDS TERMINATED BY '\t' LINES TERMINATED BY '\n'
	FROM ncbi_names 
	INNER JOIN ncbi_nodes USING(tax_id) 
	WHERE ncbi_names.name_class IN ("scientific name", "synonym", "authority", "equivalent name", "genbank synonym", "misspelling", "unpublished name")
	AND ncbi_nodes.division_id IN (1,2,5,6,10);

	Query OK, 381501 rows affected (6.13 sec)

From bionames-data root:

	cd taxonconcept

	cp /tmp/ncbi_names.txt .

	php make_mapping.php ncbi_names.txt

### Load mapping into CouchDB

	php load_ncbi_mapping.php

	


