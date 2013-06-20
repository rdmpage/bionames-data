Replicate publications to Cloudant

curl http://localhost:5984/_replicate -H 'Content-Type: application/json' -d '{ "source": "bionames", "target": "https://rdmpage:password@rdmpage.cloudant.com/bionames-publications", "filter":"app/publications" }'

12:47	0
13:42	79558
15:30	161774
19:17	291018
19:43	302770
21:07	309057

77K posts to replicate (heavy 