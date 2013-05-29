DarwinCore
----------

Build Darwin Core Archive dump for BioNames

See [Darwin Core Text Guide](http://rs.tdwg.org/dwc/terms/guides/text/index.htm) for background, and [EOL Content Partners: Contribute Using Archives](http://eol.org/info/329).

As per [EOL Deliverable](https://trello.com/c/dwoZ193L) generate a Darwin Core archive file containing taxa, references, and link between taxa and reference.

From bionames-data root 

	cd darwincore

	php darwincore.php

This generates meta.xml, taxa.tsv, references.tsv, and media.tsv. These need to be zipped:

	zip bionames.zip meta.xml taxa.tsv references.tsv and media.tsv

Can validate using [EOL Archive and Spreadsheet Validator](http://services.eol.org/dwc_validator/)

