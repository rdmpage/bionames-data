<?php


$json = '
{
  "_id": "1aef9d6b002b52e2f0d3b8ab1a954545",
  "_rev": "4-16d6eddfb418333d784acc3f084d02ce",
  "type": "article",
  "provenance": {
    "mysql": {
      "id": "1883000",
      "modified": "2013-02-24 14:26:45"
    },
    "biostor": {
      "time": "2013-05-17T19:43:57+0000",
      "url": "http:\/\/biostor.org\/reference\/65931.json"
    }
  },
  "citation_string": "Bryan L Stuart, Yodchaiy Chuaynkern, Tanya Chan-Ard, Robert F Inger (2006) Three new species of frogs and a new tadpole from eastern Thailand. Fieldiana Zoology, 111: 1--19",
  "title": "Three new species of frogs and a new tadpole from eastern Thailand",
  "journal": {
    "name": "Fieldiana Zoology",
    "volume": "111",
    "pages": "1--19",
    "identifier": [
      {
        "id": "0015-0754",
        "type": "issn"
      }
    ]
  },
  "year": "2006",
  "identifier": [
    {
      "type": "doi",
      "id": "10.3158\/0015-0754(2006)187[1:TNSOFA]2.0.CO;2"
    },
    {
      "type": "biostor",
      "id": "65931"
    }
  ],
  "author": [
    {
      "firstname": "Bryan L",
      "lastname": "Stuart",
      "name": "Bryan L Stuart"
    },
    {
      "firstname": "Yodchaiy",
      "lastname": "Chuaynkern",
      "name": "Yodchaiy Chuaynkern"
    },
    {
      "firstname": "Tanya",
      "lastname": "Chan-Ard",
      "name": "Tanya Chan-Ard"
    },
    {
      "firstname": "Robert F",
      "lastname": "Inger",
      "name": "Robert F Inger"
    }
  ],
  "publisher": "BioOne (Field Museum of Natural History)",
  "thumbnail": "data:image\/gif;base64,R0lGODlhZACWAPYAADw9Rj5BRUFDSUpLTkdJUExNVU5PWFBPVk9QVk9QWVBRV1NUW1ZYX1VXYVdZ\r\nYVpcY11faV9hZ15haWBhZmNlbGZobmNmcGZocmtsdGxveG5wdG9wenBxdnJ0e3Z4f3l5f3V3gXd5\r\ngnt9hH1+iX6Ahn6BioGBh4OFjYaIjomJj4SGkYiHkYaJkoqMlI2PmI6Qlo6RmZGSl5OUnJaYnpiZ\r\nn5SXoJiXoJaZoZucpJ2fqJ6gpp+hqaGipqOkq6inq6aorqqqrqSnsKepsauss62vubCvtK6wtq6x\r\nubKytrO1u7i3ura4vrq6vcDAv7W3wLe5wbu9wr2\/yMC\/xb\/Axb\/BycHCxsfIx8PFy8jHy8bIzsrL\r\nzs\/QztDRz8XH0MfJ0MzN0c3P2NDP0s\/Q1M\/R2NLT1NjX1tfY19nY19XV2djX2tfY2tva2+Df3eHh\r\n39bZ4N3d4eDf4d\/g5OLi5OXl6efo6urq7QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5\r\nBAAAAAAALAAAAABkAJYAAAf+gEhVXFxlhIRkWlxajItbjluRYVthk5FaW4xYl4qLhFhclY9YjIqm\r\nmoqgi2Ghq5Whr2Wys7JnZbazZ2dra0WDhbVkZJ6ljq6VYVqVjJmTmI3QsKylqcuLqaFaqtbclYbC\r\ntOG5umxFTeGFXInPjphfle+iyZml9NeMyMnK0afTnsjKkrFCRiiMsEJkaOkKp0sXkCbpDMkapg\/T\r\nlnfP3tEDuOnZvoH7VkHDIrAiKVCkAiqaJKpVrITqauEat+vhIVnq1J3Ctyzfl5+llsXj2VMZyaAq\r\nS+4LycrRPJYDwSUMk4ZWwlu7zjyMJFHdsC8itXz5CO8dxlIYAYpMdjRpyYr+KuMGJPiIjEG7YcJd\r\nlemwSaQtwwrCY5SWrMCf8cqa1Vd0qcBrjZFqW4YpHzJhUhPupemjiZVIOfGOHb3x42LKYuNJAsi4\r\n9VyByn72LAr76cC7dydebXim8+e\/F7\/QG404NbwwspEj9omctWNkYOIV\/wmmudnEb5tXAodQtywz\r\n4HkosWLF4kVOhNGKha7cJ3aA1AJiX7xY\/dL4aKEavHtQcxkz\/4nnlxeRCGfGGOsglQZ0soERnRRg\r\neCFfbGOBoQwayfwkBTJfRDcWclp4gR1hifFEymn9kYGGMGiUcRUa4pG3RXkz6mDjFWR8IUZ1YMSQ\r\nBBRhoIHGF14oMYQUQn7+gcYVS6BRnVhoDAHFE0JAkQZ1CxLpYBhgKLHeF0lIIQUWYAzphRRLQBGd\r\nFhD+dEUXGV7hoooufoFZQgL+lgkZKLTAgQYmtCBoDGi0UAAOMcTQgQtofHCBDSfgIAMPLaywgwxD\r\nfIEDDg9IEQMDlObQAw419KDFE5va0IMDYBSRAxgzFBDEEEHsEEQXUECAgxBSrKDCEEk8UYINT5Cx\r\nwglMMCFFEklg8Q4ZgJXBAxJT0JjJGi\/QkAICFaBAAQQnfAGFDRREgMMBIoDRwwYXLDBABxS0sIAF\r\nGWDwxQQUYOAGChbIcMEGEDQAggHjAkBBAQosAAYIAnThhAoSQDCCAQ3+XOHFA0Q00IABFxiwAAQQ\r\nLLABGitwEAIHGDhAQAtr3EnGtH5poWcSRlRb3hRXILnhFVVK0aGYLqwghRNPLKEEEVIo4UUSTiCB\r\nBRJEL+EEERa0EKYTNgjxAw85ZJGDDFc4sSwOREzdhRQ1OOGCDTaMQMEQOXy9gxhD8ACFDzrM4AIQ\r\nEoGT5yViaGEuE0tUYQQOWEBxhBJqyrDBCjGc6YMHRXwhxRVRkBAdGM5W4qyE2mAhphddYOHF6ae\/\r\n6UXOY2LRxetigtEF6WA4kcTps1+RxRcLJoTGGRgO43cS5DUSygA9jFAABRJQ0AEGHTxQQRo9ZMBD\r\nAB0soEEF0VOwwAL+FOhzxRVYZMHI+Lrr7kUWV1Dh\/ptUtN8FFVJ0EQUVr0fRBeZR3K+\/\/f2LQvrS\r\nkg+XTasK5UGEFmhQBBqsAAg44IGqGkgDNBBhBUMQQQlAgAIWoOADJzgBCVBgIdCtL0Tmk5AX3Me+\r\nLGRhfuibH\/7qhz\/93e919MNh\/ua3nubg5TJ4EoQVWmGXNKQBDWtAgxGVKKQcRUdEXxiDiFT0Diel\r\nhhGn04L5SpEF0umOfeOL3\/xgh78x6i9n7XPf\/PoXvyu8BzdgwcwBy3OnNKwJH2BYkIjQsLowxo99\r\ngdNdKSQ0PrFoYXzlywIL3cfI1eHPfTakwv0kGcBK\/s9+FmvPcQz+Epo5hkIYYVDCFoyYBji4IQxA\r\nQoPovAAGKUpxCjWgwhO0gKEsJMJJHfoCFp6gpFaiQQwr\/MkYiKQDKEzhCVTA3ete54TXvWmZ+evB\r\nFaogBRFtEjtyFIQi7LIGKRygAzLAwQyOpQUOBMkGGRjBCmAAgxeUYAo36AIGdrCDFYAABxjoAQxW\r\nQAQljGAHF9hUD3qwAxiA4AgFjWULoBCEDSB0B0IgwhCewAIcjMAJQ+jBEyRKhBNQFH2x0eRl7PQy\r\nJSDQILfAgqB4gIMVrKAFWrDBkaQQtBFsAAMvYMENvDCGip4AAxlYQb0wYAKwnSAJFaiABTbAghNQ\r\ngAIhAMEIJKD+AvwdoQQskIAFRqACCzhhBEN4wAUC5oILYGAEDQiCAAvJpU0OhiIHpMRu4CCHMigh\r\nDUzQwhuwgAY39BUMyFzh676QBTRI4QdpEJGFyPCEDa1uLOM7ghYYGT8qHIEKioRCFKY0hCg8AXNP\r\neIITiBY2ZDpBCPsrJHFGo4\/RvEybwCjDFlJA2wpg4QAf6IEGVsADF7AgCxQIghtYEAIdbGoGOPhB\r\nhIgERcQQVotiWaYXzYdZFsrvkc5MoxjHlz9ExucK9+lcjLRwlTU04QMpQC8XThCDFpgABCxYgQyo\r\nAFYq1AADEmDABjwghDSYbyxc3KIWreDC91HWwG1EcPsqST\/+zOUMkxZzLn3SUtIqAEaJZWBDHTYM\r\nBzjUYQ4b\/rAc5KCGN7hhDGpIsRHGEIc1pCHFb1DDEY8oJDSoAQ1jEIOOdywGIv2Ep6ibHXNRRzrc\r\n4c6FrwsRUKrIJUPiI0bRyvB5RfABEZjAyiYYgQm2jAIUpKDLL2hBthIVAxnIoMxlNrOaZ8BmGMhg\r\nBjWoQThxcAPj6mAHNqKnrYIQhB78QAiADgKgAT0EInDU0ElgAhQWLQUoiElMVaiCMsZLp27SNgUh\r\nHIEIQkDlD3jg0x0ItQc6oIFSl5oD9UpqUvEVgQhIIAIOaDUDYO0ABjCg1glwgMYaYOsGPEBjC2BA\r\nAxYA7AX+JIDYCTCAsg1QAAMowNnPfvaxv3cAJYTBB17azRnYMIdud7jbdNgwHeYghzfAIQ7oTje6\r\n3xCHN7jbxOzmhYnVMIZ62\/veORZDvaM4hlY66InLZSWRXUjw5oYXCwgXDratUOmFrEgYNF4Rl6jT\r\nYxGBDoXQ1aILMZ7GKUzBwB9P8IErO\/KRo298u9vHkrVzkYULYxcuJmUZIj5jIemYDDsei75\/0uPp\r\n9PyQYGwfwaubRkWSHIbyS612KSt00BFJMqTYAg\/yWojf8YIXMv6djN0AB1KWKUg8GlJ12mqQzSHG\r\nhV9UJMEVyd3qvpC73EV6GB18tvpJIaSxkQ9rfUD1W\/D+gg28AJ4SlxikNIyhrR4C0XXCYE0Arx3l\r\nale70NnHyOumEYckZ+PlYJcSABOHGlzguyKwcnVepOEN8iblEcv0b8S7PkdkeKIW01fgP6IPs5In\r\neRn398i5l\/HBQk68cuIThqkrghxrYIMZdDF4I77hiG6wo0EwNJt9yP4nj28h7gmuu0WePLVjxF8Y\r\nBfi\/N10OdNpJxj0qwfdH+L0NgDf982Xc9cE7SEVk79DYHQQUJKMd5SxUYEY3gO8jP773SJR1Q6mF\r\nRV4gFBXBCqJXCA1xdaq3BqZUYwviemTHI8gRe5AHRqezdlQQIttHdEEnRvuTgrzXdmfjRmPHGmZB\r\nCdf+xgTuN4GmR0o3xkRKFCQS1yGG1CGDkX2Ql0xrR4AyVIBw10Zp1D4nh0bgRQoq5GQpMYNDpAvJ\r\nF39qsAYxZm6m1HUR93XC8HWIp3Fd1EVdUIQCqHbVpUbsA0MqqIRIiD539ySnURzKEIENAXhnsEQv\r\nRko1Fnb6x3M8B0zrg2RniHJvkob4kwVWwHREx4SQyHswFIepARSNIRvYpgV8wQbxlwbyFn1uwAZd\r\nVyYPJwz1pm9SFIJlqHGFiIaRV4YCyIQFaGCQqITjIyHVsRytxQyZKIHJ1xCe+GI3VnNOsiJgsCM6\r\noiOEKCIoRHBnqIbQWHsD2IhNmD5vcnK2eIvJ0ID+yyAhP3Rt44EV23Z1e5iF5uYGa+AGfsWDwtBj\r\nxygcqliGX5R2XcRcZZhM67OGkMiEQTd3c7eAKYEfQQGO7veLawBzayBjJpaOOlhjdqFvOOYFy+iK\r\nEuJCXjAFR3AEWfBxijQFK+SPH5h0mNSG43M54GWJlrFJ2EYIWMGJwBOMOkhj0hcduEQks6NChCWC\r\nIZKPXgADF+AAF5ABJXABJFACYBCHR2d+6OM\/aJRa78CMQJF3+NB+vsiJV\/d8zudufthExUiIKRSP\r\nZQiWT5CRRwAsQjBRkYc+VvCPSqd01Shh1vGAW4BtW2CFf7eHGBhxQrIlXJIj2HdCqAN5pIOGREb+\r\nZF9ABWtZed2HZGVkkkpZkqplHwC2Hp1BCHnIiWnABkuEBnAgih1mRGOwmU4SITmWikTiShK5PlC0\r\nQlTgYytUmOszjyH4jNBkXWmnDLn4CpPJfkxACGxADr+ZBsDDBlJQAjOVA0RQBERgAzlwOTI1BEPA\r\nM0LQA1BwBUYQBEdwlu6DnUOwA0twBE8wBTpQlkPQBUfwnRkZBFRABDUwBEuwA0eQBEcABUMQn09Q\r\nM1SQBAJEBEKgBBtZBV4yTaRwGHPpGS3JiTOXmWyABkqQBGEgBaKSA0IQBDnQWHGzA12TAzdwA04w\r\nBexUAzoAA+AZS92pAyVwA08AAzrAAixABTf+wAIu0AIwwAKjdQMtwAIzyqJREARYJaNP8AMtIARJ\r\n0FRQcEEr8ANMsAIu4AJ3pw3K8BBWcAu\/uW0KigbrYVhWCgdSQAQ7WB3rsz+veTpsiD+n4wSyFCxi\r\nio9U0Eyv4wWKYzEIyJqkMwVQkARdMAVJ8ExZECZjgQWJcByEUaAS+JucSAZGhAQrYAMwsDaJmgZB\r\nYAMrUAMw8AQycKP7xKI3QAQ7MARY5WYscAQ3EEslcKIlUAOjugNpc6IsYJySqgKrCgMlsKSpOqpE\r\nUAIyQAQjkAORmgQx4AJ4Jil5kykBwQVzqQQSuG2YyYlsAHFdRxVGJCYh4iRRwEpd8AQC5z7+UDA\/\r\nZko6VHCUa7qmyCRLrPkEUOA+ZVk2RDOWyISusjQE65kERPAj4CUFVQAFDdqgJ4kPD9EEvKGZ\/qoE\r\nUjAEOJADQCBTUtADUhAEbhY3OQADmwoDQVADN2AEm1oDRxCj9BQEN7ADREAFOYCqhuYEGDqhQfAE\r\ntdKdRCBoRxAEhnYENSAE9IRQEyoER4ADLsAsPQAESVAEUFAER4GJECGOyiqKd6cEQCA2SKMFt4Mm\r\nRzBaQwCzU5KdQ4CRKztaU0MEK1srVLADdSaytVoDGmqxOVBoBZWpGxoEmFIrOsChhcacgsacNqAD\r\nNLApOGADTTqVEMEF5LBtyIoENiA6YiL+Om8QBs05NFvqBFcAWNsqS8e0ppf1cVAgBJT1WVewaKHl\r\nPl5wWVtrpu5DBE8wSe5jWqElQGczFGGABVegH5KwFQf6mxmmBEUABENQBGyDAz7zqJCiqCzQA0sg\r\no0mwAywgA6MKq0EwBSVAJSUAA1SwqCxgBEbQqS1gnFc1BTsQAjWwpKMqZzdABaP6TpKqpDkAozYL\r\nBZVqAkMABC3gM2jRGVsgpYSqrBbor5lJBlIwYz7jBl\/gBKejJqfTbx8XRYwUWKiDuRf5raQzP6y5\r\nplOynkRwkZr7cXRaTayjDNV0Es6CCmFgE3qLrGwgC+XgBGFQt2yzNkGABkHQAjVgAzj+wKIskANj\r\nYKo46gLztQTvRAUhYKsbewPJewMwsFNrewO+6gWhKrEaqr+CwsM9zE5UEAQ44GY74AU\/UCotsAM\/\r\noMI8sCGEkcFBm2HKmmFrUAlf\/KBI8qBp8Gifu2hpMgbZWTRJsASKRDxZUDTx6QQlewRU6wWidQRG\r\ncARe8LQS9bRLYJ5DcGd6JgR93AMUygJasLJD8AM5O1BBUAoD6huzgKCa2U0D6wMU6gNJ0APQOQRj\r\ncEr\/5qXC5CDLiDpDdjoRIiJdhI8ndMobR2Q72UWqrEuVoESGuiAYIiHzYBMe3MXCKQVFMMxF4ASx\r\nW2gZhSSu40Y7qZpdZAViOsCMmEz+JUhZbAdGa4h5COY+l2M6FRwiKRHOJ6LFWCC0HXzOFthh6uyF\r\nJpYksryaFpdF8TjAbneGK4R2a5ePbXiGIyh55OOkIcIYFBIUGszFfFsVRVRjSGSMraQj8VyY2AeL\r\n9vyBSOZFMWTRLbSYJ+dCz2U6uvSEPyYXlVEEvXmsVhl4qmdEMaciNvdjIgJMDCjPbUpwKJQ6q7M\/\r\n\/WiNtNdGG7c7T9eApOAhkzmZ+pq37nuQK3JE08dERkQG\/ZYkXRQiOwlM5lOEz+iMaZeIYPR\/sdhG\r\niOF0ACbQyWFIbwEExuqb8OtizWdEMpZiDmkmWdTMrnnVV12EsflFfYQ+LYSGjuf+QhFiOuyDcJ1n\r\nH0+at4SKkGmQy35IY3k0mj8GFKizO4WZfS8ElvNI2boTlSaEfudTie9gIVnMDBp8mUZUBg9HjEJC\r\nFW31dLScQj62cVrUiq6IZIio1ycX2+cjYDt5SPERzk6mCAW9C1apC6VdgaL5cK6Jk5udk7NDhkVI\r\nexmN0+nzg5AdhYYUkGlBHIxh1lHqxb\/YRFRh2oTnJE60ItZtj1lkkbK919wHeR\/odoR1Ok9HDfJc\r\nPlfU2zxhDk1w2GwwRGuQYWeABXAwuKVUfyuS2lxicToS261ozxYJXdzXBa75ExLOeLT82WCHEehX\r\nHQgHIvLQQwJRBMaah23gAxj+YGUpIAIPIAIxwFW2ekpc4iRlsdvyXNXyDJj53AMyEFE4sAM9TqFH\r\ncAU8IE1nKVMsRQRYMAQrgANJgARHgHCjwgNAUJ1FwAhKwARAcIcjnodWwAM\/YNY8ILfDDAQ7UAQ0\r\nxh7UMQZbgDo17dLyzX0WqeN0tgMtsKGXIgRXIANLcAU2IANr07A5AAU\/kAMp3ONOoAWA5gQ+gAN4\r\nswRS0AI0YAOFza98u21yMLRsIAcdNmJwgCFvTd44lm9fDYs5OdtT0kVpcoZQoAVQUAVuJC6sTq\/9\r\n9zOW4zPplwRDoA1kYAUbcm1NcA55+N\/Jx4eLTWN2YYx2gXOnqEI91tqSXdX+tKnDMEDDKhCpIdQC\r\nMrACSfADKjAulRJOS+oCWBOjctawNYADSuACJmADLVAEOGACleDLe8sLXMAEYeBildBhSaQFqvd1\r\nhYUGB2IGQjIGWbAEUyAGXbQjFmMxEWLP5NpFC+YE30m56pMM6nNIgdtoUIC4bDImX0CuSkA+0KrF\r\nx0qlZeApNKADaOC3PiAD76DCOaADPZAGUeAC0xq3N0C3WTAGlaqhPWxmZPA1NrAE6\/MFMgADdIYp\r\nYsDu2K5cLXACPWAD8aoqPu4COQAmI2ADQz4td8MDRdADMVAEcuslGawEwD6BmskForMGnIMFQBAG\r\nWupoi3YlUIAhS8DGS5D+BGKwJJE7lo2cBGDQyUGw6iGi6BkVr1HALD9SOUlwllKiBAP1tN3paD1A\r\naDmQ9wSVaEmgAxDEA5NuC+TABWbfBOYg4loqJgArBE9QCd+58WECBVYQB0YgJUTwA1eABpvVwJpK\r\nNNt6hkswKhB1OULQP0zQA0QABUsQU0IQaVcwBUjT6m4kJnFcnVLABLzOJj+QFuZgmeTQBD7gA0AQ\r\nuzTQBGnANkAgBDDvpsw5Z03cA2pgBEtqZkOQBYLyWy1VqSWgvy4Es4sKA0JQBICwAgMjI8PSggPF\r\nIuMiY7PSeONCNMSC0+LSUlRkg7PyM3RiUxS2BaTExVV2dsZWZtUE28T+dpYWhgaXloZmi+brBeb7\r\ne+VLRoZGJuYllvXlBUxF5ZWV5fR1PfYVpnWVpPWVBZV1tRQ2faUldo1eleUldfWlNU8\/j64VBtSU\r\nylrGpuSDBg0lMbhwwlEDypUaMnLUcIEDjI0ROMLIGFQi05UoLWzIWFGjxQ4vLUqwIMJMyyAYLJ5c\r\nWpEEBA4YSU7sECICh0dChaLIk\/ctzDVt28gE3YJUnxUurFiF8eeKCxsuWMKESQMGixZ4SpSkuSJF\r\nC5grU8heqaLtirspT6jEW7LkCBVqWZYkeaIQypIn76JUIXdlY5SNSQor9PLN2bVtzbYl1oI4jI99\r\nq5pK8eGjCJDMNNL+aBmiBI4UKWhyLCGyBA2UJDJ2JOmRZEiSM0J+vIaCZokRIT6E7DgCjhqa3l+Y\r\niGFCBMmQIVC+JEHyhYcQeIWZ4BCCQ3YRKV+GIIESQwgU2EyKKCl1aukqf1KA2PABpAgPH26w5AAC\r\nh0gSNLIdpRnSAw826NBDgUiokQQQPdiwnxA96KADDjMs8Qw1YwwhwxU5VDEEDz3skEMRV+CQgxY9\r\nTOKEC5I4skMhLvQghQxKXPFDDDLEgGMLPlilTyrrnYEFE0yQEUZVTBSJBhY9OFYVYmA4Q5oY80Ah\r\njhdXgHGMF3BNIZZY02QR2xVkZEHGNFFokQQUShDxTTzyPKEFW2T+DOVYUFpUIQUU21Q1jylM+HiG\r\nP0UgQUMKOMZgqAtIIOEIiZC0MCILKviwhEkllNACIZmUMKIKLqiQaQtQiBGYDT2csIIMJ0KE3Qor\r\n2ODhqzc8ckgSjQjUAiZH8LDCCUTQgEIMLsTQwhDbnLKFKqqUUQYXWzSLxbNb8XKLF+Zwo4UVUUzx\r\nhTpiJPEFGmKIUWYSc86JmJvqBKbWPVqIM9g64ag1DllJXAEFPFLglSYUTEBhRb75SqFEFfMgu6w\/\r\nSgjEAw4xKLGGFjMIIYQNOfRGRhQ9yKACiVlUAcOHNeyAA4GOoDGFDjyMkQQKOYg57g059JADE1rY\r\nIIQWDfmGLw\/+QPzg4Ic9dNcDxT6Ym4MQHVpBYxE\/\/FyEFqbEkjAbViy6yXa6SLEJFESMhga++CZR\r\nRLdCGJGEEUTIsISBZFyBNhoc9kCMMbERIcSZQgRGSYfhzFzgDjfocITOMOywA6xfAGEyE1K4QIMN\r\nNEAotT5NBFoZF3hyDVC+V1gl5BU9IHGFEEyQU1YSBndD1hRLfCFOFqnLE48xZCDRg1\/MXYHElGee\r\nVQURaVCh+tGBeaFEWM798IUSUGCrhBVFaqXFKQkL2kIMK8RAAyM3\/nDFCgrxkMlHhjznAgt0H5Ir\r\nEFmwMF4JMuhwxQ0rODEnGkjsAIMLMDyKnI+8JlUusJV+RpD+gxZ8JFU4eJoJeHACGUAhVy6wTvYq\r\np4QmMItZZ9iCFsqgBV2wQgppWAMZ1LCMK13DSssYF+y+kA0wvGsKVlDNF6YwBTJhKQzGkEIUdhiF\r\naTjOX3f6ixbmlBYkqM4nsAvMaphQBX8xQXVKKIJWTIGKqhUhBjxoAQ20gAMcnAAiNnqZI2BwAg0J\r\nYRDgiqAMXuCCL5BABjOAARHQcB0WeEQKRCKDC0xQCBm0AAhfwIELeJCDKBjSBTrIQQ5aM4SODEEH\r\noJAgIkewgiFEAQg0GMEHcFCEHVUPFRxkRbas4IMqoMEK3MiTFKogvcDAAw1gWs0UxEAFKEzBCDpQ\r\nAxWmoJf+JYzhl1NgwhJg9jYqwOUIS2hO68qilyc0szDiiYIRdKObI0whTX5hQticpzosAAGDlGEF\r\nG4DwAiYoQUFKZAIhpwgFL+DNQ3c7Asoopk0h6CBtyizBFIRghR7AAC\/jGpcShuADKPzgB7tJQly2\r\nxIIkzKAHcLnQdeiWBB3pUokAQ4IRmKDEgPVAK6fQYD\/OAJCG+QAHNHhQiTA0BDV8Kwk4aBgYeOAF\r\nI8BgBto8wg50MAMjQCEFg5uCT3WwAyuoA4w1gIHaeDAyItwAB4JLAgxwcIMbFAIKQ+CNEJr5A5EI\r\nQQWqQsIYbUAs7FQEi0xpSqC0oAoxoOEMUDjGF54UhdX+NOdtc0LTFsjwyyUYYx5j+CsaqKBUMYzB\r\nDOQSyy7jMSV3dAuyKBsVva7Wrisw4SfXeBt0vpEFVvbJB9FTRaDYwIQZpKAQPNCZ9loQGx3IQAgQ\r\n+UFGZHCJXBXtIj0I6wx+2r86HsIGWSAXGnoggoeEBAXz08EXBtGCKYRVBjfQglZNMpMWbCiCMBBV\r\nElbwghc8h4EYTBZTVrGGM5DBClVACxqcAwZb3AIZzWCXWn5Z0CZEA4eIRewTgFPMdBwRMl5QyC3L\r\n0q1fXsFKNFTLFPY7hSjGgwl+UUjAqISOKeQJrunxkcJokIOGmSBAO\/jBh3iQBCHgLXcOKoENbPPb\r\nm+j+4HA60KkQ0raDiT0SHduYMeKauoMrIG4HU4DBDXZAhcP1IAtZ3QHdiIDIEuNgYyDtAXxIFqDz\r\niLO0zJKKFIYABJsVpm9xwdm99CO2wqSJYkE4G4CEMAXExfmnN\/DBDapApO7sIAiBM4IXbnASK\/h0\r\nCFpAnA+EjNQnIy4HWIVQFYCgE+rOIIy90wJpfUSG9RRMQWAqjluc5A4iVMEtgdnBEpSJ2G+dLQnE\r\no8I1xwBMdg1FCDw45heesMtxQOEI0XyCGP6JryHwGgp5zSHsrFCWs\/yLikBQXoeXdQYkxODRhdCq\r\ndlfEBBu0yAUPccESdtDUG8SAyDtwQQl0AIVBxMD+qSZhwQjM5QU0QJoFQsiCAlvghCmAaiUjqUEN\r\nxCDQF2TVE8WytyC32YIXoKoFKHjVNnyABA9vEA1lEINnZCicYuCroOAYAxq6wBYqbOEZ6ogGfvk7\r\nDiKI6Rr1oEactCC7JVRhGjekwg3VAhducIstVIrwFAqMgxwKbB6ktUKyykAGNkh7cjzggQyAAAUZ\r\nYIgHorOBzJzMghog1QvnRhxQKWkGHdxA3TNoGAysYLscDAKrN3iBDoYAg\/ch4gbfPrJIKrUBoLag\r\nCktQIBsPF1AC6QBWXLB0aaXCLCsoIQlCqsK9vuDDNIWNHM3UpW6mAFgrtIUJRrgmGR48hGuq+V7+\r\n56oCxdjyhCHg0AhVeIJDh+06IhyhG0\/QD2rI8YTaF3MIyEaocpLgQYinQlllaAIT1uCDj8YmimRg\r\nQpBXs4Qs4KUsYoABnF3XhAcrU83ADD3MST8nJPygNaYWww98SqO0iWEJQXAovnJQmCUElJeweZ1d\r\njNADJaAJ3fo3\/D6UpXQxsAVIIFsegQMSxBqMBm4MQQg6YGmI8yAvMAND0ASEcAkvYGQwsBosUAVY\r\nUj1H8ANIZQRTgFs38AU+QEdXMAQMIQNJQIJY5QNMNnbUhQNaIFsHuANZAAQK1FqWFnHEZzXZQgYm\r\ndAy01AVpoAZqAAZyhQYeN1lQoAbGYAawZgb+rkYGW0AFUhInjSUmR3QFrJQFWvBLjAVr3RIOOUQN\r\ngdEtWmAEYYgWMEcG0UMGdqEES6AVouWDS8EFxrAGQ7ACqyVI3fMFjGYDLDAIhggDL4ADLKAFtjUD\r\n93YDJTCCJTADMygSOvMCKCBYWyAGM8ACJUAC+1QCrKECgyADvmIICkRd2VaIjkBHgnQFQFACTNAD\r\nJnACKFBFKeADHtRhG4R0VgBFf8FeRhEOhUMqChEYqnRDD4ZDYig1VNAEuuQ6t2QX3pAMUtJfVDBM\r\nNySN+BKGgfFgUDAWf1EFg9Fe8UAWd3IFWIAFVRAGVWAzo6SHxnAGj0YDyeEg6CMEOfB2XxX+dUfg\r\nUDJABQeoNm22G1CAZEJwIzMwHlOlgcmwBT7wAy3yAj8FVN2wU4VAMTLwA2TQA1l1aDrAAipDVTLg\r\nA1\/QIjAQA1PmSDLAYYeXadFGAzbSdAxyBURwgIFDBFlgBD8lBBPSeUVjkXA2A8AEBDswgmmzBD6A\r\neeOiRMphBAzFUFvAIbthBB5VGGTgGz3wc88BIETwAzwQBVnAAz8AH6DQMONUPUyAFHvILNxgBcCo\r\njvPwXs8ABU8wWeigWCMnD96AGEixBEMgBlvgUDmEWGDAib8GjcUkJFnIHFMwBFVgbEJFYVICTKIW\r\nGKABN1\/whQEjBViwXqzEBUWHaWcABIb+IgMp4AInkAREIAJZgANkZW43gAk3oAIqkAVCUAJE1gI3\r\nQAJwVhIkYARPUBIJVwI4UFzjQiyqKAMoMAVIcHZDwFwhIzG41QJZEEnm4wg0gAkl8gLbk5o4YAUp\r\ngANGQVrmtUHZImFMgyVfoAbxYHHK0C3jYgVjsFRl+GBIIQ3qoH1VQCpKlZif15TkUlC2Qy5ngQyk\r\n0i1kYDBWQQxx2XxnQQ8GQz3nmQp8yAQy0FI24AIzwgMtchGCY2T\/dQNr9HVTMAM68ARZdW4JtwPE\r\neW4OcZKJ+QItEIpG4Jy0CQUimYiNYAIoAFI0ADk0MAMyUggpMAMzID6MgKQ44gKQkwr+pKVBgIJs\r\ncckEsoEmsaFiR0AEXUpDzKQfszUGI6gFFFNjR3BNVWkEyUd6X8CgxvRg3rAE3AJ9cLEX9\/IuUVRM\r\nXLJsLmgzigcFVaAEPQAFQAAEUmKhzbIKVmCoeSMGtdFVUzAGdwkuTPBVeyNd10QEOKQDVABnnZcy\r\nRiAGQ+BkpjYUn+FQE2gFyzEEPzAFSoACFAUXjIME+lEFLYghSBA8QMB4oTcFL0BaSMA4UoNF+5Bp\r\nUsEEPIA2dBOWjMIbqKI0KDAIL2IET0oCv2kEJPAERRNeLKEDgRcX4jmYJwgESwAhSLCbQPUDSlAy\r\nHBkhNfUDiVCWEpIEPmADM7B4NMD+A0rAAzTAUhCCCmzlI6ogLsmQGLZjnwQ6FAv6DS\/3BVvAcumg\r\nDsExLl7Amc2QDru2G1KTgwETJ7dkFFwiQ9mCBU6UQ+jAmUxgBfI3DzZTMFJDBqQFV7bTQV9osw9m\r\nX80wsRbrDM2wDFRAYGFoJeMgWnSxsNegA5QIA4UzY6DYAp8YdzCAAnfGAizQK6giiS0TmCfQAidA\r\niVegoVbgArFKBqN5eGVgBmfQBGgzBHhDBGqjNENwBfY5n0d7DYo1n5yYDt0iD8sgD2FoFCzHX+Ty\r\nS9qkFumAs6RCDUIQRWghBkp1J+wlD3F5RHGJdma7FH9FBmaQDM3QDB2nWBOrDMv+gEQFJSUWC7Q8\r\new10gRj0EIZSYgMtkKKCJJJPkLQQQjIi0QOdRwg9QASMhFs9MGU9AJCsNQQ0AB4xUARlC3FSwwXk\r\nMoVxYgSzJQNE0AMtcDZdKgRiYGdHcDYFYpVUsE+EQ6qxgSYciX\/LUVxSQ6qkamIL5TpKowO80Xmq\r\nlwSIkyb7gxprmmJV1gMqy7j1ai5lAARIcDllawac60FL4Bs3YARHcGRHlgM3MAVBQDJU1QOV6MBx\r\nljJCYMEzUAK5V6opigNZ6EHB1KuS6qspZmpCoExSh0PSBWdwwTSMBwVCRQVMcAOMxwTGt7kFPI+b\r\ni6Lm6iBZdWR7RgVEYMFHUAL+QRAEYre9EHxuRlCiQcCQDEV3U1ACZ4Nkg0kFMlACGFhtVJCJL2Cd\r\nKOBPOoAChyCSLGDGM\/ACbYMCj0AsPVwCNhKJP2AGBoEES2E7ZjAen1FuMKADQXDEVOAQQeCpOfaR\r\nPfBLvgFnPWDBO8BVJDOCg\/MgJowUuLRLULAFTJCFV8BMcwoU34AYXJKFv\/YxcTkFnBgLJnREV7gF\r\nZgDEzoLARlCRwhZnYrcccHYENUAFY1cCMOCqIFwCrma7R9CpbhANYlCFIqeNIjcuX4wpRnApLxDG\r\nRnAFLSACIQADZJxwKNAiYRzGZby7IJA9MRBeqpUjTZDAyGJem3vD\/6XIulH+oiqCa758NsPZBGfz\r\nA3PqOq73BIU1mOMCsVjIWFi4BZeHhcqEQ1CUQ3o6jUagenO6JUsQPc4BBdn3S00QC8gmcmYwKP\/H\r\nBZx7hQ\/2BdEAQ2BABWAwBi\/dLYVFBVVYhXtpclMIzbhkcpwYDS+dZCIBIUOwBQ+yoyapT8SszK7h\r\ndbu0A8nXA5GpA+7kM2izBEBgBLMs0gZc0nsIkU8wfj6JVDugBeP2UzdBBbYFISWjomOgkD8wOIgD\r\nyjIQBNfxk5iHhSFY1jqwSzrQNiVjZT5AbnRX1injdirFBJ2Kfz1QrhbJBGdAyxl0BsNnBik9TD7l\r\nwT91BGOqYiQzA79ESb3+JQQOLAZPwEu10Vunxks30ZMi91c4rH36ZXMxPKcjSEOCRkOn\/Bdzeidi\r\noF9bYNdc4oLvnARGV9BqsAPndjg\/0BaYIjhel9JGVqSUhFTzk0uSiLtioKJbsJuDo9dLRUcKpAOy\r\nqwMF5JslMEkiYAjEUgLidrwlgAI\/8AIk8FO5wlwiAQQxAAUkMAXCbXSaawaxsQTnd03EIwRcSjFw\r\nNqZ4TapxXODRABs9KZC5twVnUxswcEsPK4atPHImhw7RkIY5jEMNjUuBgRTUsAVWkAVNoIXkcoVW\r\nkMCLYnR\/\/DNiVwIgeG515GNIZa4QUgJbMGNAdQMgrI0K3dDpIA3TUA\/+B5hVO9XKVkBqc3G4fSty\r\nRocYzOAFYzAP3sJY5KK5SPHYIneFxrC2DLVn8UsxbAtnv2R5D0baaPrArF1YL0246eBBEitdumFq\r\nSJCF1+BBm1zQD2u640IGi8W5ZpCEm2voCazoL27AjGU7g56ECatYL\/3SSagGir5YhTWFi+UGCb25\r\ne2kMf1XQ40JYj36NBcWJEJkMqy7og57AwjBXib4Gir4Gs\/7OSpAsf6XrDwvNIicPEEsu9vnpXC7T\r\nCS3olM7qpiuxSCGxo36Fo57qj06gUliEaZu2lz7rtW7ril5Sxs6JEPvre54Y0z4uY2AMck6GyH7u\r\nW2CfARroHhTop+7+54Mu7a1e6NWehLV+6Waw7e\/s0c6SmFLC0zYH7qhO6AlM6d8+y1yuucZAoAU9\r\nWPKA6gFfUOZ+jVH46Bj\/0maABouOBul1BrWewCL\/w9GDFCcfr+e2UFuM167BdaENVPcbVDCgXzKw\r\noqyUojSAQ8uBQ29kkpN2ESggWzOAnYSWY5WI3S2gA1tAaJMkqTAUhYaO7drO74a+BgGTwBDXBCc\/\r\n05R0bpdyKUl73Hq9m\/OzxfwjvKc2vkZABcf7om1\/lVNwgBPoIUF\/gN8alXEW5NElOMDhqoiDdiy+\r\n7\/te9YW\/BsCUwD4TCxo+cl7g5G5gBc9QWCe\/BZ2O8IrlBrPMiYXQPi5Vj\/HPvrkOj7BSuFhhfkJh\r\nnsDUzrmln8BJKPXZ3u8J7Ng0oPXIhkNX0AVxeeJM8wxewO5xzu7ObAacKOePXvqmbqAG+vCrngyS\r\nzuIszvzHrgZjcOnYXv2FP\/JpO8VL0MMxXNs4ZHTu0Pi+T\/ya\/9K6jvznHvrPT+6ifo0QOeqtPv3x\r\nLoWtv+2Ev+gJTIkMtShbgmu1DQhWZlReVFteW1tjiotmZltmZGRjkmORZGqSmmKVkmJiiWScmpOh\r\nnptbn5pmamprjmuxZq+wZ45mgQA7\r\n",
  "bhl_pages": [
    2848076,
    2848077,
    2848078,
    2848079,
    2848080,
    2848081,
    2848082,
    2848083,
    2848084,
    2848085,
    2848086,
    2848087,
    2848088,
    2848089,
    2848090,
    2848091,
    2848093,
    2848094,
    2848095
  ],
  "names": [
    {
      "namestring": "Odorrana",
      "identifiers": {
        "namebankID": 31636
      },
      "pages": [
        2848076,
        2848083,
        2848085,
        2848086,
        2848094
      ]
    },
    {
      "namestring": "Theloderma stellatum",
      "identifiers": {
        "namebankID": 30792
      },
      "pages": [
        2848076
      ]
    },
    {
      "namestring": "Rhacophorus",
      "identifiers": {
        "namebankID": 5056492
      },
      "pages": [
        2848076,
        2848090,
        2848094
      ]
    },
    {
      "namestring": "Fejervarya",
      "identifiers": {
        "namebankID": 31617
      },
      "pages": [
        2848076,
        2848078,
        2848086,
        2848087,
        2848088,
        2848089,
        2848090
      ]
    },
    {
      "namestring": "Megophrys",
      "identifiers": {
        "namebankID": 2476721
      },
      "pages": [
        2848076,
        2848078,
        2848082,
        2848083,
        2848094
      ]
    },
    {
      "namestring": "Odorrana indeprensa",
      "identifiers": {
        "namebankID": 0
      },
      "pages": [
        2848076,
        2848085,
        2848086,
        2848095
      ]
    },
    {
      "namestring": "Paa fasciculispina",
      "identifiers": {
        "namebankID": 30141
      },
      "pages": [
        2848076
      ]
    },
    {
      "namestring": "Rhacophorus jarujini",
      "identifiers": {
        "namebankID": 0
      },
      "pages": [
        2848076,
        2848090,
        2848091
      ]
    },
    {
      "namestring": "Rana livida",
      "identifiers": {
        "namebankID": 30453
      },
      "pages": [
        2848076,
        2848083,
        2848086
      ]
    },
    {
      "namestring": "Megophrys pachyproctus",
      "identifiers": {
        "namebankID": 29314
      },
      "pages": [
        2848078,
        2848082
      ]
    },
    {
      "namestring": "Megophryidae",
      "identifiers": {
        "namebankID": 2476891
      },
      "pages": [
        2848078
      ]
    },
    {
      "namestring": "Megophrys lekaguli",
      "identifiers": {
        "namebankID": 0
      },
      "pages": [
        2848078,
        2848079,
        2848081,
        2848082
      ]
    },
    {
      "namestring": "Odorrana graminea",
      "identifiers": {
        "namebankID": 0
      },
      "pages": [
        2848078,
        2848085,
        2848095
      ]
    },
    {
      "namestring": "Megophrys jingdongensis",
      "identifiers": {
        "namebankID": 0
      },
      "pages": [
        2848078
      ]
    },
    {
      "namestring": "Megophrys funnel",
      "identifiers": {
        "namebankID": 0
      },
      "pages": [
        2848081
      ]
    },
    {
      "namestring": "Megophrys aceras",
      "identifiers": {
        "namebankID": 29298
      },
      "pages": [
        2848082,
        2848094
      ]
    },
    {
      "namestring": "Megophrys longipes",
      "identifiers": {
        "namebankID": 29308
      },
      "pages": [
        2848082,
        2848094
      ]
    },
    {
      "namestring": "Megophrys minor",
      "identifiers": {
        "namebankID": 29310
      },
      "pages": [
        2848082,
        2848094
      ]
    },
    {
      "namestring": "Megophrys kuatunensis",
      "identifiers": {
        "namebankID": 29306
      },
      "pages": [
        2848082,
        2848094
      ]
    },
    {
      "namestring": "Megophrys nasuta",
      "identifiers": {
        "namebankID": 4804167
      },
      "pages": [
        2848082,
        2848094
      ]
    },
    {
      "namestring": "Megophrys palpebralespinosa",
      "identifiers": {
        "namebankID": 29315
      },
      "pages": [
        2848082,
        2848094
      ]
    },
    {
      "namestring": "Megophrys brachykolos",
      "identifiers": {
        "namebankID": 29301
      },
      "pages": [
        2848082
      ]
    },
    {
      "namestring": "Megophrys major",
      "identifiers": {
        "namebankID": 5457179
      },
      "pages": [
        2848082,
        2848094
      ]
    },
    {
      "namestring": "Megophrys auralensis",
      "identifiers": {
        "namebankID": 5570135
      },
      "pages": [
        2848082,
        2848094
      ]
    },
    {
      "namestring": "Megophrys parva",
      "identifiers": {
        "namebankID": 29316
      },
      "pages": [
        2848082,
        2848094
      ]
    },
    {
      "namestring": "Megophrys palpebra",
      "identifiers": {
        "namebankID": 0
      },
      "pages": [
        2848082
      ]
    },
    {
      "namestring": "Odorrana aureola",
      "identifiers": {
        "namebankID": 0
      },
      "pages": [
        2848083,
        2848085,
        2848086
      ]
    },
    {
      "namestring": "Xenophrys",
      "identifiers": {
        "namebankID": 31508
      },
      "pages": [
        2848083
      ]
    },
    {
      "namestring": "Ranidae",
      "identifiers": {
        "namebankID": 2476894
      },
      "pages": [
        2848083,
        2848093
      ]
    },
    {
      "namestring": "Odorrana chloronota",
      "identifiers": {
        "namebankID": 0
      },
      "pages": [
        2848085,
        2848086,
        2848094
      ]
    },
    {
      "namestring": "Odorrana morafkai",
      "identifiers": {
        "namebankID": 0
      },
      "pages": [
        2848085,
        2848095
      ]
    },
    {
      "namestring": "Odorrana banaorum",
      "identifiers": {
        "namebankID": 0
      },
      "pages": [
        2848085
      ]
    },
    {
      "namestring": "Odorrana livida",
      "identifiers": {
        "namebankID": 5748883
      },
      "pages": [
        2848085,
        2848086,
        2848095
      ]
    },
    {
      "namestring": "Odorrana aureo",
      "identifiers": {
        "namebankID": 0
      },
      "pages": [
        2848086
      ]
    },
    {
      "namestring": "Fejervarya limnocharis",
      "identifiers": {
        "namebankID": 4805106
      },
      "pages": [
        2848090,
        2848095
      ]
    },
    {
      "namestring": "Rhacophoridae",
      "identifiers": {
        "namebankID": 31790
      },
      "pages": [
        2848090
      ]
    },
    {
      "namestring": "Fejervarya raja",
      "identifiers": {
        "namebankID": 4805130
      },
      "pages": [
        2848090,
        2848095
      ]
    },
    {
      "namestring": "Fejervarya cancrivora",
      "identifiers": {
        "namebankID": 4805095
      },
      "pages": [
        2848090,
        2848095
      ]
    },
    {
      "namestring": "Megalophrys",
      "identifiers": {
        "namebankID": 4234840
      },
      "pages": [
        2848093
      ]
    },
    {
      "namestring": "Rana banaorum",
      "identifiers": {
        "namebankID": 4805483
      },
      "pages": [
        2848093
      ]
    },
    {
      "namestring": "Rana morafkai",
      "identifiers": {
        "namebankID": 4805618
      },
      "pages": [
        2848093
      ]
    },
    {
      "namestring": "Batrachia",
      "identifiers": {
        "namebankID": 5952690
      },
      "pages": [
        2848093
      ]
    },
    {
      "namestring": "Amphibia",
      "identifiers": {
        "namebankID": 2476588
      },
      "pages": [
        2848093,
        2848094
      ]
    },
    {
      "namestring": "Megophrys omeimontis",
      "identifiers": {
        "namebankID": 29313
      },
      "pages": [
        2848093
      ]
    },
    {
      "namestring": "Rana pileata",
      "identifiers": {
        "namebankID": 0
      },
      "pages": [
        2848093
      ]
    },
    {
      "namestring": "Primus continens",
      "identifiers": {
        "namebankID": 0
      },
      "pages": [
        2848093
      ]
    },
    {
      "namestring": "Fasciculus",
      "identifiers": {
        "namebankID": 2560425
      },
      "pages": [
        2848093
      ]
    },
    {
      "namestring": "Anura",
      "identifiers": {
        "namebankID": 2476589
      },
      "pages": [
        2848094
      ]
    },
    {
      "namestring": "Reptilia",
      "identifiers": {
        "namebankID": 2549792
      },
      "pages": [
        2848094
      ]
    }
  ],
  "status": 200
}';


$json = '
{
  "_id": "79bf83103db6ffd731c3cbef47b13f94",
  "_rev": "5-f6492319b8947f833941fc53c8ede187",
  "type": "article",
  "provenance": {
    "mysql": {
      "id": "4439446",
      "modified": "2013-06-04 14:54:24"
    },
    "biostor": {
      "time": "2014-09-26T07:37:00+0000",
      "url": "http:\/\/direct.biostor.org\/reference\/109618.json"
    }
  },
  "citation_string": "David C Blackburn (2009) Description and phylogenetic relationships of two new species of miniature Arthroleptis (Anura: Arthroleptidae) from the eastern arc mountains of Tanzania. Breviora, 517: 1--17",
  "title": "Description and phylogenetic relationships of two new species of miniature Arthroleptis (Anura: Arthroleptidae) from the eastern arc mountains of Tanzania",
  "journal": {
    "name": "Breviora",
    "volume": "517",
    "pages": "1--17",
    "identifier": [
      {
        "id": "0006-9698",
        "type": "issn"
      }
    ]
  },
  "year": "2009",
  "identifier": [
    {
      "type": "doi",
      "id": "10.3099\/0006-9698-517.1.1"
    },
    {
      "type": "biostor",
      "id": "109618"
    }
  ],
  "publisher": "Museum of Comparative Zoology, Harvard University",
  "thumbnail": "data:image\/gif;base64,R0lGODlhZACVAPYAAH1+doKCdoODe4eIgIuLg4+Rh5GSh5OUjJeYjZqZj5WWkZiXkZeYkZuclJ+f\r\nmaCelZ+gl5+gmaGilqOkm6imnqeonqmqnqanoainoaeooKyso62uqbCvp7Cvqa+wpq+wqrKyprO0\r\nrLm3rre4rLm5rra2sLe4sru8tL6+ucC\/ur\/Atb\/AucHCtsPDvMjHvsfIvcnKvsbGwcjHwcfIw8vL\r\nxM7OydDPy8\/Qxc\/QytHSxtPTzNfYzdnaztXW0djX09fY0tvb1N7e2uDf2d\/g1d\/g2uHi1uLj3Ofo\r\n3Onr3u3w3+Xm4ujn4+fo4+rr5O3t6vDv6u\/w5O\/w6\/Hz5v3\/5\/Lz7ff47P3\/7vX18vf48v3+9P\/\/\r\n\/QAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA\r\nAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5\r\nBAAAAAAALAAAAABkAJUAAAf+gFZZg1qEWVqIiYqLjI2Oj5CRkpOCg4eHiYSTm5ydnpGVlpiYn6Wm\r\np5ChiKOFqK6vpZatl7C1tpSiq7e7vItWoYa9wreqtKTDyKa\/ucfJzp7Ll8bP1JvFtK28xrnZ1Yqi\r\n0t3NsNjfut6Ildma46\/lje3PzKPxsd2b9cLA6+f5kuGc\/PEqVoiVwEia0H1iVlAXQHsQqakrR+rg\r\no4QKOzFkJ8sUFosX7+kLVhDjuYzPCGbCQoTIDyDHlPiw4aPGFUVXYqSwEeOEkURRatSgoeXKjBmJ\r\nrtSIoWQREBo4mipaUtOHjpuMrgQJOE\/WhwJNPiDFdOXCBi0oLmBFdGKAEy3+K1BowYKoRgEfiErg\r\nTRSjwVotJ04UikE0EZYZcnV8+IvIyATGF8GVPGRCgRYaF1iFkOsEABFFNA5oMfIZpwOiWhfVuEAX\r\nkRO\/iK5skIqoppYlB2gnqlkD3zZWKAbEICCXVIkLHxT0VtSDQJACKxjNsBxkieoJzFnzRZoIBwoU\r\nIbYuImJkSQjI8IJNQ8EAS5AGe\/Oi6DGAcQ\/qW\/++nlFakQ7siQThwE2HrKCDIkI5ccFbi+gQhBIo\r\nxJcKOOyg1QAiKAjW2gcmaHHBBapZpoUTETQxVyKhMcjcgEk5sFcQIIJGVAwiLBKEeEEIJsk+s2Qh\r\nWwFBzOCAibVtAKITB8T+kFQJDfzQAgoYnARhIzXMNpUJQRCBgnWJLEFDDFdg8UFhRelVlA8zHIgQ\r\nhbNcoYQRQfyA1SFOOLHETU7YFJsTV0TRxJzdoHdTa4rUmdUVWLmX6Fo3obeIepM9epJvIqEEiWQG\r\niRPPpvW0RqilJa1zDEmVRgYSIx9J1NE0OBCBBQpXJHSQEoPeKBcinxblSDxL9KDUIk6I54lksyAS\r\nxJYf0HWqEzPcNMMPWvS3yVYqFnoFDdKO1kIsDK2SxbFoatXDEi0oMUMQTvjgBA419CBVDz4QsRwL\r\nezlRLhEpxOCEEfrWkCcOS8TwqhbN+ttDD90hvIQNSgThQ01K0LCEvzf+\/sMmLSg0EcUKUfRQwmo7\r\nmADEEifkOAMNhdVgQxC9ZUHFDEcs4YQJPgTBoZcbEIHlCS2FEAUNM2thUw3i5eTEyufWFMTKEZoQ\r\nrG67dnVJonPFughWf0Hmo0lajLtIro84GlsPdk4ii3rc8FPqpViADY9CmHaUSbGnmqPsR9Jk4baq\r\n3GADad3pnQ2qt4bETdI0aw8+7NmFh5o44IozwnhDmSCOeOSuYFo55SZVhPkpE+UdaY\/9fI6K5hQ+\r\ndPgmSvRANA01zODEBx+kEMQG31XLd4Wl13LFEjIboQStDj9YvNjDMO5jE8w3wQQVVNQZRRR1NuFE\r\nFNDXqf323Mt8vfb+1POJaJ1XcM99+X2WT7726q\/PJ\/tRRF14FlW0\/VHbhWBBIP72h6n\/\/\/9DVKN0\r\npatGISopjCoK1ghIwAU6YoCBk8USdMAE5hFBCX6Kwk2GQoQ6Qe4tZOOTFo41A6a8glnjI5+beoCu\r\nRhDEBz\/QgQlMgIAN6GAEK6gBFmhgghqs4ARMKAWtYhCEHjQLQigwoSuYNbwY9NBX5oJa5RhHhSpc\r\noX5YoIL+rtAE+7UtTP4DIwC3KMAymvGMCjxjGbeowDQOSo0HjKAlroAEJtjxjkxYAvPsOD3sWS96\r\nf3pf+aJnPvO1733f2974wle+8Enve2UU5PvkxwpNTcp0tUjd5aL+hsnTcQMLRmjCEZhnhFEKL5TO\r\newsW6mSEK1ABXcCzDiKVYCclyMx7dbKOm3DpSCd0cESNHB776jS88QnTCbY0FDyA4bINFEADDSDA\r\nDADAAACEwAQHmMAHGLAEEZQAAwQoAQoEoIHjhIAFGiiACwgQgg4Q4AQtuMB5DtCAB1wgCB0IAQYc\r\n0IELpAADE+iAA+zpAxRMQANl6YACPhACnS3ABBdAgRIicIALOCAGJSDOWVy4Dyw87AcOk4kOrhIE\r\nIFSHT0EwArOc0ATgIbMJShBCw9SVrjpdUAsNu9ESWnJBRAphCejSoEtxqr47acV7t+kgrahCS0dc\r\nAxM6oMEO8jT+gxa0wAc9MEILiBgDFBzISyjbKgpm0AMatC4FM5iJDp5wI6uYKwhCKAoRZmADnujE\r\nBkuRlxNjgJiaxctcSZxBCGLQqxS0IARSVMRTBxGCDLRANg7wgAk2cE7K6kADDGhWCSbQAhqcAAQa\r\nKKcGUtCBtKbABCnoQQdQYIMO+EADJ+iADZyAgQfEwAbffADuMMDDj5ngBBfowAliEIMapGUCKNjA\r\nbKq0AQUg7BHM9Bb+LHE3\/OUPC\/HTH0udAD38aVCS4sPCEp5QFPFpAXqIIu\/4DMgo3S3kGnQTXUMO\r\n4YMGtGADoZ3ABA5AgQ5goQMPeEAKroCBBmigAynwAQYw0NX+DgD4BELIKA1we4LvhGAGFb4AYmwR\r\nXdFxRBwjapcOZCKEmghBCFQYqQ+sIwQd1EwIbpIpvNLVQSLYoE8yseXIyJZSHyCvE9EgnOE+3EnQ\r\nXWxu7xgV74oMCuV5br6rS9yJrobJ6EZqyQbZZCLKeiMaPAgvSujAEmTigy+xzAcNq0YWmPkbv2X5\r\ncSXtgRBoQpXbtMBhRCjoDJRQAx\/\/mBh9u3KxRrcNJjc5dKsS3PzeAeIpQ+LPw9iH5ehxSUMDOW5M\r\nCCUToEAFKFQBp1RAcxOCMNUqKKGLT9AjFp5AzLdUh9Wt1goRBHhBGwAVXU+jwogmNmaZdbCm1qlY\r\nq2qJUhH+MiLIsvDBCkCwghWgDC8+aEIJShAYZi+hBCnIUwlocIXDsmDb136CDPKF2nK5rgQtqUEK\r\ncOdEFCylBAgLAg1KQJgnoaA6GzBunkzQq+8k0SZfQg+bqQCELtavClqkQkuXoLcs3iQIXfQfXajg\r\nyix+sWviW2+vBXgbEaqxvE2h1QE1zicNrtep0RhEE0IQghasoKotGEKamBACehtUScY1AQvM1YE+\r\nn+DCJQACT4SwWiDopHYcClIK7k2EE5hgzyaIAQ6kTtw81cAEK+hqCRhm6+LeyAQowJJRBsxRcFTB\r\n0\/bT23nn4oTpXuEJDZ\/jTXRNCCqot21R0CVOXAPBpMT+RgsaRAStIPHdETl1zaI4wgRGoIKWq+AE\r\nQ2ABCozQgBk0AQXifABndeACf1leB+52ggZCcAIbACGJMQDC1rOdgnv2WSl4RcEHWlfcGgSluDZA\r\nwWGdni4fmIAnPZB9CW02gwVxFBhWwALCq8gE+zVheeXVH8UvThfpn1eLWngCouhyE+ChL2txLJ9R\r\nR\/478Zm3gOX7O8or8ZEjsEAFGhjBCXSwbKDpAMMYFgEQdqCBcZc+qqslQwUlBHvlAydAbyVQMPDm\r\nA4O1BAwle0UUAx+CAg7AMvdWQs1VAkGAUR9gA8r1HbnHIVfnXlrAZlVwBEZQBEYwBFWwgk0gBU0A\r\nSH\/+1ARAwFLWQ0zCxEVuInJEEEsiRz53MkJjRit8QkuRpD3JhChUoRW0RD5GaGy+8AuhUAQqoAIk\r\nAAUtAAQt0AQ+wAJPZwRUQAMtwAQ\/4AI2sAP6ogMYECx89QAnAHD0hibpQisq8wHEpQMxoDBM0Ss9\r\nYAMzUAK2VDBPJxQz4C8zkyewklpjdQUfICyKFQ2CUAVIUAQsuGlgWAU7VXBXgIJcFEpPoAN\/4mPI\r\nJFPAM0I6MF6ohidjJgROAARKQF5U8IPEFARK6CYPkic5KHK0aCcPggWDd2xSiHhIoAMwwAMqUIww\r\nQAI30HknoAJ3tgM7QAM6UAPQaBVC0AMnoARWNRP+IUATuEUD4OGHMzFnNvAEPQAENTBiPMQbVIFm\r\nKsNCNjAuDtNnriMUfbYvZFUDPwGMglAJUlAEPDAEOwAEQ3ADA7kDK1hKTfADM2ACLiZnDaMEI7UE\r\nQpBWRmADOnAwikgD8TJ0WLVTD0NLPhADeVYdQWBHIKVSIRksxjMxt2hL8OJjxzcIgtAERQAERYCC\r\nUAAEOLADzTOQLRAFmfYEp2YEDuIDHnUEVyEErmgdS5ACMqUUJ0VLwHNbfRYFNxYFZIUutDQ8RvQ7\r\nRbQ0N6IE8RiSdwIvAgeJWQAFOwADOsAzQyBVLPAD5PEDMfACotQELaZWLuACKQYnR9Bi50hxdYX+\r\nLrCTJQwjBDcSO+iiLkvwA3TZOq2zFFuCVSvwA62CAyCFGOcCcfKWlpUgCEUAA1SgkLH4PDowBApn\r\nPdF2BUbwBNFzBHaifUYABOVhJ8FyY0+Qaohia8DThHM4h+rzA7TiK7tgBVWwDKLJbBvQbEDwAipg\r\nBC4QAy3AAixwAhuwczSQAkZQVTLQAn0oAtWJVh1QVvQ2YUtHBBvQWROAAUbQAymQL11lAnNFnTiA\r\nAyYQRMSQfDSpSZOzK5szN42QK3tjNpVmDco5CB\/haf55QIOAfbqWDXijC+SVKgIqKYrwKZjQGgsE\r\naTO5ZssQAiDAAkWQA\/d1AzTgIyBgAhPAAt3+OQEiwAAVdgKFeATwVHMSs522YwOBQVWYxxQIZgId\r\nIATdaQNPhwNQ0QQrgAPbRlnHghw\/9ERA1o\/9OAhSgARIUAVnhwTMozcshYLNNzyhpEdN0EoxKFO7\r\nqT529yZc1AQ9AFME11JKYHeIonDT8z6OhEFK5ZoYFD+cIIVUymYcoWRvg6HmkAwAEQ+ACqKCgAXB\r\n6J\/dAmVtVkkW2goTqjbKgmT30Az1UKWVoKX+6SkFoSyQgisFejVg4yOOhiumahisegjWBQrBKAg8\r\nMKIsAAIeAAQ\/wAMsMAITQAO22QIOCQPdCANDYZTSaAQ\/9wA6UAJRRQMtZgOhZgPf6QMXsJ3+7eQv\r\nJ3AEaeJZODABPdGcP2AEM2QVQGMCH9AETYdhOhACKLNnM9mPVSAFULCCQ8BpUlBKRYAEUkAFR7AD\r\nR0AFdsQ8SCCDNigET8A8eqRwS7BqMdOEUfAmcxos6UUFSyCURFCmTBAFWHCDGrRKd7JKjTRm6bNM\r\noZkFowkDOQADMleFxygFNzAEUbADP8AEQ7CrLHB6OpADNyAEWMADP7WdQ5ECOiBeNsCR5ngCcoZX\r\nQkFiPpAC2PIDPcAEREEE9IekOGBES6CZN7ACIYADTPACsUMDzXJ8wSgFQzAER6C2RqkDPMADUrAD\r\nUZAFR0AEUUAEFVRKOCkER3AEHvUEWAD+BDpQmwPZNksQM0\/AlK7YMCz0SMLEBLTyGVRwt0rQEkBw\r\nBMFEl13Ugx3jiI9IpSgbkFgaVURAcDbLAzuAA02wAzFnt0bgAyIwkL8Tba9bpmfoAqV0Yieml72y\r\nUzfyujsVLEQQAyugFCvABE5Alz0ouAzJk3dLl5gJnj2gL4NWCIAqCEmAukiglGrLlnWbtkOwkEBA\r\nAjRQpvfnA0LgMrtJkU4gBDfgAzsgU+95ji2VJWzFQrdWYxJJNu85p0RQVmSIAzxJBACjBDyJAx2D\r\nAzeiO5dwvVmwvUmQBENQcPl6BJkWSlUQlwinRzWYaScIPELQRU2QuDIABAirRz8FwuP+ZWsKx0Uy\r\nE4vRU7kRGwXEyRItwZXjYlJAIJQtgExB6BAl6MD\/yrI80AI5MATQiZ8j8AI7MAQr0GJGsAMugDIn\r\n4AM50JctYGsIKbg6QKRHmy+pVZhHCzE1cUE10Dpkq7xZa8D4mVU8yUIHQwTyVrk\/wCDHoJzBOAT5\r\nKolQwGlYgLkak7FRAARZykXcJQWudAUFF0pHALi7+ciwGV7pg0jj00FMsH3FND5kcwUby0KupEHT\r\n0z6Vcr2\/IAUecKswAALNCHlDMAIM4AGwpXMp8IYiMAElAALR6AIiQAEcsAEdAJ6xZQMtUAIP4GAY\r\nmWAxEAIiYI89tFUSWAM4sAJE8AH+K9ADJhDNIbACLfAB8sQuJ9BsM6BNsmcickPKDywF9HOCoSQF\r\nVtAEPEAFWcAE86p8WqSg9BMm9CNel9xF0hBHrbAW7aCqlvoN9RAmF5oI5gwEvWoBJzB675cDRXwC\r\nPJADLAC1NOACq1tVMwACPEADRdAD6PSGJ0DO4pCpf\/M2T3aoTzYOpCyF\/Iqcy5CcyNmf9qx8VaCg\r\nNw0OlTo63nLQc+E35gCrm1q9nwu6NGnUkKpo0zAPBM0P9JCqhBMZg9YMLb2oj4p4WJ3UG0ERkjop\r\ngtPV80U3Yl3UgVrVWC2obCJkeRMOG7rWskI5h\/oooyI5QWzVLU3TloDWizY5hXb+RQcqElbj02Qx\r\n18VS1QkKulXqn1Ht1m7dGNR2IE7AkSwAcxh2AjegaziAFORKtkfhYiZgIsNbYT6Q2fFD1YZt2Gvm\r\nqHit1ahDCL\/TxUXhtiW2fzvQA138ET91GyMGJz4AJzWga\/vCU68boVHIqFYwBfwKBduLpaOEpU0Q\r\nweic1iJREasyaG2noErQEdKXfqtUXnPTGlzoagLawA6csm9bBOidBMX4tmnLA0eAk0gABTDQtlhq\r\nszoABDcQkDdpBCkoSjCRBTLAASAgAiKgAVYFdyIQnxoABFiwAyVAASzAAcOsAbpXxVowyyigykLT\r\nABEQAhGAAybdCrMqhVIAA9D+mQM0ELMtgASRxwIrwMQ3kAM6cAQtAAMw0AIncJMk8AJRfOM5kCY5\r\nUHADWQgEF8KyWUET9wTvTRcJyyeBBFMcl0K6tkZcU9fBiAQ5IAVJMIlrmwRXOgQ8e6V9DINNAAUl\r\n3gQ58IJZgJPNIwWjRAXhy89ZsDJGgLBaAAQ33gGtxAPufN9aYIANOVX8rVIzsAM2YARrDgRPYQJQ\r\n0XySMuIoCwMsgAAWoAETIAE7XgEgMAIjwAPQSQMUrQEkAAQSwAIiagFP8QInQAMs0FlGcAMeAAMi\r\n8HxZ4FnxWQNVIBSctwOJKwQ1YIZX8AMoI4006AIzkGJ8hS4v4BLesaSuIhL+dj0F6D0FR4AED+zl\r\nSCAIa6ulWGDmWQCDVdAELH4DAVvtXfrVjYNwerPuoypdRcFwYz0X0DNlmRqF1ysFEuABSXADvUoC\r\nLPACIGABRwADEqACI9ACJEACOnCdKH7jrc4DN3CTHs3YWsACCZACZZqMWGADKfACUIsFIDABHEAD\r\nhxGjO8AEU7XqK9CcKnAEWbDqH7BtzkbcZC0I\/1gEU4CcyfnARyAFOf3SO1+T83rTUjAF9JPX2U6T\r\nVsMEoxQm0UM\/u8lSWfQm8GyxBtd2MSiwNvl80GPB3bXSOU\/KMHCMMCDqWUACBmAAIAACMJAF1qnq\r\nL2ABeikBVgADKVDRJzD+AiQAA9tqBf0+AiCwLeqbsy5TBCw1Xon+ulXwPKnmPDSQsKXE365kBM3n\r\nYrGITKSqCFMQ9lJ4gvM6BVIQ+kegpaSfzlfKrz4\/CFoqBSGspU4wSnrj80M\/CDIQWiQAtKPlAikA\r\nsCJgBDUAAimw4DqgyiNAA0YATSBQAhqgjz\/QBLk+wV\/LAlxS2A6cAxIwAr3KAlMwAhLwAiOgARyQ\r\n5SwgAjlQBAGgAhZAAiOQAjbO+rYqniwABShKAu560yWhP9JAz\/efBS2FcKvWcICgJZhVhaWVRXVl\r\nOHjImDVlFSkpdXRUZGkllYRUVDQkhXWUhFXVWcQpVYWUmmSKBJWF1XT+CnWVlbXjAuPi0sQDMpKT\r\nJaGhM0OTgyUC0kJjlIJlk8LC0QTEogLTAkJ086J149R4mKU1BSmZlZQDwpL0op3zwlLFApMzcgMj\r\ncpnDAzNvBIwqOYS0gKEjRY4iVX7oYEGl3BEgRoAAwSKFB48jWCoyOVGkCRYhVJpQOdIji5IlR4Rg\r\nAdLECJGKV5owyWLkCqNBkNBJyiRFCqdVSJBYKdrKUhEoVYI2OSKliJAqTKG8WtqkShUmSKrcqkIl\r\nSRUnUmohaiKlZjkfR3SYdEJFCBAqVGoIyXJEZBVBR6pccRJlXDlBVnxayVIEHgwp9mDAYFGkxYgX\r\nJJBszOEvoz8YRWD+kCgiYiGFHDeY6chB48gtFiA4gGAWooUVEI5daACShcaLFCJGiICR4uBjEFBY\r\nvNhBIysRFzNc6Ch3i5w5w1agDBnCgxN21EeG+MtRlFMnTjyA0EACZKGOyzvary\/CQvUtRISwEKrS\r\nF+x9sIUGQ3ekRVaGZKHTTo2UQ111OxSRAwxILDRfhBJOSOF8g0iYwwkn5NZCAgg4IQQIObDQAi4s\r\n0EADPSbMwIIRLTRnghE60KABajMYIcMOOtRAhWCHFOYTYizwMCQPLeRQxU+RZLEkk4cddsuTE9oX\r\n5Xwa6VDSETPkIMUsT+kgBRVMMNFEDlTIuEMT2OmggxHt7QDEDzD+tUXERdJFd46S6URoBRbpNLkk\r\nlFDyyWSFFhqKqH8A3jnYhYyek6AVSeoZ6JOCzjdooYluymmE5EjoiKLz5UkppVH+WWimmWraaSyt\r\nQgfrgZ\/+N86BPf2pZ6pOAupqU4Ou+mqEVJJj37CzXhjrf9HdqUVhpeIqJaqFHrGgBjT8QoMIISxj\r\nHghHsHBCCDy8UAQPJhRBQgonEIkZDyeIMGQRIJDAAqjHKuvpoaM6++yuu\/5U5WGlHHHSRDxUBEW5\r\nXVZSVBOc4PdDJUag5fAQaW6FFpSy5jvhp4+Syq+lAP8LsJSIztrpTilTeGCFkD5b6r8ym+wVqwFj\r\ninOwiQLrMqm8pM5caaWaqhrwrxOaDKrORxNqM8ghwyxytF\/ljCiwPOOrdKIvU2qYn1FLDbOTVebc\r\nZKdEGxro2BHeCnXbbet6qs2Xtnr10piaDOnWblsqNq6nAmq10WbHzWnZmL6sd4KR+umv32kLTnbd\r\nOM9d9aqD5o2OT7dGunfJYdusNtyhGw56qZgDmWfinYf9ddy8Uu3v6GJPrqSTmPvM9t6NP17711DH\r\nznTQMX99e09TVGH86qz3C23rrF7qe7TRBwIAOw==\r\n",
  "author": [
    {
      "name": "David C Blackburn",
      "firstname": "David C",
      "lastname": "Blackburn"
    }
  ],
  "bhl_pages": [
    34258157,
    34258158,
    34258159,
    34258160,
    34258161,
    34258162,
    34258163,
    34258164,
    34258165,
    34258166,
    34258167,
    34258168,
    34258169,
    34258170,
    34258171,
    34258172,
    34258173
  ],
  "geometry": {
    "type": "MultiPoint",
    "coordinates": [
      [
        38.45,
        -4.8
      ],
      [
        38.6,
        -5.0833333333333
      ],
      [
        35.616666666667,
        -15.933333333333
      ],
      [
        37.540555555556,
        -6.0525
      ],
      [
        29.615833333333,
        -0.99277777777778
      ],
      [
        38.6,
        -5.0936111111111
      ],
      [
        37.719444444444,
        -6.9416666666667
      ],
      [
        38.512777777778,
        -4.8291666666667
      ],
      [
        37.927777777778,
        -4.2833333333333
      ]
    ]
  },
  "names": [
    {
      "namestring": "Anura",
      "identifiers": {
        "namebankID": 2476589
      },
      "pages": [
        34258157,
        34258172,
        34258173
      ]
    },
    {
      "namestring": "Arthroleptidae",
      "identifiers": {
        "namebankID": 2476895
      },
      "pages": [
        34258157,
        34258173
      ]
    },
    {
      "namestring": "Schoutedenella",
      "identifiers": {
        "namebankID": 31333
      },
      "pages": [
        34258157,
        34258172,
        34258173
      ]
    },
    {
      "namestring": "Arthroleptis",
      "identifiers": {
        "namebankID": 2476593
      },
      "pages": [
        34258157,
        34258158,
        34258159,
        34258160,
        34258161,
        34258162,
        34258163,
        34258164,
        34258165,
        34258166,
        34258167,
        34258168,
        34258169,
        34258170,
        34258171,
        34258172,
        34258173
      ]
    },
    {
      "namestring": "Arthroleptis variabilis",
      "identifiers": {
        "namebankID": 26144
      },
      "pages": [
        34258158,
        34258169
      ]
    },
    {
      "namestring": "Arthroleptis xenodactylus",
      "identifiers": {
        "namebankID": 5990487
      },
      "pages": [
        34258158,
        34258160,
        34258162,
        34258166,
        34258168,
        34258169,
        34258170,
        34258171
      ]
    },
    {
      "namestring": "Arthroleptis stenodactylus",
      "identifiers": {
        "namebankID": 26141
      },
      "pages": [
        34258158,
        34258169
      ]
    },
    {
      "namestring": "Arthroleptis schubotzi",
      "identifiers": {
        "namebankID": 0
      },
      "pages": [
        34258158,
        34258160,
        34258165,
        34258166,
        34258168,
        34258169,
        34258170
      ]
    },
    {
      "namestring": "Baga",
      "identifiers": {
        "namebankID": 4086457
      },
      "pages": [
        34258159,
        34258160
      ]
    },
    {
      "namestring": "Xenopus laevis",
      "identifiers": {
        "namebankID": 2476402
      },
      "pages": [
        34258159
      ]
    },
    {
      "namestring": "Arthroleptis xenochirus",
      "identifiers": {
        "namebankID": 0
      },
      "pages": [
        34258160,
        34258165,
        34258166,
        34258168,
        34258170,
        34258171
      ]
    },
    {
      "namestring": "Arthroleptis stridens",
      "identifiers": {
        "namebankID": 0
      },
      "pages": [
        34258160,
        34258165,
        34258166,
        34258169,
        34258170,
        34258171
      ]
    },
    {
      "namestring": "Arthroleptis xenodactyloides",
      "identifiers": {
        "namebankID": 0
      },
      "pages": [
        34258160,
        34258162,
        34258165,
        34258166,
        34258167,
        34258168,
        34258169,
        34258170,
        34258171
      ]
    },
    {
      "namestring": "Arthroleptis nikeae",
      "identifiers": {
        "namebankID": 4801198
      },
      "pages": [
        34258170
      ]
    },
    {
      "namestring": "Cardioglossa liberiensis",
      "identifiers": {
        "namebankID": 26166
      },
      "pages": [
        34258171
      ]
    },
    {
      "namestring": "Batis",
      "identifiers": {
        "namebankID": 4935039
      },
      "pages": [
        34258172
      ]
    },
    {
      "namestring": "Alytes",
      "identifiers": {
        "namebankID": 2476632
      },
      "pages": [
        34258172
      ]
    },
    {
      "namestring": "Cardioglossa",
      "identifiers": {
        "namebankID": 2476595
      },
      "pages": [
        34258172
      ]
    },
    {
      "namestring": "Hyperoliidae",
      "identifiers": {
        "namebankID": 31786
      },
      "pages": [
        34258172
      ]
    },
    {
      "namestring": "Batis mixta",
      "identifiers": {
        "namebankID": 3847615
      },
      "pages": [
        34258172
      ]
    },
    {
      "namestring": "Phrynobatrachus fraterculus",
      "identifiers": {
        "namebankID": 30192
      },
      "pages": [
        34258172
      ]
    },
    {
      "namestring": "Ranidae",
      "identifiers": {
        "namebankID": 2476894
      },
      "pages": [
        34258172
      ]
    },
    {
      "namestring": "Phrynobatrachus",
      "identifiers": {
        "namebankID": 2476817
      },
      "pages": [
        34258172,
        34258173
      ]
    },
    {
      "namestring": "Amphibia",
      "identifiers": {
        "namebankID": 2476588
      },
      "pages": [
        34258172,
        34258173
      ]
    },
    {
      "namestring": "Probreviceps",
      "identifiers": {
        "namebankID": 2476758
      },
      "pages": [
        34258172
      ]
    },
    {
      "namestring": "Bufonidae",
      "identifiers": {
        "namebankID": 2476897
      },
      "pages": [
        34258173
      ]
    },
    {
      "namestring": "Callulina",
      "identifiers": {
        "namebankID": 2476730
      },
      "pages": [
        34258173
      ]
    },
    {
      "namestring": "Amnirana",
      "identifiers": {
        "namebankID": 4530253
      },
      "pages": [
        34258173
      ]
    },
    {
      "namestring": "Boulengerula",
      "identifiers": {
        "namebankID": 2476862
      },
      "pages": [
        34258173
      ]
    },
    {
      "namestring": "Hemisidae",
      "identifiers": {
        "namebankID": 1770009
      },
      "pages": [
        34258173
      ]
    },
    {
      "namestring": "Caeciliidae",
      "identifiers": {
        "namebankID": 2476859
      },
      "pages": [
        34258173
      ]
    },
    {
      "namestring": "Microhylidae",
      "identifiers": {
        "namebankID": 31788
      },
      "pages": [
        34258173
      ]
    },
    {
      "namestring": "Arthroleptis bivittatus",
      "identifiers": {
        "namebankID": 26136
      },
      "pages": [
        34258173
      ]
    },
    {
      "namestring": "Afrixalus",
      "identifiers": {
        "namebankID": 2476663
      },
      "pages": [
        34258173
      ]
    },
    {
      "namestring": "Gymnophiona",
      "identifiers": {
        "namebankID": 2476591
      },
      "pages": [
        34258173
      ]
    },
    {
      "namestring": "Arthroleptis troglodytes",
      "identifiers": {
        "namebankID": 5528862
      },
      "pages": [
        34258173
      ]
    },
    {
      "namestring": "Nectophrynoides",
      "identifiers": {
        "namebankID": 2476614
      },
      "pages": [
        34258173
      ]
    },
    {
      "namestring": "Pipidae",
      "identifiers": {
        "namebankID": 31778
      },
      "pages": [
        34258173
      ]
    },
    {
      "namestring": "Chimaira",
      "identifiers": {
        "namebankID": 4113101
      },
      "pages": [
        34258173
      ]
    },
    {
      "namestring": "Yama",
      "identifiers": {
        "namebankID": 4594180
      },
      "pages": [
        34258173
      ]
    },
    {
      "namestring": "Hyperolius",
      "identifiers": {
        "namebankID": 2476668
      },
      "pages": [
        34258173
      ]
    },
    {
      "namestring": "Scolecomorphidae",
      "identifiers": {
        "namebankID": 31714
      },
      "pages": [
        34258173
      ]
    }
  ],
  "status": 200
}';

$json = '
{
  "_id": "18130a261ca29a2e4cb48633812b28b9",
  "_rev": "2-0a4cdf26a26c994ffec16e921ff9c489",
  "type": "article",
  "provenance": {
    "mysql": {
      "id": "1570657",
      "modified": "2013-02-24 14:26:24"
    },
    "biostor": {
      "time": "2013-05-15T21:15:21+0000",
      "url": "http:\/\/biostor.org\/reference\/3235.json"
    }
  },
  "citation_string": "Robert C Drewes, Jean-Luc Perret (2000) A new species of giant, montane Phrynobatrachus (Anura: Ranidae) from the central mountains of Kenya. Proceedings of the California Academy of Sciences, 52(5): 55--64",
  "title": "A new species of giant, montane Phrynobatrachus (Anura: Ranidae) from the central mountains of Kenya",
  "journal": {
    "name": "Proceedings of the California Academy of Sciences",
    "volume": "52",
    "issue": "5",
    "pages": "55--64",
    "identifier": [
      {
        "id": "0068-547X",
        "type": "issn"
      }
    ]
  },
  "year": "2000",
  "identifier": [
    {
      "type": "biostor",
      "id": "3235"
    }
  ],
  "thumbnail": "data:image\/gif;base64,R0lGODlhZACaAPYAAFNVSFlbTlxeUl9hVGFjVmRlWWZoW2lrXWtuYW9xZHJ0ZnR2aXZ4anp8bnx+\r\ncX6BcoKEdoSGeIaJeoqMfY2Qf4yPgI6RgpKUhZWYh5iah5WXiJaZipqcjZ2fkJ2gj56hkqKklaao\r\nl6ipl6WnmKapmaqsnbGvn66wn7Cxnq2voK6xobK1pbW4p7m5p7W3qLa5qbq9rL2\/sNyypNW2qNy1\r\nqtu9rte9sdm\/sb3Ar77BscLFtMXIt83OtsTGuMbJucrNvNvEtNHPtdbMvNrMvM\/Qt87Qu9PSttjS\r\ns9PUvNjTvNTYv9nZv+DIuc3PwdnPwMfVxM7Rwc7Yx8\/Wys7YytLVxNnWw9bZxdraxdTXyNnXyNfZ\r\nydrdzNze0OLXxuHey93gzt\/h0eLhzeLk1OXo1+Tn2Obp2ejr2gAAAAAAAAAAAAAAAAAAAAAAAAAA\r\nAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5\r\nBAAAAAAALAAAAABkAJoAAAf+gEZBSEJGRkiISUlIioqMjEpLSUqRV1dVmFVXS5qXm0ucS5+ioJuW\r\nnFWgnJZXX6KsS65LYa+sm12suFVdW6xZuF2DPEiGh4iJikeLjUtUkaW2lriiXaCpqaSwm9i71rm4\r\nV9XiX8DAtZ2ev9K2QUGFxkZHhkf0Qo1IVEuUqqaX4tuaVHU7xU9gqVDSQMmyJCsWuFrhLHXqAiyL\r\nRS9deAQpUgxRMXr0HiE5SMUUpn7oLq06qO3cKIldvpySOTNmLZkUPUW8YjEXK40cjSECKc\/IvZGq\r\naoH7FI2gpSSblDSdesXKTapYffHE9YvrFSM8OBI7doTREiNLkCihkgQaqaX+qchF1KXLEpW7Ja\/k\r\ntWKLipW\/fC0F\/hLYlhdpmpYi9lkFI4+wQhndS6IsiVHJlZboula3U0CoV4pYwYIFb2m\/VEpjGT0l\r\nSurXgK9osaUpk5bElzpl2ZXFFpHHRR4JkSySUpgwXo4rX868OfMvx7982SL9C5jq2LNrD1Pd+VKv\r\nlnr34smDCJHgSsYeU9v2CIr38OGfmD8fxYoVJUq8p6+ChQsVKaygwgossADgCikkqKAKDAaYYAkM\r\n8kffCSrU914L0Yw3G26hlcdReoYUMch6R+jQgg44oJBiCzjgAEOLMMDQwowxtiBjizjkkAOOOvYY\r\nAwwxuODCCznq+IQOPSD+2aMPOzS5Qw8+MKmDkzxolVUR5hWhBBFbPjZIcEZQIgIIKuqggwgtUAiD\r\nCi\/mAAMVMLiwAgwkrMnCEy\/o6EMOH8yZggoxxGDDE1w8AcMTOfwHw4M+PIFDCTnCkAMLLeaAYotI\r\n5LIFV1bMZokWWph3XnDn4WOqWlQUIYEBBFCggAcQTNAABApM8IACH0CAwQULgMDCAxYYUEEKH6gg\r\nAQkSJCBBBQA8sMEDE3CQwwIV5HArtR3UWsILExDAgggGwBDBAypQ4EEIFFzAQhhZbHpFL1Vo0csW\r\ngWWppXlrIZIeJZQQsQMOU5op8A4+FIHiDjw0CQUSBOdA8JSW2pDDkWb+CmEmlDo2aQMOMQTsww8S\r\nJ2zmjk22iCIPW2zRbjRZyAuYqEXErNYxSVChViQiYOCBByL07PPPPZdAggghiFDCkCwQCCF+Jaxg\r\nwgr2zdiCCzDMYGMLKJig9QpCMtjCCja22AILM+Jwgg6berFpF4ddcRi9Vnzxw3lEIMKlvpSMIt0s\r\nXiTXd3LKfdG3230fV7h0biMH+N9\/s92344yDIcZy1G23hRZeiMfTvFXBTTeWlBQBxV1S5aXEX6Jk\r\nkopErNtiURe9yVYSqFpY1BsTQwjBUw1AAJGEF0DcILwNn2668l\/0gtqpbOLhYvy7cFsxKpfByazE\r\n6HhdcTpgf9klGCv+f+0FqniradFp7VcAQcMNM1SxBe5MVFNDDTLQQAPstdfeMu389z++bJ4iDGHM\r\nYwQsIUFLpMECdfgShbgRBlTSsULKFhg3CUZQghNkFxSswJ3jXM4JVXBCEqpghZb1JglCGALuoNKu\r\n\/bXLf3+Zjsou1zIviOFyVfkLzIpwhRV44AQfYMEHUNACD7iIAyyIwgeKoIISUCEEF\/ABCUIABRaU\r\nYAMqwMEX2KSCDpBgBVSAEAc+AIIT+OBytBsN90CFRvTxDwv5G81svrACDnTATBKIwRMsAAEGXGA2\r\nMfwcl3xQghDsjAPSOgGlCrkDFuTAAxPwAQtO0IMm7ggGF3hACX7+kIMXbGAEI\/gA1UAgAQxYwAMs\r\nGF8VWtapEupvfFk4H\/+yQBrzaYEKW1hBBCwAAh1UoAQ6wIAEGoAB8wnQXlraYBRKkzLUUEE6cLRC\r\nFNpYHSxIZwvTVCB1tsAFLmgBC1HIAnems7yd6K83tmuXHJVXu1rG0pZcUM0XmHkdwuTwC2HBUvWg\r\nIDp+QmEtVrjLasqXxgSqcTWASWAtnwDH1ChwNFjYn\/kAKK921ZJ\/rpSjRWinwHYOlDSAiSAS7HVA\r\nKJgUCqUJH2Bs+Zc0Kk+CpEne+c530ZSB8wlTyGlDHZqaLZxGCqmB5TfhuFE4YjR50Yxh3D53QGec\r\nFC8lWSlG2Tn+04PSDm5akIJR+dJSLEzBqN8cKkxJ09NzptQiCLXlUEFlVAVqb4B1OyC\/RAfVu6jR\r\nf9\/06Utpl8P+1ZKspImCFFzjGuwF9jUO\/etoHPoXgrbym+tcDWF0WL2YPaEIVICCa0wzUOUZNQrm\r\na2n+2NnG2WBBq+CMwleXKVAqAJUKgiWrFAYLzikMFqIRjaj\/4PhQONJLgFsa1QGjsBaT1hWhKU2q\r\nFpZZPlrSMnmeYqssQcUT\/vFEoj7N7lA7GtMEhhayvoVoaK2ghGPqM5nXG50Cn7kFXF71vYRBYxa4\r\nkDIJshGNXACDNyc4QdoJ7nLyxQJ9tdBNLrTMm7TzJhjYKK\/+lE3WfL9thfSylB4snHQLPngBGC5A\r\ngiL8AKVN6IAPmlCaJ6wgCkXwKRV6mYIYpOAuSIgBFbSwgRSUQAtNaMILmmCFJuDlAhdYQY5nS5oO\r\nkNgGPZiCTz+Qg0JRQQc+AMEPcgyFJvTAw7h86BbKSxgDIgIvSJjmBwKABQ4UAAHBmkATEOAABCAA\r\nAhEoAAQScIILJEADIICAChDAgAUIgAAvIAMEELAABwSA0ApgVQEQ5AA\/Q8ABDhAAA9rsZgQ8YAEN\r\n+IClGcCADmzgA9Rq8wAEIIEBXOAH9FpN5ZZaN8zi43pYKAIMjNiDHFjgPzJ+gQQc0IERqOADHzgB\r\nDFgwghf+SCEFoeQACEZQAg40YU8A6kCCOtCBEog4BiArQQw0oKBRdsAFPQDlC2zQxU3CoAM9+FMK\r\nep0DDqhgmtEr71Jjhp5UmTSm2V0wF0wKBpSSoZtgCLh1BCwGMZDBDGQowxbEAAZuopoMZCh4GRTe\r\nXi0Q6t9YMAMXyOBThOuXDFhoQmsgLgb6lrybZGh4wAGszVZIx0P1putdDHuXLzSgACyodQhI8AAS\r\n6MgDT3iAKGPwAhWYOAFMhoIFSPCCOYXSBTmogAoeEIEFpOAFTU+BBlyQAg4k6Ak2SIEEXKCAGCBo\r\nBCsIdxN8qlDSYBc7j1GClmaOvcRegTRfSMAAHpCAPg\/+gNB716QEFsAAQiMABBU4cwFi8ABbN4DS\r\nFnBAAZoYgQY04AECKIAAGt3nBCAgBRboVRMMoAEHQMAAENhAAVwQz7zmFaxa+EJ5gyt3zFoYqqzt\r\nVANz0AMYQGlPOurBD97tA5T+wMOiG3EPSNODKhf\/B1SYclAzS4Uc+9j6IZ\/ta0Pu4yeQIMc9hX1H\r\n\/Vud8oQJVUhAqWkSGvttpiy\/DZdOgxs8QfoC+P7ymj\/\/+NvNKRD4m\/N1OQq0XwpUgOPHRgNoEbEQ\r\nC+WhFnN3F5tlV9KUamq1VTDEUZczGm3UKSkzXrIkUd\/UehxFYBclL26nV21EgD4lC\/hEPadzXGok\r\nWrL+xIF4lX9shEGiBWA\/oAMuAzcpA4K0hGAkOFTxZFN6VYD8403aVDmy9xhhQgk2Y1cOFVZqxWBT\r\nNV0+tU7ZxXZg0AIL8AIAhjz0l2BsRYIJRF+85VPxJGACxlbZ1S6u8HL5hFmwBVUgJVo1eDlf0H42\r\n2F\/1hVygcnwZ6Bfnsz8CGE8GRhrdpFA2xYaO2DLZpU3VIT1aEjOvUQSn0SnlM11uCF0d2Eaf2GDW\r\nIXAyRB1gEHE3VDs\/KIQDZoL0wnYmGIQCNl+01IYKVB3BFTNQaFwI1VgwhEb4hoewB0EPcAEWgAEh\r\nMEYlgAUWYAEfwEsccEY\/yEZKiICN2IHtlIhc8FX+irhfsVQdFLYWdCiBjpVGLOd+0kFfBVZg1yQ0\r\nJPABJMACkkIFK3ACJSACJxACZyQvXHBy69hN1RGKbHVaiRhRtBSCvXBMrQaFpkGISaWHoMVGO3AC\r\nUWBSH9NjJJZhKdB8mhUFPeBT\/ZYDnOQDKOYDAZUDQvADMPAkOWZ2PfCSP7CDB4iICTRfiKiEDuZA\r\nXMIllOAaSuAa4FRVpfVNW8QBG8ABHgACICACG7ABdeQCHEACPKOU72gBOsICFzABFyACHDABIqAD\r\nO7cBGMABGlB0AAICKQACn\/YB2sRWa6iNjriEcRMLIzV3roZSENVSUbCHynN\/1kSSUNBMWwAGT1b+\r\ncl\/wAvn3Ax9TBNIIWwH5A7cEmWJAgiRWfVRgf\/d3iAYWT1LAdmg4Xw70BUbAk6jSWnhYgw0WN1FQ\r\nAh+ASCRAAiUAAhcAAjmAASrgbu+YArOWHyLwa3XSAiFgAh5wAa0JAisQA7O5bjCwYPgHjGRYgPFE\r\ni4jzFSPFLzYDlFsFexWERh34BXuSI0lSBDsAAzrwBDv4MU2QA8UHBTtgJv8SJQzTnj3wBBTDfTnW\r\nUfzVgYvYinFpYBMkHYYgd5TwBAGVGl3FiQ20h\/1VHaQ4itcRe3toHfvVcPQVfxGKHStHihAUoQgG\r\nYNQIKlOwjf\/3n18xmjdDXBLIif71iv5HHbH+R3\/no4cQhE0c5VvYuKEvOoY4+qIBCUEI1k3985\/U\r\nEaD8InemwVIuxT\/yl6P8paAuyocJxgVSAAXTsaN8yV8QiqMiWoq8NZCtdzmYuQVPyJB4sU5WeE3y\r\nwpfyd01+yJdMShhg8AEVIAHLmaY4Kh0N52AE9qRfAJD3BaTeBKj7Rx1XQAQFBIVrUaacKEFxA0E8\r\nmqNrKqNMSh1cAHwRSX5Omp96GKFkGKhtqIT7CSpcwKZE6gx1NWMzSKOOyqkXmqVrCkEBl6FmEKux\r\n6qaa+p+rCqgh+n8\/2o2dSB11U6SJClsTOF1qqqTHqqQv6qJG5EhfpAI+UAHSMmxaZF+3iqv+PFpg\r\nkBp7BVZL3LRNXxCsazGsAlVT\/vWoXzAF1QGhS8qqP1CMEvABsdkA+MEBGPABG8AC9bSveVqK67qH\r\ngcqpy+p2n8pfh2Cda7FZd0eDscewaNqqP0Cg82RfanpGAadAl3UdAsdJVrADRfAF\/ESjC8qjfElf\r\nCrqHu3qnEzSmL2iHVbis8HansfcEH6ABQOYBwHZKF6ACP2QBIXCUIGBIF2BEJ\/ACJ4ADIQACxSKV\r\nOpMD\/fqo3NqdPkpgQihD03Gwp0MJAZVW7ISsq3qh9KKYgfkxmmU+DRQFP7ADoCIaLOCxa\/pMJGk+\r\nOBB7+gWmrkp\/koqI\/keyKYO1ZHqHoLL+l8a0rWp6ARpwH\/nxInQSAlaUNP+CA2DjSR+wYahUAjsC\r\nAj7wQ0w3KcHntEAaqbhasoF6VQ6GtaZqVwSVo6rbql8QBWbJmiGAA23rAwyiAizyAzjAJoqrAlCA\r\nIv3BSUkku5PkAZJyKE\/Qp97kf5kKpp7aemA7pDezFnohVUranQI7HQ5KBmMwBg2XA5ACBZXiAzjA\r\nA0+2QThABSygA1aQA2g7vlGAA5JDq6MaqPkFkPxHtby6ot\/Kk1CoF1zLrlX6qmoaofwFBrJ2Aisg\r\nvDlSNE1TAmuiAyeASioAm\/UIKfHHhByaX33aYIBKvwBJwDLkt3dxd2n1QNN0t63qovn+ib0RpB3X\r\n5MIaex3o+H\/r6k1sqp+jW73cJB38KxUHWoAceK236nLZEQsunB3oqKnY+59LXDmamr8ONsAAKqwC\r\nhTzWxKAqJ3AZOh0Fx6BePE7QgcUx\/AViMAbSUXARR6sGV3BlzL3yO5gGl3L\/xk2YWh1hsgTcs0wh\r\npQI7AAVukgNbMJ6NVAIfuSY5QJs5EgVG1CJHG7s4QAGx+3OyGzMXQAQ78wNYQCkwsAIRGwHAJCkr\r\n8AEwIAI5gshYUAIj0AEroAEq8AKoJrWjKn8horXcE1OWqwMWgEhgMAEJIJsT8AFUYAEw8AO18ipf\r\n4AESMJwUkDMZAAIeQAEQ8ABQMLT+BvAoEnDMD0CeBwACHGABOgAFH5CUR3kBFCABR\/lrUUkFXNcB\r\nF2BHHfADeQqhmyqaRZpDaYVhLDCYIUsFPqAF\/WZN\/fYDY0AFOWIdZfADo2gdeIq7RXAdJfCxhJli\r\nX8CYEOcDm1xw3xRwEQdwZKBZ8fQCy0cGmZWnTRrL9EzLjSVLHIAAEsBpl4cBdbYCEmABE9CMDCAB\r\nD4CVCdAAFvAAKSB0HvAAD8DTE8AAOMsACWABw9QAUPRrGxABHIB6CxABFaABHLACs1IBFVB5Qics\r\nESAALB2vB7Cc77egexighHhQ54PJMQkFTxAl2WRhOqIFUAB9VLqe5qNZSrADOZD+YljgA\/METlmW\r\nQDfqz8BIBQtWGlZWGmAQcop4S3k1QUuYjl8QvewnTd+UA\/hhnCDwAuQSbCHQfPiqAz+gtLwLISqw\r\nAR7AAyEgAREAyToiAkUQZDhbAhZQBBMwATkQAV7EzRYASj8wmyCgAU0Qeh0QAyPgAhAw3CCgAsnZ\r\nA1Vqf7E8qk\/YDGnNgVhQuyrgAt\/3mu+IAWAoRS8ABe7GAlgAAR4wwSTgAyfgc8a5kixQBNG4AiSg\r\nAiDwBS8ykWVEAszGJj8QJCSQAj4WAx9wdXJCAjHwmi62Ak+gXylr0qKJKoLRWA20BTjgY1znAwKy\r\nBTrAAncRJWLwZFugWTnCnjv+gAUw8AVJAwYr8M3Ch2KBbE0r0EuKGZNTRi\/yKGTVlyQxEE9W9gI6\r\nMAJQoAUZtgKiasPpqK4Rbqq6l1ZR0M6W5wAa8AEJcCs3fQAK0AA5cAFj7QE0DQEWcHkvkAAwsAEH\r\nEAKtmdtHaQE7sAHNvQLQzAAQQM4U8AA+dGqkJAEXsNUQ0GIaUNUj4AAVoGsVAAE+cB2x7KqVfTP2\r\nDFYVhG1cQAUpF6ti0CQ3RJipkdBgMAaDuQUCfbGY+AXbSx0MNwZmUMbSMQZlfBdmAAWT2dhNsIhY\r\nUHKIXXJi8Kn6BuHIex4A1VgD1SkkYAAPwAFXZAEbYAEvoAELwAHtXAIYAOb+moQB0FKMISB0EwAC\r\nDlACQY2vdCoCQfQBxigBep7MfbJ0oTenFeAAkecAINAB6U4Cx\/7nE7DsUGCyfaodRcpVctRSUgLI\r\nfE0nuRQCaXsoH1bXUUACLlAEtaaSosPQWrADno4DgD3iO\/C+LPADUUAwsQbPI9YEUNADJBbyt9QD\r\n33QXKqADRdDgTMyt0jEFYUJee9lK2WUF9c2a+WFrv5bANkZIYwTkMACPQrMDKmABP3DVeWbozh0l\r\nCKye+MgCIdACUNDeJADB94EgO1YBNRYoLaaWIN1rEpAC8Px+8weOI4HSGqhAJDAuiMQmzzhGr\/nO\r\nHFBKTUMCWnkBppS+POD+ARgwASSwsyfgbjsgrwmcABdQSCXQ5vKqA0g0AshmdtT2AT3QARKAH6r8\r\nAimgA8DWBPHMxH06pjm0Ri8amN4J+RFK2loAz1Yw8TI8HTnAntXaAjkwBqEJoSQJTUWQKMu1BTFi\r\nkllocVrQA1LABR0T6TAwYiY1q9wUqBgc4c3APY2VMhCQLgzgjONyAeNCK8CiLAfAAM94ZlXO0zj9\r\nAHs\/AOF8ARtAAgoALEJd7a\/NbR8ALQmQ1LYyAR7wLE+t1ZanS42G0x\/Af+r4r4BgpLRkVVioZbWl\r\npcWyo\/VEpQX25bMVhUVFtQWF9biFVQTzEoX4Vfj1pYWqCpYDlWq69YX+9QWmCgVDu\/i1xcW7yMXV\r\ntEVcrMUFVszV28ulSlS0pJRohXWJZaWKuq0li0q8jZoMRj4ZTn4uXi5euw42xh6OGozsm0x8X1y8\r\n6mtkJG2oGhZsi1QZ5KWPWDeF+rQhBLeKl7xvE2Ftk4WR2DKICTtCnPKFiJJpSkxhS9TNoLaFHi+K\r\n81ZL4jZzE8vRdCkzZ0JfW8b5nESznyBChaIYSlVQFbFEDxVK3IdR4s2K8sZxM2cL37d9MRsmTMZN\r\nkBIqp6ppieJj5iRZ5MSQ+9TurU2gateFixJ3LrkyNsmU6zkGjN9FPwX3NAwRFZKheBfR8kGBBAwd\r\nJ0rA+LACxgoVOnb+sHgQogcOFjpU7FCBY4cOETt8nAhxQgeGDziKUPlA4cSJHTh8+MgBAwYLEb8\/\r\npPigYwWJzCBKk4gR\/MmIGBZSxNCwwYUGFzFclGgSJpzIJVSmLTIaBUeJDTAoSPjAAUQCDBg4fGAB\r\ng4OKExM4nADhAYAieHDBaBx4UIIHEnCQ2goefLAbhCqU8IEHJFhWggUbbLBCCRxcAAIIJDzQQQoW\r\ndEBFCiNwuAIHHGgAggspxMjUNkggMZIVXxQBxSY7YqFIEcn8YIVt6CRThCxjUFFED1+IQZYYYnxB\r\nRTuvzMSXOttgAc9hk\/zAC5RbZEPGD1AEA0YwUmjhVzBNSMJFDzD+fSHWSF+ckICCFFigggUfNCDB\r\nCxtYYIEEHjTAAQwWGHDBByJE8IAFFHAggQgYPLjnBRSAdoIFLHjwQAQfSBCBD6NOkOAFEahQ4Z8T\r\nTADCehfo98EFHWjgQAUVvMgCBxV0sEGuE0gAkxY3jqVjEfgBh0MUP+ywQw7O+hAtDjAU8ewPOlDx\r\nWxFP5ACtFj+Mm0MPRbQGwxc5fMECC+NGe24OPiT37BdoYQFFEd5q4Rsnm\/gAQxMCYxEDKE0MJHAT\r\nmoSD4xVEFdGbDsDpoEOSRWz7gQ9QgAFFDpD4IO5vLJiy7Q4w+EBOsznkgMMLP6w7LbaOtKKDFjus\r\nsLK90Ub7Axj+O\/zwwgpNrBBDDsG8kMMJOUgRQwxNOL0MKjqOtMQVV3yBQwSSbkDpBiqYCm4DIWqx\r\ngQchYPDADyF8gMEFPozwAQkYWDBBLhdcsAEOHkxQwQZalLDnB6PmUMQGJtcagd+FXmDoBlSAQGgE\r\nE2iAa9EdkGCBByN0AAIHnLswpY2DVF1Nkj3xQgZbYBQRk8mC2SLGFmO4JWUmOowBzxdjdFMG7ljV\r\nQu1bWswuRmB8bUxLKmSQEZhf5BjNBRndkBFMN2JgMieOSlj9xQ4UlCDBfh+AAOsHKlxgQQ9YWPAA\r\nBaySQMIFJfRm4QdFzIrga1wLfh8HEJDAAjCogAIfAI6oYPD+AwR9IAQiUNUPCBW3EYRAA\/fJAQP+\r\ngwW2kaBEKuLABDAQOi9cAUek+4ISTgADFQjnBSyYHwtS80Ie7eAFOKjhCmj4Ax8sCwq8YQHOSgAu\r\nVsFgZTBQmikAZqYX+oAKSCPNDk7QLBwkRwcuyEEj5DTEHGxhZT2IQQ868AIbTMYbXvACjsqjIyuc\r\nYAVOcRKQiJEDpeCAGpPAwbqwkIyBkAUMmoDWFlGBr09AIV\/J0CIYIFEELUjrBziAAhVwAYUyRMEV\r\nUOgBD2fhLh8UwQdN0My3nvCDMCzBRkkoYQ7m9oEXwIdQFigBBkiwgQVBgX2w1NsDEvCAUzbgbgrC\r\nQQgYsCn+CDQAB7jZk4YOlAMLwAAEKuCAAjYAqBc8AAMT2MAHHjABslWgUBOwwAV2gEwJTAAClCOU\r\n3FIQuquJ5RSsw4QmokCFH2hiIPaiQjK68QNtwHMMdnyIjqwhSCxocRY9uYQtzBGJs8guKj3qRipo\r\nMQZ8vKMWbEGG9LhQBi98ITx0GoSdilCCC7SQmSdADgtiVRkRkAAHFrDicVLAshRwBgYkmBAHWKCC\r\nHpiPPWXbTAhwUNM1smADIAjaBi4UtxX4AAQozMEHSgCCp4ZgB\/I7Afx8wIH16CAFKVAVDMDA0S\/g\r\nyArS6N7cSiACDsAPBDnggPsoVAIoXmBl6rkPfFZwAgn+xMoyJJgqWkMALgDCoAQhKMELVMCCF5SA\r\nBDpo14ReswIdlICRN1MB0lTogxKwoAeo+cEJgtYEya5gBDAQQxiuZsJobO8KeJGIX\/CBLzBggy9b\r\nMMNByVCGLeiLF1wSQ25lt7qYvAOPfglMYN7RvLaIgQxugYdbmFtc4xr3ucsDw3PLELtwGAEJVSsJ\r\nDiSAvrZJQJkV0EGIKiA\/DVzAA\/Vx6gQe0KcSXO4CsJqA4EJAKAaBQUeKgEpT9PGQ\/wL4dDH5Aj2W\r\nAaSbKIG7dvKBB3Qgxd70IJ5N+EERmoCECkN4XFvMgQ6woDFn6cAHz3okjzoDhcC0w0tvoahe9OI8\r\ncqj+eC55+QvDiGCF7Z0CFZ6dTgp68IMVgCC0PXhCtJ6wBeGQoIDaggLSGGkmID6SBb9h2cqeKrGV\r\njRYDEgSxvFKzRU22AFo\/UMHKXOEbHLjAkimoYidzgEeGjeQKJUEP1owTgwtooEXcgUBUR2ABAN4H\r\nBoMCwQZm0zkObGBtEsgbCeyDgcFyYAUu+MCh27wCDaiABC5QAQgw0IGWBhoGLugP3F7gp8uw7ak5\r\nsFWbKfSEmwxlx0yxhQ+4IIboMdcW+bRJGZgHD8FICXe7qy05du2W18FCME+IXvGSwdzYPWG50fYd\r\nGbAQvU74ggtTkAQYbHtQX3xDCf+gM7skIOQPQEH+VyMYwQXklm7P3UoFR1XBAUMAoA9AILMYsIwK\r\nWMUC+AWcA7OxAARe4ADBqRUEPmjRCD70Ag6MYDn2AUEHHjACEKTgV4FWQQdGoIEOdGACF2iCuHnh\r\nD6uNUgcewOkHfhAD+KWgpkBUARVy0KEb\/ltCEBZBwCUDMBhAYdM3ZCEOLGutf+eAMy3YzwkSWwLL\r\nKNU7Lng0DGKwgh\/HQApXj4EOetAEecGgB2MHg0a3MZSrDcIK+dwCFbTdoy3oQJ7rgoE9rRCFLfyA\r\nGHi8Ryas8ITgPfKe5FgEkuMJFh+QYRapy7UiGooIMehgC6kjRq65gAUpYGEKNnDauHQgbh35YyT+\r\nJdEBA3S1ZwtgJwIt2qZ6SWAACBSqA\/5rtAVWcDkVOCBSEfCfBhYAAUpdwAUbYD0IIFCCCCxgWA5o\r\nAgQ2UIL+uCgCYtOACSzwAhJQIett7kDfQPArF4BgBH2zAAjAgvJBfGGUVvDBt2wgsIKBZBcpwcYj\r\nFbkIK7w9EnrnBCm08EiKUAhYsHdagA2C9Ej5dAyPVA09IAWfkAVboDBioAUmh21PIwWaFwxZwAVZ\r\n8FoaVQzasz2mwCopkHVSAGgmKC+f9QIvkAInk0o9kAPZdxxmJhss0FY9YAFVdEM+0AMc0IIm8AIu\r\nwIMqkAJUhDNPZVkxwFU90FVCxkaR1QQcxAX+TLhmPRAig2VyCEEnOGIKVyBQROiETeACHXABrNID\r\n5dMiUZdUx7FYgkNTIkJBLlABGAB9F3BY8lUBLcJpFGI+XMVVJZACR7VxKfA0MdBwI0AFOjCEG6Bn\r\n3NGEKcABMzJkUYMK27UEpKNbBqaBaAIGOABIF1MJW+BbmcAXy5MIUkIGVJA65AAFWnCK4oJdWSAl\r\nZRAJyzMQrXhtVBAMlCcFgkEP1LY89EA9wziM4tYTROCFVwMDD0A5\/INxF1cBBRRox0dU9OVNGpA4\r\ntWJ+rRYBFxACeCMoIBICK5A4FpBVDIA3sNQBEiByMLBxfaMBFlAB2shtB8ZtU3BgxyAFXND+jxEY\r\nNcugjINgNYs4GU9QZE0gBTJoYVAgT26XQ\/PyeTmkA6FVMyugVDk0YYs4LlrwdT\/zGyO2AjmUMALV\r\nA+ojMCfZBMAYPbpGPcTYki+5EV6QjF6oBVewEGLQBJPYeS8gJyf5BB2QGj7QAi6QCfL0BI6klNgC\r\nT1YwRD3gMjUDBfoXT\/GkAtXwAz3gAljwNFRwMMGReQLDRTZQkScZA53nNFfYHTmVAnjUE1swHuvH\r\nftnwAxswOd4nAU6lASPgAO1oASIwj0v2AYSyAoM5AQ\/CJ4IzKFllX7rSAA1gfpTiad00ATMSAZLY\r\nOSIHfiLXVUzYVRWwOS4SAyI3KB2gAyP+oAKxQw5eoIxlNRZ5twy5xpVAcgyHoQiTsAySYIDM9QV7\r\nVwzVNQ4OpTGLID0K8RaHwW1+cW0tqY\/4qGvMqY9SYoCasAU02QvjoX7flQITMAIp8AJYACwSAAMj\r\nEClw01WX+QGXATibM3KqVBobsgETpwFX9wJ6FnEdUAI7AEBneDKXA4h7WHWU5itc1QSYCTdmaAMu\r\ncAGEpmdN0DbMsAxFoH6jVARZJ2TTwZVMuDIlICNMaD4q4AKUURohQAIjsAI4sAJFkAMbZFj09huU\r\nxkwpwKGc1QM3lAM\/IDjcIX7w12bdoaNPo3WUtnXlUqBEI3cxwAw9IQgO4zBG0QkK+Hb+BZED8WSA\r\njrR3OkAK7TcOviF0KPEJxPADndANVlA9PXN38USBUzAFvCiBbhIM2CYFJleBagJ\/\/vgJWKADVhA7\r\nMEFCp8ADs+IAI6CgIZcCyjeNz0ePFaAAECABpcYfIHCGkbMhEuAAKqAgGLAg6rUrKrIBHTCYsMSp\r\nJDCIG6ArpMlV9WhxfoYdZVgBDuACIwABFRCrbLMD3kAMS1pWm5R5zvA0QFKVj+RIACis9wSAUeB3\r\ntNAjk5B\/AJgJjhEJjtSszIoIBugEA5GBB6MFWZAFcfp2mZeB2hqnB2MFO1AlMEFumZgs6Yl7bSYj\r\nXBUc1mSiL9BuJJB9L0BorMJCPnD+WaJwAqaRAj\/AcKdJPu22ksiJDPdwYKTonAu7DPgYDldzq\/+Q\r\nqyIgAvyzWNbkASsaNxbCKu\/hhzBwhuODHOYVApVGQaySAxlbApaVSt75Bd2mEvTnDKgAErBwDMfg\r\nDAYxBQoRDN02sxAxOldgBag1E3lRY3thEzERbdvgFkcLFOggDw5BFROxbcFgEc3gsOEAlwRpQqaA\r\nd9Mas\/RHf9+QCA3BEgVRYDUbEdows9zQtmJbPQbWnPTAFfQADIowbgRpNWWBt4sgC0qxEvSnD\/yV\r\nEDYbDrsgD1aLFIfrECeXCna7C76QEjjbi8jYUVWjdkIrNQfhFGkUtbxQthuxDyv+YRE0yw3zcLrb\r\n4LimG7W1Sbrz0LDfAAa4Og1em2OG4Ld\/KzVR0Bir4BFRcRCHGw4ndwzy0G1I4biSW7qpixQLQbdc\r\ngARJcAVVoiNSk0Y6ohTgUL3cwBK\/G7Xbi7Y4Kw6Q+7gRIW6ri7hS+7jNoBFbcCzmliNXg1pppL2m\r\nsLlb0b0NsbjMa7zlWxEOQbptOxEO8bc80RNLUCfrN4JDy6SroBLY67sKEYEMMbZDqyNXoI\/qq7qq\r\nwG0RYWDDe7jKWxHbpgpekCZbMBRfYG6oMILbsGO7UCz7Cw4wgbdTa2CN+78225w2y8EcbLiGy7YY\r\nIbGjVBLSQJBDOw2HgAp5V8P+B5G7ioC2haC51XuzgZuzHry8L4vFqzB\/FhG837AMYHAEpCeXJYEK\r\no0S0BsFfScHDuQsLY2K\/1bu9Xiy8X7y\/bsu2qAu7\/JAKbIHCSUAFDrN+KhzHc+zE2du3Aqa9S\/EN\r\ngcu\/zCsLygvABrYREnEMICHAYPHH3cXCQhsQ+res\/\/e1ZpENSVG2ApgNA5gUYtvIBaGPzevKMQsL\r\nzUmbOesMYqoU4+APVaPAqHA1RmG\/UMx3KzHDf1sQ2GDJyay7P9wN9EDJintgIWy3kBvNHzwOKHzE\r\naDy0q1zKqZzKYksNC9ENB5gKrTW2r3u2kjyzMStukduLEHHFi\/uWYoUEgoz+rlazt4YwDawjoRcc\r\nENMrtKslxdxjwfh8Fk+1fmWRvwzRXw2RwQXRwQZhDB3BBV5gBKXEPaOExr5cxL48yJjrtR6twvI7\r\nyHO8DVOAH4O8DdbZCyBoqx0BC9smvBTdvu4rvYLctdzz0dswSp3s0SR9xkR7wfLb0+2wDWHVE5Us\r\nDwP2wVSRveMgusRwBDctyPh8NRq9fvCbiV8gQlcgQoS801fTBYRc1DmBCl1wWrxQRmWUGHOiFTls\r\nYLbZFGbHBWOMrhptNVsgyCVhJz2N112t0ip9BWkdHkRLEQ+7BWFAk5UbFdWrES7xxd6gyRRRnRE7\r\nyKtl1Tl9xtKg0aLk1aLTdMaD7NmnldElDdYb3QtqXdFhEBUykch6\/MEYcc1gnNRBwF0jbdWZa0JE\r\nHNbrJ0pjjdVfANwivQ2oZdhPkdhMDbpNAcJ9rLoUZasNuwU8UEqYa9VlRTplpXKD3AX4vNO+PdjC\r\nLb9EezVpXdRzUtEGZp0uEcMgPMNaywsNewTcVQX4bN0MzMDql9nefdWhTdJp7cvlHQZpfdxh5cLh\r\nsL00fL7FO7VSQgxBcASZuN1VbcSaKw3XzT3bPcgkrdPkbTVnF+CooNhUARGOHcnLu7paexiBAAA7\r\n",
  "author": [
    {
      "name": "Robert C Drewes",
      "firstname": "Robert C",
      "lastname": "Drewes"
    },
    {
      "name": "Jean-Luc Perret",
      "firstname": "Jean-Luc",
      "lastname": "Perret"
    }
  ],
  "bhl_pages": [
    15777913,
    15777914,
    15777915,
    15777916,
    15777917,
    15777918,
    15777919,
    15777920,
    15777921,
    15777922
  ],
  "geometry": {
    "type": "MultiPoint",
    "coordinates": [
      [
        37.466666666667,
        -0.4
      ],
      [
        39.483333333333,
        -4.8
      ]
    ]
  },
  "names": [
    {
      "namestring": "Dimorphognathus",
      "identifiers": {
        "namebankID": 2476803
      },
      "pages": [
        15777913
      ]
    },
    {
      "namestring": "Phrynobatrachus cricogaster",
      "identifiers": {
        "namebankID": 30185
      },
      "pages": [
        15777913
      ]
    },
    {
      "namestring": "Anura",
      "identifiers": {
        "namebankID": 2476589
      },
      "pages": [
        15777913,
        15777922
      ]
    },
    {
      "namestring": "Phrynobatrachus krefftii",
      "identifiers": {
        "namebankID": 30202
      },
      "pages": [
        15777913,
        15777914,
        15777917,
        15777918
      ]
    },
    {
      "namestring": "Ranidae",
      "identifiers": {
        "namebankID": 2476894
      },
      "pages": [
        15777913,
        15777922
      ]
    },
    {
      "namestring": "Phrynobatrachus",
      "identifiers": {
        "namebankID": 2476817
      },
      "pages": [
        15777913,
        15777914,
        15777918,
        15777919
      ]
    },
    {
      "namestring": "Schoutedenella",
      "identifiers": {
        "namebankID": 31333
      },
      "pages": [
        15777913
      ]
    },
    {
      "namestring": "Phrynodon",
      "identifiers": {
        "namebankID": 2476818
      },
      "pages": [
        15777913
      ]
    },
    {
      "namestring": "Arthroleptis",
      "identifiers": {
        "namebankID": 2476593
      },
      "pages": [
        15777913
      ]
    },
    {
      "namestring": "Phrynobatrachus irangi",
      "identifiers": {
        "namebankID": 4804909
      },
      "pages": [
        15777914,
        15777915,
        15777917,
        15777918,
        15777919,
        15777920
      ]
    },
    {
      "namestring": "Phrynobatrachus versicolor",
      "identifiers": {
        "namebankID": 30231
      },
      "pages": [
        15777918
      ]
    },
    {
      "namestring": "Phrynobatrachus natalensis",
      "identifiers": {
        "namebankID": 30209
      },
      "pages": [
        15777918
      ]
    },
    {
      "namestring": "Phrynobatrachus dendrobates",
      "identifiers": {
        "namebankID": 30188
      },
      "pages": [
        15777918
      ]
    },
    {
      "namestring": "Phrynobatrachus plicatus",
      "identifiers": {
        "namebankID": 30216
      },
      "pages": [
        15777918
      ]
    },
    {
      "namestring": "Phrynobatrachus kinangopensis",
      "identifiers": {
        "namebankID": 30201
      },
      "pages": [
        15777918
      ]
    },
    {
      "namestring": "Phrynobatrachus parkeri",
      "identifiers": {
        "namebankID": 30212
      },
      "pages": [
        15777918
      ]
    },
    {
      "namestring": "Phrynobatrachus parvulus",
      "identifiers": {
        "namebankID": 30213
      },
      "pages": [
        15777918
      ]
    },
    {
      "namestring": "Phrynobatrachus perpalmatus",
      "identifiers": {
        "namebankID": 30214
      },
      "pages": [
        15777918
      ]
    },
    {
      "namestring": "Raninae",
      "identifiers": {
        "namebankID": 5429390
      },
      "pages": [
        15777922
      ]
    },
    {
      "namestring": "Hyperoliidae",
      "identifiers": {
        "namebankID": 31786
      },
      "pages": [
        15777922
      ]
    },
    {
      "namestring": "Amphibia",
      "identifiers": {
        "namebankID": 2476588
      },
      "pages": [
        15777922
      ]
    }
  ],
  "status": 200
}';

$json = '
{
  "_id": "25024fbe38df32ca9636b534edb8827f",
  "_rev": "3-c201312be04e7d78046410a57a10a926",
  "type": "article",
  "provenance": {
    "mysql": {
      "id": "637736",
      "modified": "2014-05-17 11:53:08"
    },
    "biostor": {
      "time": "2014-05-17T11:10:05+0000",
      "url": "http:\/\/direct.biostor.org\/reference\/136730.json"
    },
    "mendeley": {
      "time": "2014-05-17T11:10:05+0000",
      "local_uuid": "56c9d6e4-07d8-4620-bfe0-d6c7c36ade2c"
    }
  },
  "citation_string": "W Bohme, B Schneider (1987) Zur Herpetofaunistik Kameruns (III) mit Beschreibung einer neuen Cardioglossa (Anura: Arthroleptidae). Bonner Zoologische Beitraege, 38(3): 241--263",
  "title": "Zur Herpetofaunistik Kameruns (III) mit Beschreibung einer neuen Cardioglossa (Anura: Arthroleptidae)",
  "journal": {
    "name": "Bonner Zoologische Beitraege",
    "volume": "38",
    "issue": "3",
    "pages": "241--263",
    "identifier": [
      {
        "id": "0006-7172",
        "type": "issn"
      }
    ]
  },
  "year": "1987",
  "identifier": [
    {
      "type": "biostor",
      "id": "136730"
    }
  ],
  "link": [
    {
      "url": "http:\/\/zfmk.de\/BZB\/1987\/1987%20B%F6hme%20W.%20u.%20Schneider%20B.%20p241.pdf",
      "anchor": "PDF"
    }
  ],
  "file": {
    "sha1": "f919a73ee3b3709a56285db756e6a68a0d73ad04",
    "url": "http:\/\/zfmk.de\/BZB\/1987\/1987%20B%F6hme%20W.%20u.%20Schneider%20B.%20p241.pdf"
  },
  "thumbnail": "data:image\/gif;base64,R0lGODlhZACSAPcAAFVSTGFbVWxqZW9taXNrZ3Fva3RybXp1bnd2cX12cX17dX59eYF8doJ+eX+A\r\neoSCfIqFfoaGgYqGgoeIgoyKhI6NiJKNhZGOio+Qi5eQhpSSjJmUjZyYj5aWkZqXkpeYkpyalJ6d\r\nmKKdlaKemZ6gmqSgl6milqSinKqlna2onrSqlrOrnLiunqaloKqmoaeooq2qpK6tqLKtpbmvoLKu\r\nqa6wqrWwp7qypbWyrLq1rb64r7a1sLq2sbe4sr26tL6+ucK6rsK9tci\/ssK+ub\/AusXAtsrCtcXC\r\nvMrFvc3Iv9DHvNLKvsbGwcrGwcfIws3KxM7NydLNxNnPxdHOyc\/Qy9XQx9rSxtTSzNvVzN7ZztbW\r\n0drW0dfY0t3a1N7e2ebWxeTZxuDXzeLZzu3ezuDX0OPd1Ojf1ePe2ejf2d\/g2+7hz+Xg1uzj1eXi\r\n2+zl3O3o3vPl1Pjn1\/Po1vjp1\/Dn2vjn2PPq3Prt3Pfw3frw3ubm4erm4efo4u3q4+7t6fTt4\/nv\r\n4vLu6fjv6O\/w6\/bw5vnx5PXy7Pr06\/357vb18fn28ff49Pz68\/79+QAAAAAAAAAAAAAAAAAAAAAA\r\nAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA\r\nAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA\r\nAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA\r\nAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA\r\nAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA\r\nAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAAAAAAALAAAAABkAJIA\r\nAAj+AL+MGUhwjJqDCBHCgZNQzcKHC+csjBMHIpyKFeHMkUhxIsU6IEOKrLNRzh05cebc2agyzh2R\r\nd+7Yibnx5UqVKgUeLNhQoUM1bBwyHMpQKMSUFufImXj048uRIlnecWmn5kaodWTGpEnSKhgwQXsC\r\nHcqm6MGlD5fKMQpHDtq2aJW6XSpxKcU4WLOavINHZcyZKrtmtZl1sN+bW++AMRg0rJq1BxmuHSqH\r\nDd2FbtPC3Qg3olu5LFnihfn35EqtW2uuLGwz8eHUG8EAZRO0KO2ytNvCofOQzty5uuX4\/v0bj5w5\r\nduTYCTkH5B1AIVtvnTkTT+LrdaA\/v34d5xzZcBr+jw1PHmLl88TTK09ecq7Sq1CfZh9sZ+Z169xj\r\nggSUP39s2pXhdttCvuF2Hh10WDbcb8kppxxychj3RnL1\/QHSHxbKl512idVnBx746cffS\/yVGFMe\r\nJ+aBYmp3iAHggJUlyJsbxL1Ro1sNyjHhevXh6KGHdNQR5IUWWggIIPbVBwgehchkx4hQ\/rHdiCmq\r\nqKJrLt6WIBtuIGgHggju6JaYE3744Rt0\/KimkxjagaFNT\/5R4pHP0VmIdYUcWcieddZ5pJ18XXkl\r\nbGuMZWCCZjR2m5bkBSjjbmCm+WWkatbhBhpouGGHG3CY4QaXn3bpBo1dRoogRXTEAWZ9kdo4R4j+\r\nLGYBIB2j2mFFDlIooesSSiyRhRVqYGGFsFhkAYaxVmSxxqJsLOsGGFi4YYYZmbJhBhliiKHEbctO\r\ny+yA1n76LbOcammEHIOedseyb9D2KR66FkLHIfQeAuKed+J7Jx6EpMnvIYTYsaebZYhRyEyCuCnI\r\nkYJgQYcgchYiSCH1UqyvlIIcgggi9ErM8caI7HlIvkDgsaJrWQAlbppLGPGHGyIYIYURzS5hRQp0\r\npFBEEVbgMSEbbxSihAlGFGLCDEeOgcXBdNyARRlFy+nwH4WIIcMfOahAsw4rrIAhkvPKMIMSRpgh\r\nxgwzSHGDEFunYIIViNxgR7qngbHGlrXmCoj+GzKscIMJVVhxww0rsKGDCjcY4QYedgBdyBIcqND0\r\nDXKKUcUh9RlhBRtSHHKHIFK4AYggZqwgBhA2FIHFDTa4fKQdexwCRAo3BAGEGbYDkUMON8ihBBBG\r\n0FEIEHOf7JcYa5SaoB28HjwyvYQwuTEeGxcS8sAicwxI9YWwAQYieWj8vMhS\/HFIxh8zAvLGzy+s\r\nsfocv48I\/Otbr8MceeCnmotb0kbI72zIQrYGuAYwWOGAVggcAhM4rAOGIQxWiIIV3GAEIBDrgGCA\r\n4AOBEIUwfCEMWHjgA8WAhQFmEILYEuEDrSAFK4AQhND6ChZ0YLI7nCwmZAAVbejQrir4UIH+C6yC\r\nFKKgq1wpQQpLSKIQlyAFLORKCmZ4YguHFQYDHhALX3DhAz+oQhKCgYQiFMMIVfiFEIphDNmalhjg\r\nYKUbtgg3MqJNfRjHOEJEzw6EAETECKGvkUlMEAsbHcMAmTGRPc+PEsNXxg7ZMT\/Wa2KKHB\/FHLkn\r\nFF3JLzks1w5LNSlN2WFCplLTj\/5Ahz+4qZR1kBOSTMlKJD3pSXVSpR7vIKdaHqmWfpLl15j0J0BY\r\nMl1hSFSowDQqHrJqlG5C5o\/68DUMyclNtSTE16Cpx15CrJqF4OOeAvknbvYSEHna05\/4xJ1gjgpU\r\nCHLDG9Zphz68oQ8V+gOa2gTNZLKymdT+dCYeA1YIDF1TTgtb2B8CKshaLkyaA11YP\/O10D\/doUlN\r\nsiEO3UWrUYlKDp78AyHKdM9SOvOj9ASphwBhx5JK85YfZdhAa6lKDF2MYf0kxEPvBU5w3lAlLlIe\r\nRmm0zoRZtKTtRBAzWQmxN5iSEEM9X0L1SM86Quxr9TofvVY6MvMhoqTm+yMh6GUHbobTkt0JJqgs\r\natE1IMENiBAEIQSIBXplTBGC6AMjyoAFjhmCEWt4AyLOYIWBhiF08ROf+DgGsSg8wbB0wAIZOMaI\r\nTBGiDEjoQyPU14U3KIJjVyhDI+jFMT551jVhKANZIeWGPwiBATkwgQjskIIHQMAGEED+QQpSIAIL\r\n2CABFlAtCkYgAQuM4AIWyAAighAAKYhABBuAAQo2gNwSnOAEb8iBBxKwgQ2kgAdWIMMFRpABC7wh\r\nCAcQAQxoJwIJjGAEKLDAA1AgAxekAAhk8Fwh6PYqMXjKomioqCA0kIINMEADh7iBDETQXf8eIL0E\r\n5oBrN2ABCGjAA6ptgCCi0IARMAACG7gACE6QAgdkIAMbWAMOUCACsY2ADoiQAnMtsFojjIACtN0A\r\nEFgsghSgwAQZKLEIGNA5Xz50vjHpizktuod0ltZT+TzEHxBRhSQgwnwZoxrFnixYJQsirYBkX8gS\r\ncQhGaKwPbnBrVwd72Yxd+RCK4Cz+ItLMWev9AQhjwNcvExPaUeW3yBadZ2nZsK0JleFnbhDtp8pg\r\nShn4YA2eioIIHEYHJAThD2gwwxvcQIgqeMEHf9iCUdtQBjr04RBhcBkZgAAEadnhBp1GQxmEEAYb\r\nuEEQZejx9vyYByCvSCVhQAMc8EyHPYiKh24oRBAUQIEEHMACBnADBwDAAAoIoAEXCAAWjOCBN0CA\r\nuhAwAARE4AEJNCDDFJAABPpgAikQYMcJEIAFLNAAKzBCBgzYAAUa0AAJNJsADHgxAyRwgP8e4ASr\r\nzVNNa91GEL0q13fuNa3q0yWBPQEFMTjBCGBggwBnwAQ+8MAJbsABLLDBBkMYQQ7+niByGeQAAiYv\r\nQhBoUGJEDMEHVTBBEDgehCCYgAyCyAIQUBCFHNgOCUBYuQtEMHMZ0GDnQSiavvRlpb4ImVpFjpSm\r\njFlaQGpsq3YQHyE4tmSNjsyunP1DFqxXr+pBbH1e7rIh4\/fWNTPCTZdl32aXDs75FnwjeAhmr92w\r\nhz1kSp3qBGUfSlnKNyD1k0YFKTMndE\/zOZOp\/kxpS\/fkz4ASUqECb+bSxVnJphs8mGjoex38XtHR\r\nk7JNIDWlm+woZZemXsmOlxiGzjcxQFpsqxDj48gK2UeqbXVPv7eeNpmuIhCtRO+9xpQgfF2qPhR5\r\nQvBMPB5R\/4c1lMEQfyDDp23+\/wdCN84QFXv1qGzPpUOgoV7OtPI2E7n+bA6f+AU3PhlCz\/fR41l5\r\ne\/iQO6UJTY3iMetRwABDdwEuMAIr4F5\/UGLPZQMUgAM3cAgagAVRAAFAMAJZMAQyEAUocAMi4AND\r\nEAQyIANIsHRKhi91ZzFLV2t2lz98cQfz1yXKRyu0sgd9MHjy9H8iBVJYgARFEAUugANRIAMncAhI\r\nEAVRcAVQ0INWIAhDwAZlMARRQAZuQAZPkAUSeFhZYIRVsAaHcIKb54Wbt4L5I39moHCkN2nqBCZ\/\r\nACJ9wHr21H9WpTFxOHuDFT8WozEbgz54GD+BFYZ+uHkEZyUtiAdkQC1uMHr+glAHk4aGNehphsd4\r\nCJV6+iSJILVQlGdHf4RHgMR6kPSH+tKJgNhGxeeCmAIHyrcH65SKk\/YHfcAvRtWKlPh4sShl7oeJ\r\nJQVOnchHWRVl7tcxSwdJKnIIKjhfK2h8pLhraCAIobdOgJeKbOAHmHgIfsAvVDM+A2WNf6AIf4B9\r\nGfNpABNV9rJ14MhZi7RkHxMwWadl1xMyw9h5gggi85dfxeROqahOa8ABImADREAEKFADRLAGRZAD\r\nREACMkACKYAEEJACFFACNpABEFACQggBVXACD5ABMYADJ2ADUAABSZAEMrABNiADKUACJYAFxxUD\r\nu3UFH7kBLlAGMTMEHCD+hBzwgCJgAogAhvFnHfNHB39XZPS4iG2QBWnQLm6wBlnwTs3CBl2QBWWQ\r\nBn3wNEHgBV1wBVngA1mwBZW1BmuwhW+gLGJHCEVZBl2wBm1All15BmzQBlhgCGtwBfMnCKVFBmRQ\r\nBmWQBVfgB24QBnLmjoKIQ3dGZKOSioSABCWQBDqgA0+ABD1ABFFAAklQBEtwA0Swg4kJBThACFAA\r\nA0jQBk8ggjigA32QhF6ABDqAAzmQBaTpA1zwBEVABDpABE8ABUNwBVdQBH1QBEOwATyABkhwBVIw\r\nBU0QBFFwA2LwZEy3goFyB7mWfHtHK6nYB1mgjzlwBFeQAzaQBIbDBUT+0JpEkAY50JpIgANk6QQ+\r\n0AY5MALh2QNt4GhpwAU+sANHsAZEIANVkAWsaZqMiQSH1gVP4AYf6HN\/EAVF0ARRUHNPgF2IJGcF\r\nFxOgRwdtwIyj8qCLwwVJgAVUgAU+VCxFkAZrgAU7uAZJ0AVIMJb8OZV2WZ9dsAVXsANVsAU+wJ9a\r\ngAVLUAWMcAQVmgWDkAZ2+ZRPgAUimllkQAdS8AaVFQVvcAVIICsJKorA5CmoGHj16AZ9UAUEeQOl\r\nKQOvSQI64AMycAQDSQI5gANQ4AM+gARHsDMMSQInoFw2AAM6cARHUAIGaZptUAU7EKZWcARvigUX\r\nKWC7g4FRQANYUAT+XdAGV2AEqWUF9hKKY+iXZBWYeWYjD\/qTnwKdRuUHb5AGbdAHfoAhvmZ4fbAG\r\nNRhmVzAIDzqUXPAGg+AHmAqNiSClaQB+zFQvZ9AGU4Uhi0AGWPAGtspPjCpRDPp3kbqIRrUEDkAB\r\nKHACFVAEJKABJkAEOvMCH8ACNoADHUgDFpADGwACRVACD+ClKBCuJ9ABGdAFG0CSKSADy3WdNlAF\r\nJRCTOuACSBCCKTACJUYD7vUEObBdNiZe17OX7\/h0yVdkqPgGeZWKVGCwB6uVRIAHg\/AGXqCqWilP\r\noroGG+UFFtsHhZAG0YJUfcAFaZAEjyil0OgH2bQGVLOFGiVNYDn+KnkFMFnwMqWkL0xiMp53cFDn\r\nk1CailYAAR\/QNTVAAkSQBBDAAgZZA4V5AjVAAyOQAjAAAyUAAg9QAT6AAxrAXyhgAzZAAhmgARDA\r\nATFAmDFQAimQAzBwphlABEEAAjqggVbrASlQBTGgATPpYvYqBouaTXVXa3zxKnOAcBXlsqqYiuyy\r\nBkPpsFqplcy4Tg\/aBo+llQ8KuZmaPGuAl+qEqaG6UQaLl4YHlobXBkVpVJijTnbULmWQoHtiMnZn\r\ncHmHKcwnpan4oG\/gBBDwAg6QBTE3Wx\/wrBjgAFVABBxwAuH6BDHwAFWQA1ebBVGLrGtAAhXQASkA\r\nAmlApeGqAYX+SQQQQAI3ALVv4wImoAPuOgI2wF44YANPAII2djl+yB8g0hcvKKyye7B8sAa+4it5\r\npaOJC5Cy4itZICtZGJRdUAXrVAVn5QdVcAXRwqF+kAVuQJVbYMBVEJRZ0AZd8AdjySWqFgZXQAht\r\noGlmWVqACGT7shIvGLiD+wZ4kAVDe5REUANJgARDy52\/u49FUANI8MJIILRVQAU7UIQxYANd0ANJ\r\nEAMAqQNs4Jo4cARFaFheIJz6iQRPMJlu8ASNlgNrkAM9oAM5gARJGoqdZ3Av+Lr2GLl4YAX7WAU5\r\nSgQ+lAS+so8gqo87UwVFgARXrAMHRARcfARRAKJRUJ4qzAb+aaCfO9ODRVAGfYwETVYFGFoGRfAG\r\nQ7CZUaDEQ3CQbXU+lcSX1jEHJSwqO\/sG84sEVFAFS2ADS0AEfJAEN9CaXLDD6zRyXIwEObDH+4gF\r\nL\/wENuADVwADHSnAS6DEiOwFh+ACMoAFfaCfhvUEVWBYbGAEBDwEehybf7CDqKsifDKGmpxfRkZW\r\nvDqYQuuPNrACOICaLayPLfy7ApkDMlAEqUMEG4ACUHC8KEACNtABJYADMoADSAADuxOCOBCa9vxx\r\n6hqus7VxIvACHGAC7KVca2AEbUWLgdhGfsmTxaTN6xSyKDyUEdsGg7AGZSylf2AFfdAFaYAHbUiP\r\n2fQGu8r+qnjJln4gjYfwTsw0VFiwVR+Ddna0PiAzSX4I0TgkWpkSuHnmBx7ZBiewAi9gkB+QBSdQ\r\nBdmrAThAAh+AAdhLBPpoASdgBETgABxQARoQriVwBDuQBUdwA1cgAWvqAzDgARogAlHwZNJUiyUF\r\njXZUs3cChmLYqHdQBn8pKpMmu6\/YByM9CIYwCPyCVIRgCFy2dVvXhoZwVYo9CBzjB4tACH6QCI2N\r\nfW8QCBvDCI1geIxgPowQ2iAzMvQzPzXdWZZ8yU23FS\/4qKqo0UhgAljwj2zckYU5CERwAzlQAy9A\r\ntkhACC+QBDYqxISgx7t9BD2wBj9A1UPQBWigx1z8A0b++ASHMAQfiAND8MLWt8WJ6QSP7AZY8ATY\r\niUgPPYqO+qjqxAfrNAhVIANLwAIgmgRUAMNEUMw1wGEvUAMw8ALyGaaK2QNuUAVHIAM1sAM6UAY4\r\nUASmiQRlcAVH8AM88J086AbzqlwJ3oNkIANA4MxbOgNRsASt+T3tKIYhotfoPbiEUMrKggdGWSxc\r\nYJRpkAZP8Ab0YwdXBX5cJtcbkwiJQHbzcwjgt9minVbzE9rwQy\/0E9oAUz\/H6XmsjQZjFaGevN5J\r\nwAEkQAJp0JopAAH7iAM4wJA4YHh+UIND1YqDYEesigfTWLIs60xvzXojM3xZtXtKxkeGUIsh7OQr\r\noSz+6gQ0qcgH6u1Orviggr1RiOCwZ24Ici2JamXYlB2JGoV9MbVVz0PpU2UxhWTJtJfad55N8Cco\r\ndyCUoXJOqsgHP9mKbIhUY+6wIAKNGBIIfxAIfRBXNfjoSMWK2JfrjY6Jm7d7hoSCiESLm2ezYLUS\r\nY4mGOsK4g9uKME3mbNiK0wiLsi4IgVDtgoB9LGsI1G4IfcDtsb6N7wc9wF57nUhJqEuzxJguypJX\r\nsiu76v1O6yTo76Tm9B49nNqpsV7t1d6psN7tENsGiSBXf8AIi8AIcJVVVwV824RIqS1JIhOGBBdR\r\nwKos7d7JU75OJN2+rAgihP0H+K7vIK\/vfaAITwD+AjHwAgMgtefVAjTQ6JRk6Q8fSZS0vun+HCGC\r\nPKAru+oEuu++7DX4B4PAB2cu9BgyCLLOTLCe7\/7UBlPwBE0QAz2wAzjAA7+ljRCDSJ0e87yXSIjE\r\n6yZI1wTH2n+2uKRLjz6T8fxS2HgA5ISQ6G1vCOBnCIGg7XN\/7XOfCATfCIowWY2wCNuo6YE1jnzI\r\nMXDFWYbPSMQIZIkxl+eEUetko4YbwUJZBsnzZwy7BKcMuk7ZBo37B1Pgd1rgB5z\/BmUQmmXgB3vQ\r\nBWdwBnoQCE1gVIvbBw9a+qPSBYSmq2jwBIJQStEiLO3SfS4iMPmDIiFCBsnj2iTgsynAAURQAh\/+\r\n5pAcUAQc0GESkAQUQAIdUAHajwEfAAM9EAEh0AMNGAMUoAHCS4Aj0AAh8GAhcAEXoJ8jgAPnRWIj\r\nwAMwMAIeAAM+wF4twFsmBwQAgeRGhxE0RCiRkSEDm0J48tzJg+fORDFr3Fx080ajRi9r1rDxuOaN\r\nR0Jv8Igk1CZNxjR92rgh5LLNGzd9+nTp86ePnT9vytR8c+ZMoEM5DekMFGjPUkGCAglyc\/SPzj+C\r\n\/rj5c6jpITt2CNkpVCiP2IcTs\/zMOPMNnyQ4bLwhUmLJEiJFkrxBQqXGkycxfBCJcsTJkTRdnmD5\r\n0eZEExxRnPzocaTJkyt9fCCZ0sRHlylPpmj+KXNkyhRBTaYwudKkCY8UV6Jg6RMldBUjSK4gCZIj\r\nSRSGeBrewRMcTxi0Gd+webOCg4MqHxykoAIBAoc1Mkhw0LABBQwUJFBgwIAEB4gTLrBgr1BCQwkK\r\nJ2jQMD8ER0EQI0a46CCjjAscLqb4OAEEGGBwYTsZZGgNBBpwwAKHE2TYYAQRSkBBiUMKuQMQ4YIT\r\n4yc23EBOo0EMIYQQQwx5ow9E3kDkkBMPqWILF\/0wxI9FGlnEkBEN6YORPlzM8RAXDWHkREUYOZIR\r\nRhIRhBEcDVlEkUYMaSSpRBZB8ighj0QEkUZ+LISQLsP6bSLhsrAIxJFoSsGGGlB44QQtPiD+oQIT\r\niKjhBS72KAGHCp7oAYEe4qSCCxB+8O6CKpBw4YohYnABBB6aCIQGGIJ4b4QhYIgBBy2qGOK9Lmjw\r\ngYcTihghiDJkCAIHE2TgDIcjstjOBiDAuqMQQIATDgszMDLODSKSwBPPNHqogYgXwiNiiTaO6AGH\r\nLpCIgYgeekgjDSaOeKIGHMq4YocymBjiBx6OIOKM1TJrYgcfrsBhiDS8eGKIIcgwjbEphniijyai\r\n8AGHItqowgkn1oAiCiCqwIMQDDGcCLgwzHgJI438GIkPKvhQaZA0rkgDD5vaOFHHQQZJhONB+OjC\r\njyoMUSSQE2n0w4tF\/EgkEEUMCWTJQxb+0QJnLrygMZFEumhDESYZ2eMKmHnWkZFF+IjKt7AcxmNX\r\niYDz9SI6gB2BAgU6MICECQSAYQcHSkCABAzSWyC8EzCY4IMKHMCAggoW+CGGCq54gbwXQqigAx\/8\r\nCKEBF7S4IAYtJLgAChx2aAGGE0bw4AIN7uPhCQlGmEKGEEDAoY8qfHBhgxAsSKG3rCOW2IwP+3CD\r\njj3cQGILKKgoNLI0EIYC5C4+1oKLNrzoAgYi0nCCCC6e94MLKPQ4fouht\/CCCj260EIPPbQguQsu\r\n\/Ih+D6G26OIMHqbQA41AuujiEJ8sMsQJl9y44oo3wgxLw+Am6trXLvISKgBqeUeAwrP+rsAXyhyB\r\nClq4ghOgQAQtPIEPzZNeoRCYLS1AQQtn6EETvDAFKDihg1roAhSYIEImTCENuvNMZzhDhitMoQ9Y\r\nWGAX1lCFKrRhC1fAQhmssATf5MpMEpmDFX51EdppZAPawZsEKGADv1SAAw8gQQlCQAIK0KlufaAC\r\neEjwAQ1UAAQV2EEMPjCBF2jhBRWAggsqUAEPjKA+I7jACDpAA001oT48wNwQCjICFExBAzLwj4MC\r\npIEYbAACNhCBGMLyuq3doWteo0lO3kAjPvDBEG7gQx9QloiflQxKhkBEkJYEpZ0lYmeGyFmOpJSU\r\nKsFyEbJURB+cIghF9NIpe4gZkZD+9IelnMEPinhCFwyhBywgghGIcEhYIrI1KSyxiRrpAQVacIIj\r\nhCAEUHgBCt5Ugzd1qgMnCNgLSMCFI3irBzAYQQ8sFQIUbIEHP9ACfFqgqRNcYAg++MEUYNAEGujh\r\nCC4YAQ9owIMzuCBSIhiCC5AgBQsklAaCKMIfqiCDIqwgBVY4hBFhN4cgYoR2e2gDDnrwg2T1IAZt\r\nIMIOiOCDAV3GBzGIwRGOgAMddAFaOnDCTR9DKhosUFzyGQIPkkoDzzQBCoKkwR62IB\/VDIEzQ0AC\r\nD6JAgyigoQlbQIMNo5CFKxRBBhYowhgupCvY3UEKaACWcfL3BC7ogQ8l1EJUCkH+I0YACRGwRAQp\r\nE5HKQxzpRIjopYtidktXKk1pRoOlU4zUy53xspeLOASSCmsIQZSMEEI6SoukKZZKlvQiG3nDCShQ\r\nAAk4wQsamEDdWmITmwSiD0mxbVL+oJTb7sEPtvVDTvzwh9\/itriBOK7MkovbpzC3Kc3FrVP+YIhC\r\n\/IFMeShLWUx7Wo1cwQvW857wNpaIkj1FEU05kVOMxiRXkldJhyDKIa4EWfIaLUfzhVJ7YWm0XjaW\r\nl5BVRGbNK6QxSXNXEJmIFT4CLDvUpA\/N2x0XetAFJkDhCcHbwhm6EIMp7GEIV0ADGrDHry54IYEx\r\nvYIfTDMaEl7BB5MxTdMYqgf+JpwhoG3Q8BlI2AYQk4EMaOiCj88wBEGobwhYqIIV7HCIsUCsLFaA\r\na1xr8ocYtMBtNfhAC0KwgA9g4AMRCMEIBACCIeQxMx2AwQcIFzccdKABIYjCDwqyADP2wIwtAIEG\r\nVtO4KbQAzydQqkM9UJ6KxmAxLqBBDJ4wAnqhYAMWeIAJxHChsSD4IW+NK008ki0v2LUN5DNEG\/hQ\r\nvD0YTWaB8J5SfOsxKJBPD3uwSc4CcaVBLCIRK0uDq3F2Mz\/YlXyzLnXMtsAk5u7hRK4sCiLoQIdD\r\nWA3Bd5gDpmmHSQ6QoA3qJAERcJqaF\/iBCSGgQah48II+TIECjajAuGvQgkH+aCEEREiEBpL6A3v9\r\ngAlMqAHRKuCFyjmBCTvAwCIuUGMe8MBBLjgCGSSzPhpsoQ3hLlW4UZAQOkzSyRN5KxqughFCIGEH\r\nx4ICCUjgoB1coQdncMKgdmBwMmuhB324p6VcAAUu7CAxMHhBDApegxAMygM9kB6NofCDCLTgBWnA\r\n5xmeAMiIftUDoVLXBwO2UBcMAUE5cIPFsRuxjH+NJhgZhB4G0QU+DIJkfvg0zviglFvebA9eQIMe\r\nvGC07XV6DzrLpR8YYaO2p2yUaeAD+Rahh\/UmohFCcSXeA3GzWSNXSoLIrBvsgAgyTaQsd+gqGpZt\r\nOzooBgI90MIDOvCDEET+YAogiMAHvFCDChigBRUgARWcoIAHUOABk+nABBDQgSfAQANTQEEePSCB\r\nGNjxDDu4wAUYRwKcXqABO3BBCPawGjwW3KGIpoEHaNAEDfBAAyfQQA4eDQREAEKaz+6qG5ay7Iws\r\nynkS5MJ\/OOPv7AWVCkRYXhqosEA9wBcKXdiCH+CCK6gxLVCNJsCnIagxKmCCH5A7E9uBFdoC1fCw\r\nKdAdH2sCD2CxJsCJKHgCLdgC28gCKQiDtWqrOVgCM9C8ZbsdN\/gdL+CDI\/gBL7gCPeACGuiBTkoD\r\nsZswLjCYwGuDITgDNOiDM8g1PyCCLQiEDFMKpWAC79EDP7ggLdiDGUT+LqXYgqW4Oy2YgqFYCjS4\r\nO1hTikwigyxwAxPclcurptpRP687gRNwACTogQWYgBFYgA4IAQHoMnXqAboZIwzoATwKAQp4AQWY\r\noxjwAA1gPgNwqA5wgRZogj0QuQ6IgRCYgCHAM83gAYe6ABfYAXupuoKggQtYOYgaAoJogfdggBQY\r\nAzIRi2fDNM3bA69rA4voJD6oqz3YwbBjgjQ4mT7wg2wpO6FQhN9qoSiMwkH4LfMpNSgZhLmLQuQy\r\nmrvDrUSgxruLmaS4O6doA2O7uzbQpaxbq62rpCUIMc67CEIIEByADCYggg7YARJogZXSAwwgAifg\r\ngmSJPSIYgilQKij+OAM8SjkF\/I\/M8Md+vDctqDDdGYImEMIt2AHV2IGESqpPVA00kIwd2AIyQKcj\r\nUBAkcAMjACmx0JqIiYJf2bwm8oAueoGWDCM20rIYgAIMIIEaoAJ1woAXqIHG0SNAgwIe8CYSKI8L\r\n8AJ78YAQqLLGMRdPTIDGccgRCAGF0kAe2IGnUyrVcIEGaIIzCLcYQIERkAE2SAElgKaweDbMO0eb\r\n8LoirJmh2Zjo8YIdLDtfNJpRMrylWDxbSwS+AzX7UgS9XAQY7DtsVBoriZnGysZAGAo0gBIcUYRP\r\n+xEhqbzfeAhzNAM66AOvc4PvqEcHKAAHIII2+AADeIAa8AEvoEn+EugACKgBoexEHlAA9\/DEFqhK\r\nD+iAFuhE\/1CoHXA3RNkBmxsBCaCBFphAD9BA7YO+AZGcQXMBHkABHmiBQHOBE9ABI7iQSioLc1xB\r\ni0GCxOCdwVgeLdACJ5A9mEoCDXgBIpA9J5gULziCFkKgCbq3CruA7dsCPdCdu9KCIdidHagXh9yC\r\nLdiXM4AC03AC\/myDD+yMCXwqKiSDLfABHHLFZ8ODzKODN\/gacNQpFPA370kDHkuDUFuKRHgCKmAE\r\n9TwZWdtLtNuwRWgCLTC1JlhRP1iZXlsEElqExguESNQZ5uqCK0GDocDCIP2tRQhSRvgDyjNLDYkY\r\nJQixadOIP\/D+gA+gQwdgghNgoxpoFA3YJi5YHj+APRIInBE4gxOogO3jvkSAlBhogDpqggVAvgoY\r\nHIfaGz+4j\/qsTxw4gy2AjxC4gB\/ogvtwgSCYAoSyHA\/ASP5IASx4GImoJCUwgzSxg41wsJrZwWwR\r\nteAiLmAUNarhAj7wLWukRkFQRlubvi1QhOlDLjTYy6Twg7s7EeayRmu0ESmUNfPSQqUwmp3ICkEg\r\nC7KYCCdVC+NoA0U7UCcou5b0xYa8gi2IAT+4ghMwBCioAC7AHhLqnC1wAfwcgiwMyAB9SAEdsqE4\r\ngoYDq8x4uwDFJ9OAgi3QAjDUMR84gyOAASEEMTTAAuvqH4j+2BojQIMPYUPawclExBYSYM03CBwP\r\nqMQnIITDuYIPwCkaAAHtuwDjHI0GAJ0peI8WaM4EUNjfRFRQhA9Bas4GuIAWiIHuA6QW8CoXyKPp\r\nAyQaeM6JK0Hzg4iymAN\/nYkLJVac0JG5TIQ+GJpecrw+yAIs+FAcOwNByNG8zNErUQRiLFJrNCbG\r\nytG2uztrlJlb8gM0UBoccaVG0NrGy6UCexjs2jp\/tQj2U7998iY\/24EKmIAwegEYaIEfYMcdAAE1\r\nk6P63ETc5IHig8gW0DEJeEQaoJwtCIEdQFzGTaj1mYIYoAHhVCiHlICkUqjMOBf\/AIEmcAEIGQEg\r\nIANBMCL+tIU2tVW\/aZMqKKABluoBfDu6AiKCH5CcFqiwKuACLsyMMiMXgvKAPcgMJbQnBSyXF9IC\r\nyNVI08jCLXiCJhCNr5q+fGmCsJqMJxAx8RyCIxgCJ\/VVs7w8I1DB2hGgPuBPP9gYPvACLhBG2tWD\r\nGukkGgHGN8BLoYCCpBBSpRiKnLk1LQg8nCk13\/LCpPjLG73VUtNGJYSZIGOuqjgvscAQnPXXFbwd\r\nOmADF\/CACaDECogBoeyAblIjqNyyDtCDEniACgizIZAACfCA1fAAAkBczCkID6iAKUDKENAA\/EA0\r\nC25OHsgjH6CBBniP7EMoQBoBROQBeKrPI7hhGJgBKRD+BPN74IgRAjRY21nk2TYosTN4NY4hmTbo\r\nxn60wSEARy8GQ8U8AwAWij0AQzUOUmNixiFkxi8MBDC0QDXWQi1cY+DFY12y4j4AhKZ4CEDYujsQ\r\ngjJY25NyAxxglPQ1mAszmD7gGchyEZnpLFm1EuayEkHQ31krvE6eNU3u5OcyNf2trPNqilMmE\/M7\r\nMGib4jTxOjoITg1gAgumgQ9Qsw2oAuT6NeL6LeLSxibE5GAW5mEO5l1yLmM+5WR+YkBg5lWeiCCg\r\nYvE1KZsgn6IhEV1mLqjpUU5uvFuzEv1VUVlNvPWqRk0GZU\/WUVNKr6bQFWZeZtgBghDzmouYxUR+\r\nAi3+3gEoOIIzOB492FMvOIMR2gI\/GAI9SAMtyDUj9NZE+C4\/0IKPUwry0cIz+KC3i2goCEOpGlWh\r\nUIou1MZuJIPFzImq+ONmjph43k56LsLp7AAmaAEJoKPbPIEv26cWgALta4EO8IAI6IApqE8agIIF\r\n2IIOiIAmYIIIqMr6BAEKCAHjDIHbLGLQaYE6wqPiC85CTcVC9QDcdKgT8AARGAEckIEZCILyM2ng\r\nuAOUrh3a6YOmKUItgMEzBsB27TTA4wO7gmuKvuvu8YK+Rt890AOAjB783AEdq7Ep6Ovv8mctljvg\r\n9QK87DA7TgQwZN5X20ovrhjreudVhma0ECA0qCP+DThZCQABLdimdoHOgsgTO+yALcBgSvSzGHiB\r\n22QCLqCjKZDHEWgAPKxEx9mBxb3NCzhhrtwnRETZpNoDhNIU5FOfhKq6IHAB63xi0uWVtB5CYGnr\r\n7P2Mhnyqz1iKFqLoDxJQLggELYgBCSqeuBRPgyZP9O1r7AloLaDdClMhA+zCM1bMDLPADPMCxTQN\r\noWCfM6aMGsICMrgQZkZraIvnyxQgN0CDPILKGNiBPYiAgmgBAoyAKxi3H6CBBnQcDUYj06bJ23xo\r\nDGACCUdZxrWXmq7KH2iCIka0iqRKhxwCL9jNRxyBiPSwJsgB+EABIMiCQyhp\/5kI0S0DuBIg4HX+\r\nyBXSU6NWDYercQLNDCiAgi7sICr3Anubz8B+QhXiz3ap8g+i6HYV73y2wDMXUP12KHX5jIHmni5Q\r\nKCAig3a22ZM+8rjag\/twyDyCgh3AAb8wuhdIxTPAOXPxAB5Ig5h6gSxvnh5II2058b7Gp0AASAnf\r\nAROL3MIeAuijt01\/SJ17xEmxlzKol3gZAjSQgRuQ7gOTCDu4gxkwgyNvcDfYlM5oTs5gAqVauU2X\r\n13o5gsA9gjY44pfjAnyT3B\/QFh\/wgbpCV6FIxUjUHaXa0YlUQHrjge9aqCnAARq\/9N19KjSgARkw\r\n8LOOGFjXPIwgwiEIgnoNhH6cgisYMquSKjT++IErSG8LPIISQ0IqmKA9EE8qmAKAp+gOWyFj0m\/E\r\n7sIsRKnPsDt3fWzxBN4VQuyK5sIsMIP+aeZVnoEfk2f1Q4N1B4ELGJVfb2pLJDMBURAXqDK70QBL\r\n1GcxteGQT5sOEG3ICUAJiNwHCIHorCOg1Fgc8IAfeADJXdOj3MRyRahOgRT4AOI5f+eJsIM4uAEz\r\nCN+LgCsu7AJ\/94zvgp8p6ALv0gJD6IJPlKrafgEnkLv95AMO3APReDXaBGw\/yEIvqDCl8IJIPGOA\r\nRqkO6rBip0L3mYxi8ucQCwQ2IAPr2hVXj5g5EF0xSGk2AOsY6AKwBgEJAD+CiD4N6ADTQIH+AqAB\r\nLBgBuqETMqIAKIiAonZZ45SAG46BhorqC0ADhNI++wABbR+dEThT+Ei+C3gCHEABLhUBQZMA5\/UA\r\nC6mDPwCEOpiIOUhrMlBBOoArwL4CLz5j8+mCjNgDQbAJLaRmnQgu2mkD6tkkB8uJIGprvDSEPNZG\r\nvMxVNBjdXN3Tu6OtM7iCuwtQQbCDr1lmBO+KV+d4zQMING3c7HFjkOCfP30SBlooKJCghAz9DCJk\r\n0aJEiYIOGfoT6OPDQIZChvz48RDERIJWjlS58uWhlzIB0QSUsM6dO3buzCBDBg0dNAbRCGQj1M1R\r\ngnsUKtyzkOkfQn6kLnyaUaLJrCZLmvz+E1Hmyo8SaQoCtFJhREA7awLSmbMnGTNu2AzU46UM0itP\r\nrkzBguUKGY4dN4ItdMjiIa9\/YgpC9MeQIUIPXypSJCgRRIiCLBuyTHly4ogaX9r8Y9a0TUA4c865\r\nQaaMGaNDnwxx8eSv3yFTopSZUuRKm71Y9qD5meVKlz5Z3JTps4XolDYD2\/ghSjwKmT9E0QgiTmbP\r\nz0DE+1yhI6gMGq8vM\/ZJbbqszTpqWbMI85MuUjRDkGwYUuVJElFsYIMIQfBwAw1PeJCBC2SMIIMU\r\nN2hggxgwRBGEGzwIgYUEQRQxBRJl3OACEFg8aMUQI\/AwxRBAuDCFCzdIgcUQaIhwhSD+SODghmhf\r\nZVRafKi1pdMcLPhkRhuyuUFHH4LY8cZoZx2S2JRgbVTIH1gWQthGi2WpnkxeaSZTlWBFVYhZZSnG\r\nlml1qCffHzjtFEd9YsRmFBtyzXWQG3\/QsQcdduxhh1Vx+piQRXa4V9pohCT0FSBNpnmWmoppVMhF\r\nWJqVmk0ruWeaHTvdsYJ9ZsSGBht06GmQHXQEetUfdiRkR3cZFWIHRo5CWmlCaL7nKZh79KhlIVia\r\ndgdGayb0KU11yJfTHXKwYAVsecqVlEFvyApoQnTE+q1itRqr6LKMqkcIIMZC2qlZdUSkJZBZ2oEl\r\nuqgt+0dOErmJmk5x1KECtaYKfCeGG0u+saS33nYrkayGjuWoafdG3KlXab7H7kqaRhwxIbjeIfHE\r\n+pbmppxx3AGwGGgMzAbLBbvRh6sLAZrwHvGJBuvHG99LVshoShZvyLDGauxVsqqV0MdthWqHyQCb\r\nofLKLh+UsERLCeLmkhk1DOvWQp9mro+MGi1r18vK+rFObc1Ktqh1BAQAOw==\r\n",
  "author": [
    {
      "name": "W Bohme",
      "firstname": "W",
      "lastname": "Bohme"
    },
    {
      "name": "B Schneider",
      "firstname": "B",
      "lastname": "Schneider"
    }
  ],
  "bhl_pages": [
    44676451,
    44676452,
    44676453,
    44676454,
    44676455,
    44676456,
    44676457,
    44676458,
    44676459,
    44676460,
    44676461,
    44676462,
    44676463,
    44676464,
    44676465,
    44676466,
    44676467,
    44676468,
    44676469,
    44676470,
    44676471,
    44676472,
    44676473
  ],
  "names": [
    {
      "namestring": "Cardioglossa gratiosa",
      "identifiers": {
        "namebankID": 26164
      },
      "pages": [
        44676451,
        44676470,
        44676471
      ]
    },
    {
      "namestring": "Mabuya buettneri",
      "identifiers": {
        "namebankID": 2542084
      },
      "pages": [
        44676451,
        44676464,
        44676465,
        44676470
      ]
    },
    {
      "namestring": "Cardioglossa",
      "identifiers": {
        "namebankID": 2476595
      },
      "pages": [
        44676451,
        44676471
      ]
    },
    {
      "namestring": "Anura",
      "identifiers": {
        "namebankID": 1883780
      },
      "pages": [
        44676451,
        44676451,
        44676472,
        44676472
      ]
    },
    {
      "namestring": "Agama sankaranica",
      "identifiers": {
        "namebankID": 2535909
      },
      "pages": [
        44676451,
        44676463,
        44676471
      ]
    },
    {
      "namestring": "Arthroleptidae",
      "identifiers": {
        "namebankID": 2476895
      },
      "pages": [
        44676451,
        44676458
      ]
    },
    {
      "namestring": "Reptilia",
      "identifiers": {
        "namebankID": 2549792
      },
      "pages": [
        44676451,
        44676472
      ]
    },
    {
      "namestring": "Lycophidion irroratum",
      "identifiers": {
        "namebankID": 2541780
      },
      "pages": [
        44676451,
        44676468,
        44676470,
        44676471
      ]
    },
    {
      "namestring": "Prosymna",
      "identifiers": {
        "namebankID": 212257
      },
      "pages": [
        44676451,
        44676471
      ]
    },
    {
      "namestring": "Hylarana",
      "identifiers": {
        "namebankID": 4200801
      },
      "pages": [
        44676451
      ]
    },
    {
      "namestring": "Holaspis guentheri",
      "identifiers": {
        "namebankID": 2540423
      },
      "pages": [
        44676451,
        44676466,
        44676470,
        44676471
      ]
    },
    {
      "namestring": "Amphibia",
      "identifiers": {
        "namebankID": 2476588
      },
      "pages": [
        44676451
      ]
    },
    {
      "namestring": "Adolfus africanus",
      "identifiers": {
        "namebankID": 2535827
      },
      "pages": [
        44676451,
        44676466,
        44676471
      ]
    },
    {
      "namestring": "Bufo villiersi",
      "identifiers": {
        "namebankID": 26550
      },
      "pages": [
        44676451,
        44676457,
        44676471,
        44676472
      ]
    },
    {
      "namestring": "Daniellia oliveri",
      "identifiers": {
        "namebankID": 2670264
      },
      "pages": [
        44676453
      ]
    },
    {
      "namestring": "Bufonidae",
      "identifiers": {
        "namebankID": 2476897
      },
      "pages": [
        44676457
      ]
    },
    {
      "namestring": "Bufo maculatus",
      "identifiers": {
        "namebankID": 26461
      },
      "pages": [
        44676457,
        44676458
      ]
    },
    {
      "namestring": "Manengouba",
      "identifiers": {
        "namebankID": 4561016
      },
      "pages": [
        44676457
      ]
    },
    {
      "namestring": "Bufo funereus",
      "identifiers": {
        "namebankID": 26407
      },
      "pages": [
        44676457
      ]
    },
    {
      "namestring": "Xenopus laevis",
      "identifiers": {
        "namebankID": 2476402
      },
      "pages": [
        44676457
      ]
    },
    {
      "namestring": "Bufo regularis",
      "identifiers": {
        "namebankID": 26506
      },
      "pages": [
        44676457,
        44676458
      ]
    },
    {
      "namestring": "Bufo",
      "identifiers": {
        "namebankID": 2475484
      },
      "pages": [
        44676457,
        44676458
      ]
    },
    {
      "namestring": "Astylosternus",
      "identifiers": {
        "namebankID": 2476594
      },
      "pages": [
        44676458,
        44676471
      ]
    },
    {
      "namestring": "Werneria mertensiana",
      "identifiers": {
        "namebankID": 26647
      },
      "pages": [
        44676458
      ]
    },
    {
      "namestring": "Astylosternus rheophilus",
      "identifiers": {
        "namebankID": 26156
      },
      "pages": [
        44676458
      ]
    },
    {
      "namestring": "Werneria",
      "identifiers": {
        "namebankID": 2476623
      },
      "pages": [
        44676458,
        44676470,
        44676471
      ]
    },
    {
      "namestring": "Leptopelis nordequatorialis",
      "identifiers": {
        "namebankID": 28014
      },
      "pages": [
        44676461
      ]
    },
    {
      "namestring": "Phrynobatrachus natalensis",
      "identifiers": {
        "namebankID": 30209
      },
      "pages": [
        44676461
      ]
    },
    {
      "namestring": "Phrynobatrachus plicatus",
      "identifiers": {
        "namebankID": 30216
      },
      "pages": [
        44676461
      ]
    },
    {
      "namestring": "Hyperoliidae",
      "identifiers": {
        "namebankID": 31786
      },
      "pages": [
        44676461
      ]
    },
    {
      "namestring": "Leptopelis notatus",
      "identifiers": {
        "namebankID": 2475907
      },
      "pages": [
        44676461
      ]
    },
    {
      "namestring": "Ptychadena maccarthyensis",
      "identifiers": {
        "namebankID": 5800913
      },
      "pages": [
        44676461
      ]
    },
    {
      "namestring": "Dicroglossus",
      "identifiers": {
        "namebankID": 4142259
      },
      "pages": [
        44676461
      ]
    },
    {
      "namestring": "Dicroglossus occipitalis",
      "identifiers": {
        "namebankID": 6414320
      },
      "pages": [
        44676461
      ]
    },
    {
      "namestring": "Phrynobatrachus auritus",
      "identifiers": {
        "namebankID": 30177
      },
      "pages": [
        44676461
      ]
    },
    {
      "namestring": "Ranidae",
      "identifiers": {
        "namebankID": 2476894
      },
      "pages": [
        44676461
      ]
    },
    {
      "namestring": "Phrynobatrachus",
      "identifiers": {
        "namebankID": 2476817
      },
      "pages": [
        44676461,
        44676470
      ]
    },
    {
      "namestring": "Leptopelis anchietae",
      "identifiers": {
        "namebankID": 27983
      },
      "pages": [
        44676461
      ]
    },
    {
      "namestring": "Ptychadena pumilio",
      "identifiers": {
        "namebankID": 30320
      },
      "pages": [
        44676461
      ]
    },
    {
      "namestring": "Hylarana albolabris",
      "identifiers": {
        "namebankID": 5745401
      },
      "pages": [
        44676461,
        44676470,
        44676471
      ]
    },
    {
      "namestring": "Arthroleptis",
      "identifiers": {
        "namebankID": 2476593
      },
      "pages": [
        44676461,
        44676470
      ]
    },
    {
      "namestring": "Ptychadena taenioscelis",
      "identifiers": {
        "namebankID": 30329
      },
      "pages": [
        44676461
      ]
    },
    {
      "namestring": "Leptopelis viridis",
      "identifiers": {
        "namebankID": 28030
      },
      "pages": [
        44676461
      ]
    },
    {
      "namestring": "Agama agama",
      "identifiers": {
        "namebankID": 2535863
      },
      "pages": [
        44676462,
        44676462,
        44676463
      ]
    },
    {
      "namestring": "Hyperolius balfouri",
      "identifiers": {
        "namebankID": 27858
      },
      "pages": [
        44676462
      ]
    },
    {
      "namestring": "Hyperolius nasutus",
      "identifiers": {
        "namebankID": 27913
      },
      "pages": [
        44676462
      ]
    },
    {
      "namestring": "Agama paragama",
      "identifiers": {
        "namebankID": 2535901
      },
      "pages": [
        44676462,
        44676463
      ]
    },
    {
      "namestring": "Agamidae",
      "identifiers": {
        "namebankID": 215808
      },
      "pages": [
        44676462,
        44676472
      ]
    },
    {
      "namestring": "Agama doriae",
      "identifiers": {
        "namebankID": 2535884
      },
      "pages": [
        44676462,
        44676472
      ]
    },
    {
      "namestring": "Hyperolius nitidulus",
      "identifiers": {
        "namebankID": 4803010
      },
      "pages": [
        44676462
      ]
    },
    {
      "namestring": "Kassina senegalensis",
      "identifiers": {
        "namebankID": 27980
      },
      "pages": [
        44676462
      ]
    },
    {
      "namestring": "Hyperolius",
      "identifiers": {
        "namebankID": 2476668
      },
      "pages": [
        44676462,
        44676470
      ]
    },
    {
      "namestring": "Hyperolius riggenbachi",
      "identifiers": {
        "namebankID": 27941
      },
      "pages": [
        44676462,
        44676470
      ]
    },
    {
      "namestring": "Chamaeleo senegalensis",
      "identifiers": {
        "namebankID": 2537564
      },
      "pages": [
        44676463
      ]
    },
    {
      "namestring": "Agama sylvanus",
      "identifiers": {
        "namebankID": 183389
      },
      "pages": [
        44676463
      ]
    },
    {
      "namestring": "Ventralia",
      "identifiers": {
        "namebankID": 4614414
      },
      "pages": [
        44676463
      ]
    },
    {
      "namestring": "Chamaeleonidae",
      "identifiers": {
        "namebankID": 215813
      },
      "pages": [
        44676463,
        44676471
      ]
    },
    {
      "namestring": "Agama",
      "identifiers": {
        "namebankID": 2535908
      },
      "pages": [
        44676463,
        44676470,
        44676472
      ]
    },
    {
      "namestring": "Chamaeleo gracilis",
      "identifiers": {
        "namebankID": 2537557
      },
      "pages": [
        44676463
      ]
    },
    {
      "namestring": "Gekkonidae",
      "identifiers": {
        "namebankID": 215823
      },
      "pages": [
        44676464
      ]
    },
    {
      "namestring": "Mabuya affinis",
      "identifiers": {
        "namebankID": 2542057
      },
      "pages": [
        44676464
      ]
    },
    {
      "namestring": "Thys",
      "identifiers": {
        "namebankID": 6118457
      },
      "pages": [
        44676464
      ]
    },
    {
      "namestring": "Chamaeleo wiedersheimi",
      "identifiers": {
        "namebankID": 2537602
      },
      "pages": [
        44676464
      ]
    },
    {
      "namestring": "Scincidae",
      "identifiers": {
        "namebankID": 215844
      },
      "pages": [
        44676464,
        44676472
      ]
    },
    {
      "namestring": "Chamaeleo laevigatus",
      "identifiers": {
        "namebankID": 2537558
      },
      "pages": [
        44676464
      ]
    },
    {
      "namestring": "Hemidactylus brookii",
      "identifiers": {
        "namebankID": 3403214
      },
      "pages": [
        44676464
      ]
    },
    {
      "namestring": "Chamaeleo montium",
      "identifiers": {
        "namebankID": 2537588
      },
      "pages": [
        44676464
      ]
    },
    {
      "namestring": "Mabuya maculilabris",
      "identifiers": {
        "namebankID": 2542134
      },
      "pages": [
        44676465
      ]
    },
    {
      "namestring": "Lygosoma kilimensis STEJNEGER 1891",
      "identifiers": {
        "namebankID": 11060114
      },
      "pages": [
        44676465
      ]
    },
    {
      "namestring": "Mabuya perroteti",
      "identifiers": {
        "namebankID": 7054332
      },
      "pages": [
        44676465
      ]
    },
    {
      "namestring": "Peracca",
      "identifiers": {
        "namebankID": 4288299
      },
      "pages": [
        44676465
      ]
    },
    {
      "namestring": "Lacertidae",
      "identifiers": {
        "namebankID": 215843
      },
      "pages": [
        44676466
      ]
    },
    {
      "namestring": "Leptosiaphos",
      "identifiers": {
        "namebankID": 211542
      },
      "pages": [
        44676466,
        44676472
      ]
    },
    {
      "namestring": "Panaspis vigintiserierum",
      "identifiers": {
        "namebankID": 2543296
      },
      "pages": [
        44676466
      ]
    },
    {
      "namestring": "Prosymna ambigua",
      "identifiers": {
        "namebankID": 2544015
      },
      "pages": [
        44676468,
        44676471
      ]
    },
    {
      "namestring": "Prosymna meleagris",
      "identifiers": {
        "namebankID": 2544022
      },
      "pages": [
        44676468
      ]
    },
    {
      "namestring": "Lycophidion",
      "identifiers": {
        "namebankID": 211641
      },
      "pages": [
        44676468,
        44676472
      ]
    },
    {
      "namestring": "Aparallactus lunulatus",
      "identifiers": {
        "namebankID": 2536556
      },
      "pages": [
        44676469
      ]
    },
    {
      "namestring": "Philothamnus heterodermus",
      "identifiers": {
        "namebankID": 2546676
      },
      "pages": [
        44676469
      ]
    },
    {
      "namestring": "Viperidae",
      "identifiers": {
        "namebankID": 2549785
      },
      "pages": [
        44676469
      ]
    },
    {
      "namestring": "Causus maculatus",
      "identifiers": {
        "namebankID": 2537432
      },
      "pages": [
        44676469
      ]
    },
    {
      "namestring": "Crotaphopeltis hotamboeia",
      "identifiers": {
        "namebankID": 2546621
      },
      "pages": [
        44676469
      ]
    },
    {
      "namestring": "Philothamnus irregularis",
      "identifiers": {
        "namebankID": 2546677
      },
      "pages": [
        44676469
      ]
    },
    {
      "namestring": "Crotaphopeltis hippocrepis",
      "identifiers": {
        "namebankID": 2538311
      },
      "pages": [
        44676469
      ]
    },
    {
      "namestring": "Philothamnus angolensis",
      "identifiers": {
        "namebankID": 2543532
      },
      "pages": [
        44676469
      ]
    },
    {
      "namestring": "Meizodon coronatus",
      "identifiers": {
        "namebankID": 2542351
      },
      "pages": [
        44676469
      ]
    },
    {
      "namestring": "Lamprophis",
      "identifiers": {
        "namebankID": 211468
      },
      "pages": [
        44676470
      ]
    },
    {
      "namestring": "Leptopelis",
      "identifiers": {
        "namebankID": 2476670
      },
      "pages": [
        44676470
      ]
    },
    {
      "namestring": "Xenopus",
      "identifiers": {
        "namebankID": 239147
      },
      "pages": [
        44676470,
        44676472
      ]
    },
    {
      "namestring": "Prosymna ambigua bocagii",
      "identifiers": {
        "namebankID": 2546775
      },
      "pages": [
        44676470
      ]
    },
    {
      "namestring": "Hemidactylus",
      "identifiers": {
        "namebankID": 2540305
      },
      "pages": [
        44676470
      ]
    },
    {
      "namestring": "Astylosterninae",
      "identifiers": {
        "namebankID": 6678708
      },
      "pages": [
        44676471
      ]
    },
    {
      "namestring": "Mabuya",
      "identifiers": {
        "namebankID": 2546967
      },
      "pages": [
        44676471,
        44676472
      ]
    },
    {
      "namestring": "Panaspis",
      "identifiers": {
        "namebankID": 212029
      },
      "pages": [
        44676471,
        44676472
      ]
    },
    {
      "namestring": "Chamaeleo quadricornis",
      "identifiers": {
        "namebankID": 2537592
      },
      "pages": [
        44676471
      ]
    },
    {
      "namestring": "Colubridae",
      "identifiers": {
        "namebankID": 2549754
      },
      "pages": [
        44676471,
        44676472
      ]
    },
    {
      "namestring": "Sauria",
      "identifiers": {
        "namebankID": 215868
      },
      "pages": [
        44676471,
        44676472
      ]
    },
    {
      "namestring": "Philothamnus",
      "identifiers": {
        "namebankID": 212119
      },
      "pages": [
        44676472
      ]
    },
    {
      "namestring": "Paussinae",
      "identifiers": {
        "namebankID": 2946239
      },
      "pages": [
        44676472
      ]
    },
    {
      "namestring": "Crotaphopeltis",
      "identifiers": {
        "namebankID": 210630
      },
      "pages": [
        44676472
      ]
    },
    {
      "namestring": "Salamandra",
      "identifiers": {
        "namebankID": 2476855
      },
      "pages": [
        44676472
      ]
    },
    {
      "namestring": "Serpentes",
      "identifiers": {
        "namebankID": 2549786
      },
      "pages": [
        44676472
      ]
    },
    {
      "namestring": "Xenopus amieti",
      "identifiers": {
        "namebankID": 29869
      },
      "pages": [
        44676472
      ]
    },
    {
      "namestring": "Agama benueensis",
      "identifiers": {
        "namebankID": 183230
      },
      "pages": [
        44676472
      ]
    },
    {
      "namestring": "Dipsas hippocrepis",
      "identifiers": {
        "namebankID": 190793
      },
      "pages": [
        44676472
      ]
    },
    {
      "namestring": "Carabidae",
      "identifiers": {
        "namebankID": 2607465
      },
      "pages": [
        44676472
      ]
    },
    {
      "namestring": "Lacertilia",
      "identifiers": {
        "namebankID": 655694
      },
      "pages": [
        44676472
      ]
    },
    {
      "namestring": "Pipidae",
      "identifiers": {
        "namebankID": 31778
      },
      "pages": [
        44676472
      ]
    }
  ],
  "status": 200
}';

$json = '
{
  "_id": "4d3c2501b81ebb14040dab236adfc1ab",
  "_rev": "3-90dac7f43f63cc776b3f7189da668a21",
  "type": "article",
  "provenance": {
    "mysql": {
      "id": "450068",
      "modified": "2015-04-30 09:39:44"
    }
  },
  "citation_string": "M Pickergill (1984) Three new Afrixalus (Anura: Hyperoliidae) from south-eastern Africa. Durban Museum Novitates, 13(17): 203--220",
  "title": "Three new Afrixalus (Anura: Hyperoliidae) from south-eastern Africa",
  "journal": {
    "name": "Durban Museum Novitates",
    "volume": "13",
    "issue": "17",
    "pages": "203--220",
    "identifier": [
      {
        "id": "0012-723X",
        "type": "issn"
      }
    ]
  },
  "year": "1984",
  "link": [
    {
      "url": "http:\/\/content.ajarchive.org\/cgi-bin\/showfile.exe?CISOROOT=\/0012723X&CISOPTR=2236",
      "anchor": "PDF"
    }
  ],
  "file": {
    "sha1": "cd9976db2e15a119033ac58b19c15f91db5d8931",
    "url": "http:\/\/content.ajarchive.org\/cgi-bin\/showfile.exe?CISOROOT=\/0012723X&CISOPTR=2236"
  },
  "thumbnail": "data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAACmCAMAAAAbHNrZAAAABGdBTUEAALGPC\/xhBQAAAAFzUkdC\r\nAK7OHOkAAAAgY0hSTQAAeiYAAICEAAD6AAAAgOgAAHUwAADqYAAAOpgAABdwnLpRPAAAAoJQTFRF\r\n\/\/\/\/\/v7+7Ozs9\/f3\/f39\/Pz8kpKSzs7OY2Njubm509PT8\/PzXFxc6enpycnJ6Ojo+vr69vb29fX1\r\n+Pj47e3t8fHx+\/v7+fn5u7u7m5ub5OTk8PDwpKSks7OzqampZmdmqKiomJiYurq6qqqqvr6+ysrK\r\ntra2dnZ24eHhtbW1bGxsxcXFwMDA5ubmgoKC5eXlfX1919fXiIiIrKyswcHByMjInZ2d4ODg0NDQ\r\nxMTEzc3NuLi4t7e3v7+\/sLCw7u7ux8fHbm5usbGxsrKyra2tnp6evLy81tbWV1dXwsLCc3Nza2tr\r\n39\/flJSUe3t7ioqKy8vLeXl5dXV129vbj4+PsLGww8PDlZWVmpqa4uLi2NjY2tra0dHRz8\/P6urq\r\nvb29zMzM2dnZhISEdHR0rq6uo6OjoaGhUFBQR0dHpqamXl5eTExMJycnaWlpnJyc7+\/v0tLS3t7e\r\ngICATk5OWlpacXFxS0tLYmJiNDQ0BAQE8vLyREREh4eHr6+vl5eXp6enFBQU9PT04+PjjIyMb29v\r\noKCgUVFRNTU1YWFhhYWFq6urWVlZfn5+xsbGZmZmSkpKX19fuLm4k5OTRkZG1NTUd3d3YGBgLCws\r\n5+fnEhISn5+fgYGBbW1t3NzcQkJCenp6ODg4jo6O6+vrT09PVlZWlpaWaGhoJiYmeHh4ampqVFRU\r\nMzMz1dXVf39\/SUlJRUVFZWVlhoaGXV1dVVVVPT09QEBAPj4+U1NTpaWlUlJScnJykZGRJCQkg4OD\r\nZ2dnWFhYPz8\/3d3d7eztoqKiiYmJfHx8ZGRki4uLtLS0\/\/7\/cHBwkJCQSEhImZmZW1tbPDw8TU1N\r\njY2N+Pn4vb690tPS\/P38ScqBIQAAAAFiS0dEAIgFHUgAAAAJcEhZcwAALEsAACxLAaU9lqkAABvK\r\nSURBVHja7XsLeyLZlditoqqxxCCKVxUCQRACDAaaQRLi\/TASYLXRNDN0kEDiNYO0I48tYDOzm7At\r\ntNAjx0OGidPBu6zaxNtk5YwneLPt7G5YK7MborFb2Y42qzz+T6p4SCW1pkXH7i\/5vvh8COpW3brn\r\n3nPP+x4B8Bv4DfwGfgP\/vwL0f3sCvzaAGa8YAYSg4BYTIMio\/Yff0NW70IvJ\/pUxgI4+q4srCCBQ\r\n\/\/dSB+i5N+BxwHptDLAnRtt9Bgfj8vhcAeAJSQw4wkcByoAIFpeBCMknOMHHEegKVRAgmhRLpqSI\r\n7B+IR2AyFMinFTNKlfqrGu3XhDq94bbOCCSvm2bn5s2KBcttq8hmdzhdbkBDAwGPckHnvf1134xi\r\nccp18zpQsKSS+QNB1zdUy19Zdt8RL3wzBPCVN+5qRUzLrOqNsG9Jz3zzLT99vhCI3PuH0QDzjnT1\r\n7ura3Zt5DAHj+gjLEYvrIuP6dYt5I5JIAu5GQp8UaYypdZtdI9uw6NTpyyvJvP3OrfXs5tZv3RG9\r\nrh1x46HztwcN6JzjrnDGoGm88+722Fveb7337e\/sLI8i+eSmspxuRxiFSNK9lQMoxcwk\/wvypBQg\r\nEER9UOQyksLKb28ELal\/tPH+B\/fetIKbhQUCxJu\/87v\/+J+IAVDOvZYhOYxcB4nZ\/E4PH8XTQ+Y6\r\nX6B0eUpWBPDK771zf\/ftuRGQoKC0B4Dr9xWg6O4tjEYqYjA+VqYGQs6nNaGtPFj4cP+7\/\/R7H81V\r\nhSPQCwHeFDCY\/9nHoGYHSFkAGBELkPBBsgyybwGIlfEg4JN9wCeZiHzQGw9Cpypf+edvvhv+vsr1\r\nL7J86GYkJP0RoBI\/\/JdgVwjqpam46LUfgD\/waf6wkf+jd8cbB4\/ugB\/+0aOY\/rdtG0v3BitpPlL\/\r\nq9nUGzs\/+s4bTmVyJJ1PksQJzN82BAD+x4UHj7WmFlhJbL0HpO8B4l9nSA31J37wsf+Q+y1bj2IQ\r\nME3\/+A3Zd\/\/NpwL7Tz6Y++ht383b3vr4MbBEAf8PF0JA\/hn4t22HAiB68Mkc+P4u+Onj\/J8C078D\r\nG39sL4Pbf9ZTiBD4+A\/u\/Fn9yRs\/U7cDptV\/\/96dm9QkBJRLbwK1AIDP\/hwCX3M4\/gK8xgH2uOb3\r\nGpG\/tMB\/wf0Pr4MfvAU+7AAhyP0Oj6IMAuR\/lf3dn7uWtJtHuz\/7BvP9WzexFwK0JpAKAxxo\/yMG\r\nHm9\/Yx1893OdF9x6H3z+VyDw55Z3s+CvneDrDzKFn8Y7g5fKbFD58E9+dHDw4d\/8sAC4xM3k4iod\r\n6z3L8Z8WgMSpIQ3eQReAHAu0+IAX5kl6RoUVR6DaOEGbG15L40jbjIwgJGBonci+mW97AfjP8MB8\r\nURIJ9e0WyX1983UuKBfWDIJG8yeQvvghIP\/JXuz9GsBwqK9MKH1CfVNNsg+KUnh7yCklgKII9fwC\r\nQK\/vTcgAvrzYvs4IA3C9\/wM91\/dGPwmKaYrCFodlZJcjmq4wWfFoxCx2MdeCGxo2G4aMHCNuNGqS\r\nGKdigGIcjkXM8hDllqbMasTgZldAtNbF7CT3+rGRPgDWvdsPj2c7ikdfGKtHX7OrZxc\/\/by0slR9\r\nx7Hzg6r8Fxatdqfy4PZ+KfjTr04b\/KsL7\/xodXbs7jd\/6bA\/WJXtTsoDT4\/eOQrsv5gTkHKZxy2y\r\ncIkQIfhljM\/ncXksPp8h4TM8fEIiITAWyidNP4TzeUUGwWDwqMdFhhAvc7kEQfCFWLnIL1\/LW7F8\r\nsE2CdSKcSDDtiUTaat8wmTKmOAmZjMlktTITG0y7lckMZoJxkykfZpIdmXbqO2FnWsm7mUy8HQy2\r\nrWlrIjx+7UI8LSPMNrQMsVAhJq5YIs1IRMxpNDjkH\/XNCTW7XfLTbYY41E2OpUtBSKPpWjQhSyhk\r\ngJNsYyPXygk0oW5MzL52JVGRXg7gXeUSbHFMuFV1dph9I+sjpH1Tp9VanVgvLmTlKpFCufR097iQ\r\nkx\/5ytchYRciIjGWDrsiFWt0MW+Ex4s3IoFA3JyIqJbtraDRGFXW6+b0\/JxLUWFNnKS513WPLNvM\r\n8\/pazau0BU2ZCZ3Oq5t30WA5OoBlqqVXTmwkrBthczhsVqkmahPeqNesi5rj8aaJ6bWFmRvX7gkr\r\nCbdgQQtuCQQeT8NIgiEpoAHH0OiBgdNve3IkwFQ36s9gIN+EYZh6QjaM4sbNuqz8qgKbC+3zXygd\r\nhUA3wOV3Lm7SHt+0o68QKJ1KfiitSl5QSgacq+KeFqZULHWfVL2UukWo7iilpBHqPvqcAzgiEa+G\r\nRUNCPEcRiP70BUC4\/TLnsTrg2NpoOL0nKacTRisJ83J8PcExmAzx2AbDaGr6JsbsU0xLDDQDDqdN\r\nqg3olEZRmKlR69Wt5vhMHX8xsYB\/9m\/vfPKzT2dfC1Q+u\/O3snffB96STHp\/M\/qs+WApLDLvGEW\/\r\ndfS9v\/7Y8acfvPFLg+u1p59Mvv\/jH37+X984\/Tv\/9re+\/sv73\/\/5T9SRFypgCHQT4ZotrHCd1Fvd\r\noLcZiiGNdgM2mRpNUnfFNIYCS2o74RQm2jW9OVspiDaYeV1EJhpzjaXmFrO7c2H9QWA3NjrfMNJt\r\nHWytrzcsDEtyXKyxbiRCRkHYwG2EYhq2xVJolCGhOJFuaAxNBl1RSW50v3p2i2IZYPzs8L+99ejO\r\n3\/2Ne\/zvP3j499mF+\/ffXzv98dg3P\/7io+kPH\/zlk3fNhs9mP3nvOx9+z\/7RW4BAenxGsd1LMFVS\r\nXj9O7TqUC\/Xk2p5PK9VkXTtS39HW7IFrV\/fwcLqaihfuPtHtH9z1i46PLgVgLwO0kBvp+yekH0+1\r\noJ5vNAjFSMnAXmrYS9CXOlLAwFDJIIBfy1T615ST1HtAxd0jJyRuWlVfIc0fewEyom56WSB6dCL\/\r\nMGG5T8aX2N8RCQd8ZmmutR5JAtGh2BoWFoy5iDw9mvt7LV1ISvf1Up8k\/Ybo1uS9BdnqWTl7Mi27\r\nvbS29nnnqb7v2A6d4P4rYCTuwpGBkoMGurE3TpkhKfIYHgnKI3hCFoPPcnX5GG1E6ALNCBoyMLOB\r\nOwhJUgCY2jR3pgkFGEUWBPLHGN+KMAgwIdAF5VMC7VyiUAdiRwi0TGizKCSFN6ACIKQBKCNy01rQ\r\nvS\/08EfyxUcL+YnTs2dH1saTpTWHB6T8p89Kn864+Xv51c6tTw2Hb6qlZ0XwwLc58+RwZel0tg1O\r\n5cePbx0fLxxKb0KC5wR8LmyBPS0Jy9MtsLmsZEMo6QpyxWbGEodNoELqygIbY3Pi8LoOdCtBYz0c\r\nWW8X0sXKRtdf7W6YmKHR9v4KI1wQHX\/+AR0QbGTmOvcOkPNG3wb3eKlnikHfHvd+BnkX0AuQKBXx\r\n\/3wGtxfLXTgVrwrJ+cUr8\/yAyajXr6\/bFQVDvRBPR14NGv\/S7KOs1\/Z61vxVbdG3\/kr8Px4n0rbk\r\njOImafQLcIP1qgj2\/NVzfXrM8eJhLrH41XC8P8BAKiDkOmEk73IZN9NxIFRIL+EI9Sxrn2v7RhZB\r\nBumGHo6e5CG9ZNxQXHutvrx+CTSCIfQ8g9y\/wgVXJsbCAEKlXTg4T9h\/0tP4OINB4IA7COFQ4suW\r\ng4CQw38i5QVP1BNLynzZJ9JHldJ9W9Q2l4w55+1exoTCbPOfhOfPMoSow9p361VRZVi3HFWFgSib\r\nnTcn1LY2a0KnNjOduu71aCDQCqcX5QL11v72gTNPyKsnyrGZeZk2OhePTPpqHUi7V513b8v2quby\r\nZqAhV\/t\/OnXsntvevS3nq6uusbnJxU6VsVfaVNo6ei12HQ5uxdC\/gHHQ6s0CpxAXUYjAcACR7\/Dw\r\noYllUMad9Co4MOVPYHABoBGKulRowrNQ6aVrQwgICGYWvIloVJJPMIM5i5WZX5+wR3IuBWv7pGYN\r\nxRUWgTvZbWjy7Xhc6E53w1ZJvS3WbEfKOlfhpMCu7HWbpmitGbKyzpwbFtM677qVEGrzpmhmBq4+\r\nVD6Mu24fzrm29rX1Unh9VT22NXm6dWYaU38hPfXLJneS8uzC4WZmdm1lf81nf9u7fHy\/bps6O144\r\nmFxb9LemZdXNvUUaEoJ37tb0SNDzDcjvOrdnGFCSZRoeQKAYTkA4FyNwiIAwHEVwkk4IgeI4jjBw\r\nBMchnocHkS0cI+9wCfRSTIdwhxvEE5Cb0ra2PLnYotiTbwNhshjUsLTJWFNY5sQj5YymnOMoK2IJ\r\nJpFkxlOgCI9VBAKMjOclZaOgUixHVDjbIxCuG4W4RGKgGVE0hw+W4T1aU8PHh\/JSSr09vb0dBZNH\r\nDxcM9k5p72Fh\/FZ14chf2i\/dK02vfL7cftpZfTZue7zzxapCeLyz6\/jo0dH+25OTUcWTW2vK07Oq\r\naXb\/lHvBw0hxGLHweXwuEJa5ZQZfyOKWjYQHlsAoUeaVhSjBKyY9HoGnlRR6nBoh6mEJPHyWROgR\r\nlFGJwCPxOmFDReBhcZUeloftyRUrkiKNXqjgvLGsgfgkWdFG\/ib382WNFppEB+SyPzt6ZlNvPlnY\r\nlA6OToa+KnQ18XCeS734uT5fMQCcMZw1S2xpsjOWTCxWwV9uojcCD\/71hC8vBKQ13PiBp3V93vhm\r\nkrwIiOTop7YDfNdc3QA4exQkiIEjiMWMDJidTOYkObFRrMkZ2cniiGh4nFF2mVudXlIv3yvpl79w\r\nPTEdpgtZ52xX9lQ94mIIATZCL\/7YuEpV91WjCXlUmzDXhKK2LKizekeM5y5Y+MX0Ig08SsbrGOm3\r\nMyCMSjvwR89rYZKRuvUlchDL00LJ0eCChYejDSUZoUs2GIyNXDAvTfzP3xqe6FyZQJlNWzTBQ3u+\r\nU\/98j57n65cZYP2DHMreIPS5XVoRAp5jboy+kvCMr5jjqn152FhmiKxmjQAWSFAYZueMMRjHJuKQ\r\nbiIDY7CXC9LjUJFBWpIGN9\/kF3P85jgKC4SUFm+zuXwJr\/AQvkDFuxBGBFRcM3f1YPvguPM0xLl3\r\nuH+w638sszw8OFvynU1HFHcF9Qe7+zNrDw5XQjpnZ3W61Dl+OG5\/eDRTshVulR4eyyUL05u3nrQ9\r\ntw5kHxgukLCStKXxWQwhFzDISF2ClXOVnEQg5BFgPUgUWQYPIWkQjKCF7xFXhElcWOF4LBIuS4gx\r\nkmTUysXZsEQiAZn5Vi7Jw3NCYQujkYt9LowMPghmALsNmGZyVShOhZn1mi2RYQGPV7scEgOGtZZK\r\nLRN8dwEwcAz97+llhd3FxaJ4UyKgNpxtDoz9jxDoupRhW4K2MfyB0SLdxyfqyXtnC6cu6GQxUFI8\r\n83dKIrAo+\/i2swI0x49LMjsoyu7\/pFQKSe7eqm4\/K3nB0tFrZ7Mq5PWVrePDR7sdqJ795tNjKZiX\r\nf\/Bzp42GROIZXrMyrWalGerCEHN8OW9VFeJ5CzBQB2ThIkPc1RjyFqgQicWX84xII2ZpWjyI0aAJ\r\nBTeQvK4bdCXWEwAWG7ttM4NtiWUKVtrhC8IYRghwPJhZHycAusHup+V6SbMy6ShCg+NkykXi9uXA\r\n2JNhiQGc52wYMMzj9saKca+y8IX53Zh5cmd\/rw74Hx0lgDfV2TmunkzuHsj3DjzElk+aPZk6cc5U\r\nt+LAdSCqHj7cnAfLR4XG3MnJgkw7ZQOJsy31scots4EDtzzbWWrT9FqRgwxWkmtUCnnrOoLGvBkQ\r\n6oY3rFt5ZSzPzNuFUDrRnlDNe5n2msIAzFHVfHjZmgd5RzGp07nGognSrS8oT0K6ddt8HkyEJ6w6\r\nXYpP467iJTXHRYGABXrJObzV7yYgNSIt1cviAZawSM3K0nhe0\/d8dH4RQJcSewgLHazE4tsdk\/tS\r\n6ezxvHtPAxiLO24m4C7aTvW+VHRVMR\/VAcg8P79vAgLn2pher\/AbQE7p0E0ERK6aFwBmwKFOp7Q6\r\ncqRVl76mptXjMNjEYE+su3uKsE8VWJzzrWc1gLDNb2YAN+AM1xT6VNXpyyoAspudmyE3264MzC\/5\r\n8hDwyDb1zoNdqbZDAPPjaiAsjS42gSDVGVMqacLIYw25i12gVo9TARkkJF3swUp5fCo4owgLelm9\r\noS4tk1HIOTnIKxQX91gNJ6\/5DPySbucKhtw1\/nh5YsMbOFxWeqU6IHdwgkaTK9D1nnK0xzpzqukK\r\np5s1R1ilCsIJe8ItjacmwnVPdDzM5KQ7aUsztWcOe2vKqJ3dPU749PQTQAQe7klT1tmrdmYOFCdz\r\ne3pW7dScjS7Ls065POLYm1ZX68yFFdnGwr67Ojee9W\/55rYXOmsnwc5SVW2IZh\/Hlfsru1m3U7ag\r\ntY9NZ3anpmjkortEPatDMQhJK4jXNysUk2B9wewXDyAoRJ3yAwnRq\/shhRftcxKjp+wo0vXS3XSm\r\nxZJDOeFY1025smlc17bUx5vd\/TEPFmRGNE1r275hCi\/nrJbQeHO9zbXMO9mWkH2HZ2zXg5Z2nQMq\r\nlkIzWHF5+U2nplJfNHTj3eB6hiYnaGu4J4WZzhzTWHLvHm\/Orz0u7W3riBm\/1nn3ibxza6dT0+2s\r\n7D9e3F1LQ\/uyw6kvDqIge\/vR5vzkXofvmDzzr8z6\/M3m\/vSse\/LB3NFxaXqzdSFFKDwkF8oglwlT\r\npgYBJi4K8VhkcIeBFlV4hTIIokydtGN8FHAxlAzrEIAxyYAOw0gVS95HCczDAAifiyYlEIbiGB+i\r\nkwsbkIu3t9AqrtthQbGRs7QwIaNrZVV4nBaXlSsSnno4k\/yfFeC1IhogbEi4vKKw6BFIuLCYUYTE\r\nNVAsY2jdTJCRFIvh4XhyOXoWCZIIB0gqS\/cPTlfvViefHW26NL7DzlnafTS1unBUKq3E445n2Rmm\r\nDVMeJXfMG2vHeq97a2u1lC1l\/f674wr\/1l2VSnZWki9si0\/3pzuH2akzmo1Hi0NhZIn5PF6uzMP0\r\nGUQsYbWEcNGq8eYRgUSYhGKhJNsjKWC8FsOQw3kcIySEhcKcxJMTwC1eMVcxsiTJZLEsLnrMrJbE\r\nIym3aOU4CDyUW9IDYsUBgSdyCIEgJFlRUGhSWpDLhogglWzgswGvRbEwSeJKAfDtLMpFQvAkDgEN\r\njzQ6XQv5PsnXZKB9yb1Ek0Pzu\/x4bToF1PdO73WqIHI0ub\/lO3p75ql\/avqx99kUiGYPnXunmzud\r\ne0Gw8IwfuVddO9sGY2v+nfmF\/SqITu8cSNp3j6akcqA7yB5s6WgSj8NDOWmYNIUWEBcqJksLsCzN\r\nTMPdXC9ExPNbJqNdAwTdDaNmI9Ku55Og2eTzY+JIRQPYm3kLJyOuQJKNuhgjNBVjrAtxKmxOiEFX\r\n9TmaKuORnjTlUpR7fGxJwr0EFqPvpRaM3DxgsUKUk8khTW+TZPQyINVnvhtPGNgkryvC7d6U0QZS\r\nIeipFca5+WXO+GX77pPtKYe\/yKwuH2QnFyfDzS2z\/dDn0jqq4u2D3UO5dGFOtLiXUO\/mx38kPfXt\r\nr2ZtBoXvoz3ZNlhaPVJsVblBuWNuznVfW6VxF7c4JJfFPu8KM8f0Ont4w+Sa0GtT3po3KRqP2+zj\r\ndabeYHO1bYF5m3M5UDWtp9JFnzMd2HQozBpzKME0LAmt45Fxk81r8gW0caZbq6BV4OGXCj8YvQ8Y\r\nMBxv6C5ByV5XSw5nDCINdEhkMmYhJKSaIo0LH6cI3vshQUjbhqEWhgBT6RJVtUtLiqWINby4WFNP\r\nzG1x1AZ3YD6r3lKfmAzyk23X0oLSljoJBxWLSq0jHOhoo1KR69g7Hg2r1FJRReTarXmlAYtuLDrp\r\noTncg5iR5K601Dw2Z9OOKdpMpnRRP2\/raNuLFpda7XLanCmjZTuj9ykD8mh6zhyfU+t1gYTz7TnX\r\n3K5ijGkeV0wtjjkaU6UTr24mlc8uZU\/oRosWOvD799Hng+fzg7fzVv+iUR6UHaCsGGVsJBdu46W0\r\nR2u48YWNmixsr+lMqvl1gF4cYgzOM8CwVG1YsHZxdnNe4wHo1RQ0JEO1goDEtlS99tTvrsmmljAw\r\nGlwq+gZfmj5CuBduMTm9NgL1CjdGQvG\/Rk30oK1zMwkNatBHzmYgo2ZM0MvR7wsQnNcgQs\/X3t80\r\nm+SIIT+EkmxHMCi7i\/Y+L4EFz43YuegORJ2ZzqZSWg0GvV6L1Dg6GmKkLBEJ2NaDpR27I+su3XWN\r\nTS5Et3SjH5Tjo+a7UInAwBKwBBW2QEz6GkbBjdWutAkKRuXDKxv\/MsClGy3o\/OvSkS9EP6tFkMvp\r\nwasHVPQxzldy+XDgXDfQkrV9LMMj334M1SvMwnBKavtYh9qmV6qFXJFngpZNhYJl8rkH6+WbJMZe\r\nnqhSBniX3yXjN6IXuYBihYpfqJcK1K5ALdpgPBJ9koqWWZf3AKFtPLJzfHywfLK1tDvTMedv1Xz7\r\nusi9rTHxUeqwo1aL9hS7IbNNtiKtqasOt6wrP3HOz1icVZ9D0awtRyeUjsWTRcVqMpbQL\/nMKYxG\r\nrtZwJQiEhabcEyazd0Kkc6hi8+spfa3hXVYJFbqUwyZVqqtvxbx67ZzIa1csO6t506IvLWXnZYF5\r\nx4RevzUzpqxmO6nFZl0ukvmWD2jRPKN1sUlClDKdQ9ZEuD1TjKDlngdCnQV6sP5BE4IhvTM5rDdb\r\nlKZiqXwjRSrsUqKVxxmQC2Lq\/YsqnUqlPclEUhPqCbU2s7AcNKpTHaVNmY9GrTZmPCEeq23kE7te\r\nt12bTjfD0sq4Kb5h28ibKp6YNaLN2zUF1XbExEz5CzSuRYZZIsjhds5oo\/pqdTbOlGVPZZ20yneY\r\nz5+KZFNTJ\/Pau9KpqYVVpX7z4GBmsbl2uLhZ3Rrf3Z86FllufTGznVXu3Hbv50vqgP9Z9nhqemqM\r\nxscsz3nRN9J3QiDKEUbA4N9BKF3Yy2kiZMxBuX4oQh3WEeQPxbUYlWBlkB4LhvEwnA+RgQsfI1vc\r\nYo6GBOEPhS6y1GUL641C0AqHmGK2RcAdh9FaisNrWDQGzhU5H1SJX7X+VwTznLuSxODeyfbtNHt1\r\ncmXpdKa0OrX5+EB478AjW3tajK5ur7pebMueK+65kk09JxdGEBjK53MJLoMrKfNYZbRYhPhcHo5y\r\ny8UiAeiFouBSEdAAzfAAEwLQFSS8iwQO1Q+jqu2Ivlt0UYTSVyhDcRrMGrnQUyh+rrGuXS9+7tyx\r\n3axGrR2oKmY0c9ICue+bQYGHxTYm+WBxzCDstoosXFUGM4vAqCInp50XgxoDLVIJoPVjMRcjF13G\r\nYTsAE1YMRVUhGj7UM3RT4yvyzcO0ZW\/7F5mZg7oqgdyemnOfvn0oQ4H58HRvu\/R0obTFA\/69W9Vf\r\nRAB\/74s17c\/nsjuPRQCwZxxnK6V7voVbh2MIMN\/fOd3amqZr93N7wmUJ+UIGg2DBHJRL9sCFlXLR\r\n5GLxAFQuJ4XJZNJQgSGoJdR4jHUEEXrgQszQFRcSMOBzWt31UEViCYa6AsBqGEMamEN3uC\/M75CX\r\nh\/9AUTAaeHz0uX\/Te0GBxJc94NGQQPRcPgSO7x46q86TIbdcOgeg1xsBcO6tIrQnNCTIl9p4rtHM\r\nbGiMcT74lQH3QL\/6IDfBhT15nsTIr6swCU+Wf\/VBbgLGS58z\/h+AkPPqj2X\/N9dpTdlj6M6EAAAA\r\nJXRFWHRkYXRlOmNyZWF0ZQAyMDE1LTA0LTMwVDA4OjQ1OjU1KzAxOjAwJZXTZAAAACV0RVh0ZGF0\r\nZTptb2RpZnkAMjAxNS0wNC0zMFQwODo0NTo1NSswMTowMFTIa9gAAAAddEVYdFNvZnR3YXJlAEdQ\r\nTCBHaG9zdHNjcmlwdCA5LjA2aqYMNQAAAABJRU5ErkJggg==\r\n",
  "author": [
    {
      "firstname": "M",
      "lastname": "Pickergill",
      "name": "M Pickergill"
    }
  ],
  "status": 200,
  "names": [
    {
      "namestring": "Afrixalus",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-1",
        "cd9976db2e15a119033ac58b19c15f91db5d8931-2",
        "cd9976db2e15a119033ac58b19c15f91db5d8931-6",
        "cd9976db2e15a119033ac58b19c15f91db5d8931-10",
        "cd9976db2e15a119033ac58b19c15f91db5d8931-14",
        "cd9976db2e15a119033ac58b19c15f91db5d8931-17",
        "cd9976db2e15a119033ac58b19c15f91db5d8931-18"
      ]
    },
    {
      "namestring": "Anura",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-1"
      ]
    },
    {
      "namestring": "Hyperoliidae",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-1",
        "cd9976db2e15a119033ac58b19c15f91db5d8931-17"
      ]
    },
    {
      "namestring": "Skukuza",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-1",
        "cd9976db2e15a119033ac58b19c15f91db5d8931-5",
        "cd9976db2e15a119033ac58b19c15f91db5d8931-17"
      ]
    },
    {
      "namestring": "Brachycnemis",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-2"
      ]
    },
    {
      "namestring": "Afrixalus aureus",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-5",
        "cd9976db2e15a119033ac58b19c15f91db5d8931-6"
      ]
    },
    {
      "namestring": "Chiromantis xerampelina",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-6"
      ]
    },
    {
      "namestring": "Phrynomerus bifasciatus",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-6"
      ]
    },
    {
      "namestring": "Leptopelis",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-6",
        "cd9976db2e15a119033ac58b19c15f91db5d8931-13"
      ]
    },
    {
      "namestring": "Xenopus laevis",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-6"
      ]
    },
    {
      "namestring": "Phrynobatrachus natalensis",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-6",
        "cd9976db2e15a119033ac58b19c15f91db5d8931-13"
      ]
    },
    {
      "namestring": "Phrynobatrachus mababiensis",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-6",
        "cd9976db2e15a119033ac58b19c15f91db5d8931-13"
      ]
    },
    {
      "namestring": "Cacostemum boettgeri",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-6"
      ]
    },
    {
      "namestring": "Tomopterna natalensis",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-6",
        "cd9976db2e15a119033ac58b19c15f91db5d8931-13"
      ]
    },
    {
      "namestring": "Ptychadena anchietae",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-6"
      ]
    },
    {
      "namestring": "Ptychadena oxyrhynchus",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-6",
        "cd9976db2e15a119033ac58b19c15f91db5d8931-13"
      ]
    },
    {
      "namestring": "Kassina senegalensis",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-6"
      ]
    },
    {
      "namestring": "Hyperolius marmoratus",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-6"
      ]
    },
    {
      "namestring": "Hyperolius tuberilinguis",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-6",
        "cd9976db2e15a119033ac58b19c15f91db5d8931-13"
      ]
    },
    {
      "namestring": "A. aureusand delicatus",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-6"
      ]
    },
    {
      "namestring": "Afrixalus crotalus",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-7"
      ]
    },
    {
      "namestring": "Afrixalus brachycnemis brachycnemis",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-7",
        "cd9976db2e15a119033ac58b19c15f91db5d8931-9"
      ]
    },
    {
      "namestring": "Afrixalus brachycnemis",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-7",
        "cd9976db2e15a119033ac58b19c15f91db5d8931-9"
      ]
    },
    {
      "namestring": "Marhumbini",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-7"
      ]
    },
    {
      "namestring": "Afrixalus delicatus",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-9"
      ]
    },
    {
      "namestring": "Afrixalus pygmaeus pygmaeus",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-9"
      ]
    },
    {
      "namestring": "Jozini",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-10",
        "cd9976db2e15a119033ac58b19c15f91db5d8931-14",
        "cd9976db2e15a119033ac58b19c15f91db5d8931-17"
      ]
    },
    {
      "namestring": "Mtunzini",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-10"
      ]
    },
    {
      "namestring": "Tugela",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-10"
      ]
    },
    {
      "namestring": "Afrixalus delicatus tadpole",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-13"
      ]
    },
    {
      "namestring": "Typha",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-13"
      ]
    },
    {
      "namestring": "Rana angolensis",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-13"
      ]
    },
    {
      "namestring": "Arthroleptis wahlbergi",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-13"
      ]
    },
    {
      "namestring": "Leptopelis natalensis",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-13"
      ]
    },
    {
      "namestring": "Afrixalusfomasini",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-13"
      ]
    },
    {
      "namestring": "Hyperolius pickersgilli",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-13"
      ]
    },
    {
      "namestring": "H. marmoralus",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-13"
      ]
    },
    {
      "namestring": "Bufo gutturalis",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-13"
      ]
    },
    {
      "namestring": "Afrixalus spinifrons",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-13"
      ]
    },
    {
      "namestring": "Hyperoliuspusillus",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-13"
      ]
    },
    {
      "namestring": "Hyperolius pusillus",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-13"
      ]
    },
    {
      "namestring": "Hyperolius argus",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-13"
      ]
    },
    {
      "namestring": "Delicatus",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-13"
      ]
    },
    {
      "namestring": "Avoca",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-14"
      ]
    },
    {
      "namestring": "Hyperolius",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-14",
        "cd9976db2e15a119033ac58b19c15f91db5d8931-17"
      ]
    },
    {
      "namestring": "Crotalus",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-15"
      ]
    },
    {
      "namestring": "Megalixalus",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-17"
      ]
    },
    {
      "namestring": "Rainettes africaines",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-17"
      ]
    },
    {
      "namestring": "Amphibia",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-17"
      ]
    },
    {
      "namestring": "Rhacophoridae",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-17"
      ]
    },
    {
      "namestring": "Afrixalus (Anura)",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-17",
        "cd9976db2e15a119033ac58b19c15f91db5d8931-18"
      ]
    },
    {
      "namestring": "Steenstrupia",
      "pages": [
        "cd9976db2e15a119033ac58b19c15f91db5d8931-17",
        "cd9976db2e15a119033ac58b19c15f91db5d8931-18"
      ]
    }
  ]
}';

$json = '
{
  "_id": "f7208c0643b45f7bf499013e9f457303",
  "_rev": "3-b2875b27ce61e15587914ea64f3afbf6",
  "type": "article",
  "provenance": {
    "mysql": {
      "id": "1947996",
      "modified": "2014-01-23 10:08:14"
    }
  },
  "citation_string": "William E Duellman, S Blair Hedges (2007) Three new species of Pristimantis (Lissamphibia, Anura) from montane forests of the Cordillera Yanachaga in central Peru. Phyllomedusa, 6(2): 119--135",
  "title": "Three new species of Pristimantis (Lissamphibia, Anura) from montane forests of the Cordillera Yanachaga in central Peru",
  "journal": {
    "name": "Phyllomedusa",
    "volume": "6",
    "issue": "2",
    "pages": "119--135",
    "identifier": [
      {
        "id": "1519-1397",
        "type": "issn"
      }
    ]
  },
  "year": "2007",
  "identifier": [
    {
      "type": "doi",
      "id": "10.11606\/issn.2316-9079.v6i2p119-135"
    }
  ],
  "link": [
    {
      "url": "http:\/\/www.phyllomedusa.esalq.usp.br\/articles\/volume6\/number2\/62119135.pdf",
      "anchor": "PDF"
    }
  ],
  "file": {
    "sha1": "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd",
    "url": "http:\/\/www.phyllomedusa.esalq.usp.br\/articles\/volume6\/number2\/62119135.pdf"
  },
  "thumbnail": "data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAACPCAYAAAAMYX4VAAAABGdBTUEAALGPC\/xhBQAAAAFzUkdC\r\nAK7OHOkAAAAgY0hSTQAAeiYAAICEAAD6AAAAgOgAAHUwAADqYAAAOpgAABdwnLpRPAAAAAZiS0dE\r\nAP8A\/wD\/oL2nkwAAAAlwSFlzAAAsSwAALEsBpT2WqQAASwFJREFUeNrtvXmwZVd93\/tb8x7PeO+5\r\nQ3ffntSt1oAkJItRYAabQQypOE69ADbBVUlhklR4z6lyErAzlF1JZeLhVFF+2I6xiR0C2E6MbAzY\r\niDyELQYJSUhCqNVz33v73nvmPa69xvdHH6lwnmnSMrKw059\/7rl19tln7d\/vrPn3+y6Aa1zjGte4\r\nxjWucY1rXOMa17jGNa5xjWt8B9DzXYDvF1760pcCQigBgGNxHG83TZO0Wq0CAKz3HrIsC1ZXV2vv\r\nvZvNZhhj3MUYk3a7PbLWBvP5PNZa591uF+bzeco5b\/I8z6qqOm6MIRhj7b3frut666mnnvqO5aDP\r\ntyG+F\/yH\/\/AfIAxDePjhhyHPczQcDoEQAgcOHID5fA6f+MQnPEJX\/u2VZQkY44AxNrDWHkQIaWOM\r\nV0oBYyxECLmqqrQxRjdNM0QIHfTeqzRNidbaOef6UkqulHLe+30A4Lz3540xt1lrA+fcGGM8Zoxd\r\nsRx\/6WvIe9\/7XjDG0Nls9lJr7fbu7u4Ba22MMa6zLNtECA045yXn3GKMaRAEYjwelwAAYRiSJEmE\r\nUup8XdeHvPcTcZmB1rp0zlXOORoEQXnu3LnlXq8HWZY1Bw8eRGVZUkqpZow1eZ4\/ORqNBvv27Xuh\r\nUmo+Go2KwWDQstZ+44knnnAnTpy40RizLKV8RCl15oknnviOz\/OXvoYghABj7AkhWVmWTVEUM855\r\ngzHORqPRuNvtpgCwZoxplFJZkiRkMpnwOI659x4opWCMCZumIZzzUEo5H41GXAgRIIS4Uop2Oh0o\r\nimLCOU8xxr4oiqWFQ4aMsRWE0ERrjZVSM601I4SEzjmCEBIbGxvGWku01pnWOq+q6srP83wb9Lnm\r\nda97HXjvkffeAwD80R\/90Z\/rfu985zuBMYYppfDhD38Ybrrpplf3er0DRVFUBw8efEJr3QKAlpQS\r\nSSkvdbtdkuf5YYSQZYw9YK29cO+9937H+\/+Vd8hzDDpx4kSn3W6H8\/lcHj9+vNZac6UUQQiZ8Xis\r\n+\/0+lVIGQgjFGCudc+Zzn\/vc813ua1zjLylXbLIOHz4MQojBfD6\/jnOuiqKQ8\/n8Ca21RQhBv9+H\r\nuq7BGAMf+tCH4P7774ff\/\/3fhyRJ4K\/9tb8Ga2trcOrUKTDGwHw+h5e85CXwe7\/3e3DmzBkIwxA+\r\n85nPwF\/\/63+dSCkPBUFw\/od\/+IfN+9\/\/fhgMBqCUghMnTiCE0AsQQtNutzvNsuwWKeXWZDI5f\/Dg\r\nwXUAmBw7dkxdvHixJaUMyrLcue222y4\/GELwsY99DF7xildAp9OhOzs7y865wnuf79+\/Hznnlh57\r\n7LFDrVbrlNZaYIyV1nry9Bxh\/\/798I53vAMeeOABWFlZgVtuuQV+53d+B586deqo1vri\/v3716SU\r\naRzHZ4wxPUrpOEmS8stf\/vJz55ATJ05AFEXLJ0+efDdj7Aml1B1RFH0tiiKEMUZBEChrraWUTsIw\r\n\/MZ8Pn9T0zQqiiLFGMPW2k4URcWRI0fu\/epXv3q02+2uSCmXqqqaRVGEjDEVxlhIKQ9zzi8ihCzn\r\nXK6vr\/\/x2bNnb3HOrVRV9UPLy8u\/tLe3Rwgh7yaEbHU6nTNaax4EwVBKGSCEBgAwIYTQpmk0AGwS\r\nQpa89wYAAq11OwgCQSndjeP44dFoVFNK7xiPx3d1u91fV0ptGGPWWq3WrrWWCCGKyWTSIoQI51xi\r\njMmTJEFaa7K7u3tTFEXnoigiUsrDYRhuAYDjnG9LKZuqqv5HFEX64sWLz8ohVxz2xnEMDz744DAM\r\nw1IptQsARZZldxRF0XS73Snn\/IDWupUkyb3j8fhbVVXdjjHuSSlRGIZ\/NJ\/PX6y13u12u39AKb1+\r\nPB7fqZTizrmIMVY558qmaR4bj8fr3W73lsFgcGY8HrfPnTv3jbquX4YQ2miaxjDGLjrn3oAxvhcA\r\nbJ7ny4yxlbIsN5qmwYwx75w74JzrI4Sw974BgMY5ZwkhEQDkWmtjjFnNsuyscw7VdR167zUArE6n\r\n0+Oc84NVVb3QOeellE1d18ta64wxJpqmqZVSBACQ997neX5iPp83rVZLW2sPT6dT0mq1jhhjWkEQ\r\naMbYnxw\/flydPHnye+sQKSXcdddd6Bvf+MY9YRhmxpg9hBABACuEmFlrlxhjVmtdCiGK+Xz+axhj\r\nJIQgjLGdKIq+aK01CCG9b9++L25tbW1pre9qtVq\/7ZzjnPMaISSiKPoaIYSHYdh0Oh3I83zW7\/d\/\r\nyxiT5nnuxuNx471\/AGM8894T55yLomgFY+wopcA5R3VdQ1EUKkkS5pwLEEK+aZoyjmNOKQWEkCeE\r\nwHw+34zjWAVBcPrcuXNPlWWpKKWjfr\/vgyAAhJAbDodhGIYMYyzd5YJ6QsgbhRAPWms3nXMCAHy3\r\n2zWMMVJVlfXep0mSkDRNu03TEELI977JAgBYX1+Hdru96r3Pvfflm9\/8ZpBSQp7ncOLECXjf+94H\r\nP\/qjPwpVVUVaa\/y5z32uuPHGG1+AMZ4jhC5cvHgR3vGOd8DHP\/5x2NjYYHmeh0ePHs0\/9KEP+U99\r\n6lPwUz\/1U89816te9SrAGFPGWPjZz342\/zt\/5+\/Ar\/zKrzzz\/pEjR4AxtkQIOey9fwgAzNOz3l\/4\r\nhV+A9773vXD33XfHQRBIxpj9+Mc\/DsePHwfvfUQpfQEAPHbw4EH80EMP7TPGbI7H4+Lf\/bt\/Bz\/\/\r\n8z8Pq6ur+zudTodSOj9\/\/vzFzc1NeP3rXw\/z+ZwNh8PrGWMtKaXWWtfOuZOcc3X+\/Plnyvb2t78d\r\nbrrpJrDWYoSQ+9mf\/dnvvUNe\/epXw0\/\/9E+jn\/zJn\/w\/pZQnO52OlFKuhGFYOed80zSYEIIIIaZp\r\nmiFjrJXn+R9jjP9ZmqYXtda7nHPpnHPGmCVjjC3L8oH19fWdqqrebIxBSqm9druNAIAYY3rGGM8Y\r\naxFCTjdNA4SQgTFmGMcxF0Lcd+HChR9st9t3cM6\/qrW21tqOEEJ67yXnHKqqupkQcqrVaj2ZZdk5\r\njPHLi6JYp5QeHQwG\/\/dwOPyx6XTaIYRc6nQ6Z8MwVNbar0+n059aXV39OGNsOc\/ztjHGOOe6xhjr\r\nnHtpGIabVVUtW2tRFEVfDcOwqqqqF4bhpKoqXFXVvZzzent7+1k54mmu2GRNJhP45\/\/8n69RSuda\r\n6xdPp9OcEHLAOeettWg+n89ardbDlNLXF0XxWJqmUyklAYBhURQsjuPYe\/9CKWVsjAHvPaqqqjh7\r\n9mwWBMEdGGNomsYLIRprbWStBQBQCKHSGHP9fD7XQgiCMU6NMZPDhw9\/7Vvf+pYUQhjn3EvKsgys\r\ntd9K0\/T2fr+\/Mx6Pl40xKEmScDgcxt77AiH0g9baltb64bqus6ZpIoSQrarqOsbYne12+z4hxEPT\r\n6dQBACmKYklK+ZKyLL1z7qQQ4hDG2O\/t7XWCICAIIaK1fp0Q4rHxeMxWVlaiuq5f1DTNg8aY+s\/l\r\nje\/mkPF4DK1Wq6SU\/ndr7TLG2BljMCEExXEcKqVKhNDcWnv24MGDNo7jenNzs4jj+LcJIUgIMet2\r\nu\/3ZbGaLomAIIYiiaEYImQPA\/wMAnnOuu90uLYrCTqdTxhizYRgGZVnyNE1VWZaaMWYXi3xjhNDX\r\nEEKPdbvdaLHyWmGMkyAIoNvtQlVVbGlpCU0mk6kQYggAH5nP5246napDhw4ZpdRvUUqZ995yzpHW\r\nunr44YezY8eO\/TLnvNdut+\/PsuwJrbVUSsk0TRPGWGqtra21yHvvCCHYe98wxmzTNCQIggcHg8Hc\r\new+z2ezP5ZArNlmrq6sghOhZa1f2798\/NcZMEULN1772tWeueeUrXwmz2Yxsb28foJRuhmFozp49\r\n+6fuc9NNNwFCKHLOtTY3N3fe8pa3wG\/+5m\/CzTffvNZut1OM8TjLsvEjjzwCd999N0gpRRRFBiFk\r\nF31EXBRF5\/Dhw7vnz5+\/nnNutdZnAaDZ2tr68\/4ov6+4okMOHDgACKH1uq7\/r42NjfvzPK+MMRVC\r\naBkALnnvQ2PMjFLa3t3d\/cEoir7a7\/dHZVlyjDELgoBaa12e50\/0ej3RNM2rMcYzKeVTjLGtqqre\r\nfejQod\/RWg\/qumbe+7Cua0AIHWSMbRpjLGOsbJqmU1XVoN\/vf2Rzc\/OfxXEcRlH0YBAEm1LKHufc\r\nIYRU0zSPGGMuPds5wPcDV2yybrvtNrjnnnu20zTd3tra6jHGXp3nuQqCQDDGGudcu6oq02q1vuSc\r\n80VR3BWGIUgpO0EQNFLKkbX2UFVV\/302mz2BMb6u1Wq1EUIrQRD81mI+kg+Hw5cyxo4WRSGMMQIh\r\npLMsaxNCLsZx\/Iqqqlre+8eqqgJrLUII3aO1fgPnfHU0GolerzdTSt1hjJkppS4930Z9zhwyGo3A\r\new\/tdvvT1lpMKT0Zx3EjpVTee84YC5MkyQkhJoqibxhjiDEmjKIocc69HADGAPAnvV7vdJZlU+\/9\r\nJ40x4JzL3\/Oe9wx\/4zd+46PGmF6apv9vVVWPeO+1Uoq0221MKQWl1FBrfSoIAlzX9UgI4Smln6SU\r\nniaE7AIAJoQYhFAVBMETjLHTVVXBfD5\/vu36rPmuSydHjx7tVFXVBgBA6JltBVj8D9578N4jhBAg\r\nhDwAgLWWWGu7hJCGEJI755D3HhFC3NPXO+cwxtg55+DbPouevgcAPH1f\/\/Rr5xymlFpjDMYYe+89\r\nYIzBOQcYY++cw9777+cthQkAzL\/4xS9+xwuuWEMOHjwIq6ur2Ww2K0ajEYqiyCulwDmHMMaAEEJh\r\nGPq6rgEAUBzHrqoqBADQarUu1HWNFkZG3nsvhABjDLLWekopRFEE1lrQWoNzDnU6HVfXNdR1jRa7\r\neajVanlrLZRlCWmaQlEUgBB6+h4IAABjDN\/+9\/sUhBAy3\/6D\/jMvutKbhw4dgn6\/vwYAR9bX18ss\r\nyxLGWBFF0fm6rkld13WWZfs6nU4FAPOqqm4Iw3C71WpleZ7vX\/yMLwkhtHOOTKfTkHOedbtdkmUZ\r\n2t3d7TLGmo2NjZb3\/tz29vatcRzLbre7CwBhXdej8Xh8BGNs2u32pc3NzV6\/3x+laeqjKGpJKXNr\r\n7ewLX\/jC823s7xlXrCGEEKjrOuScvyzLsrmU8jqlVFXXdaO1DqSUD+d57qMoKhFC56SUr7DWxk3T\r\n1IQQ7JyLtdamruu6qipS1\/WDKysrW8Ph8E2TyURba4Fz\/uXRaHQjAFRN07yKMUayLONN01R1XX9m\r\nNpvdxhgbEEIUIaRtjLFSytwYc4Ex9nljzPNtw784h2xsbABC6DxC6Bfn8znWWocAAGEYMqWU1VrX\r\nGGPrvecYYwkAHwnDkGKMyWLShrXW2HtPMMZeaz1TSnmE0H\/x3uulpSVYW1srlVKnyrKsq6r6Fe89\r\nMsYEZVmqPM9nYRheoJQyIQQKw7CNEOozxs4JIcqyLPP77rvv+bbhX5xDFrNfv729XRFC0Pr6eq6U\r\n8kePHoW1tTX09a9\/HSGE0Mte9rLiH\/2jf+SffPLJ8o1vfCMMBgNMCIHBYOCstfD5z3\/+mXu+973v\r\nhbIst4bDIb7\/\/vvh1ltvBUJIpbXGa2trJcYYKKUoTVN4+9vf7n\/4h3\/YJEninXP+d3\/3d\/fuvvvu\r\np5IkQbu7u3D06FF65MgRn+e5\/YVf+AV4z3veA1mWIQDAt956q7v++uvBGOOLooBut4tvvvlm9x\/\/\r\n43+EQ4cO4clkgiaTCcRxbI8fPw7\/4l\/8C3j\/+98PCCFUFAXJsgx2d3dBSumGwyG85jWv8adOnUJF\r\nUbjbbrsNee\/R\/fffjw4ePIj27dtnEUJoc3PTnT59Gne7Xfexj30M\/uW\/\/Jfw6KOPwpU68f+ZK\/Yh\r\nr3jFKyAIgkRrTbz3t3c6HdM0jW232342m8Hu7u4OY+yG9fX1mbXWEkL82tpaeerUKW2Muanb7Q7T\r\nNLVSSrDWcmPMmTiOl4wxXWPMbGtrq9NqtWyapsY5lywvL0+qqiLGGJ9lGbvuuuu2H3zwwbXBYBB1\r\nu93MOYfzPHdN05DJZDJJkoSvr69HdV0HWmvDGJteunRpRwhxpNPphIwxGUURretaT6dTtrS0JBlj\r\nl3Z2dg7leT4MguDo0tJShjEmGGPjvZ9577e898eVUu08z7H3\/kkA2BgMBnY4HEb9fr9mjEWc8\/zR\r\nRx9tCCEHjhw5MjTGMCnl18+fP7\/\/xIkTnFLaU0o1jDFhjDGc85ox9iQAVN++gn1VNSRJEmCMld57\r\nihA6Y61NEEJeSumstZZzPiOEnPLeY4wxVkrBdDrVlNIZAJzCGIPWGqy1ZNHuS0JItRilDQkh07Is\r\ncRzHcV3XoyzLJAAI5xx474PZbGastWcQQj0AACklruvaeO+19z7nnCPnXEtrzRdD3+bAgQNGSrkr\r\npQyLomgAILDWaiklllLypmkaY8zOeDwep2mKhRAiiiLvvcdxHAMhBPI833bOjSilkKZpXhTFuK7r\r\nUGs9K8uScM6n0+m0ds5JACirqjKEELFv375oZ2cnK8uyzTkfVlWlkiQJlVJAKbWtVktgjK8YmPVd\r\nx+xHjx4Fxli0vr5+1+rq6hQhxCil2jmXj0YjTik9Yq2V3nuDMd6bTCbDNE03oiiKvffF9vb2471e\r\n77a1tbXpdDptI4Rgd3e3PHDgwCVjzO1BEGTnz58PWq2WSdNUAQCllPYYY0hrPSSEjI0xq3VdQ7\/f\r\nfxAAyv\/0n\/7TVbTKAK95zWuemS9Za\/3V9Dtve9vbYDQaAWMMrays+F\/91V+F7xaW+ufhu9752LFj\r\nQAhhSZIcGgwGQRzHCCGECCFFWZY1xrjvnGuqqjIbGxs2y7KMUtqy1oqyLI21dqSU6rZaLVeWZQsh\r\nhLIsm+3fv7\/QWh8Ow9BfunSpRAjRNE05xti3Wi2jtbZ5ntNOp2O01kIphXq93nkAmH3kIx95zgzy\r\nfHNFh\/z4j\/84dLvdZHNz087n82R9fb3AGBvOOboc20BtmqZ+Z2cHtdttWxRFcv78edpqtXyaprIo\r\nCt\/v983hw4f9uXPn8GQy6QRBgPI8r+bzebC8vFwkSeJ3d3fDo0ePFg888ADt9\/u2KAq+tLSkDh06\r\n5IfDIU6SxK2traGHH37YTSaT\/tGjR7MgCLwQwtd1Teu6xkeOHFHb29tECGEvXrzIwjDknPOKEOIe\r\nf\/xxvry8jA8cOOD6\/b7Z29vzGGNS1zV+wQteID\/xiU\/wpaUltrGxYbvdrhmPx55Siuu6JisrK+pL\r\nX\/pSe\/\/+\/VWapnzfvn355z73uc6+ffuawWCgEUJeCIEuXbrEr7\/+ermzs0MWE2E9Ho8TxhhXSmFr\r\nrWmaZkwIsZ\/61Ke+o82v2IcghMBai7Ms41rr24uiiJqmsQDgAIBijKHdbqPJZJJnWbZb13VXSumd\r\nc\/2qqmoAAMZYeuHChaH3\/rQx5vaiKGIAeIJSeqIsS40x1nme++FwWGGML1FKW5zzfVJKefbsWaeU\r\norPZTBZFgeI4Pj2bzY41TROUZckZY1Jr3Rhj1JkzZ9LpdMoAYIoxns1ms6MYYxPH8SyO4yFjbPXC\r\nhQuiqqpGKUWllL4oChRF0TAMw1wIcfjixYu4qiqjtSZKKTOfzwUAbANAq67rVtM0sff+AQBYxxgv\r\njUYjgjE2CKEqz3N97tw5Np1OW1rrMgiCp+q63mCMrWqtXRAEo9XV1QeMMdMr2fyKDvnoRz8KL3rR\r\nizIAYGEYPuacSy+vWtghAFilFAqCAC02lWzTNGCM8Qgh2ul0AGOMCSHL3vtSaz0DgHv37dsHZVmq\r\nuq6fEkJQSimEYWi11mCMUU3TBO12+wnGmJvNZhBFEUYIuaZpxPLysjx9+vSm1ppLKTEhBFlriTGm\r\nzLJMNE0D1lp34MABUxTFKa01RgiZ1dVV7Zw7N5lMYLFUTwDAM8aYtRYfOXKkqKpqezqdPvM+Qsgx\r\nxnhVVaYoiiZNU9E0DSwtLYH3\/qIxhmmtSRAE4L1n1tpyPp9TpRSp69oxxpogCDaXlpaoUsrPZjPc\r\n6XTUn6vJAgC48847wXsfd7vdW6Io6gIAKKUeevLJJy+99a1vhQ9+8IPPrrG8xp\/Jd12NW15ehn6\/\r\nXw0Gg290u937tNZfRAhNT58+DYtFxWtc4xrXuMY1rnGNa1zjGte4xjWu8b3iWS3s33777cA573vv\r\nu8450263S+89o5TWzjnXNE2cpuleHMfmE5\/4xPP9jH+puGolhze+8Y3w0EMPwYkTJ26eTqc3U0qT\r\noihsXde1EMIhhDjGOK\/r+pOEkPz5fsC\/bFy1Q4qigFtvvRVlWfZkHMfbrVYrN8bYLMsMAJDBYMA4\r\n59IYU\/3u7\/4ufPKTn4THHnsMtra2oCxLmM\/nAiGkKKW+KApgjAVBEKDhcMg453UURRAEga3rmu7u\r\n7qp2uw39fh+klFhrTd\/xjneoz3\/+88HFixeJEMIghNR8PvdhGMLZs2fhXe96F3zxi18MGGOoLEsc\r\nRZGhlCoppW+ahqVpav\/JP\/knrq5r+Mf\/+B\/Dy1\/+cmyMQefPnw+CIFCf\/OQn9atf\/WqQUsKdd94J\r\n99xzD\/zNv\/k3od\/vw9e\/\/nXc7XZ9FEX+8ccfB4QQCcMwvPHGG4svf\/nL0Gq1gDGGhRAujmO40t75\r\nd+Kqm6xXvvKV8MUvfhE2NjbuWl5evg0hlFtrR0EQEM756b29vS5jrN\/pdHwURXld19tlWb5AKeWT\r\nJKkopcvW2pIQcqEoipoQ8nLO+dfm8\/ltrVar5pw3SimPMU6ttcp7nzPGuHOOE0KAUvqVLMsOZ1kW\r\n7du3L9Bae0KI9t536rpGTdOUlNIDURTppmnSMAzHAHApDMP\/MZ\/PX57nOaaUJnEcY2NMFQQB9t6f\r\n1lrfYoyxAFBTSvtN0zyepikvy\/KwtXaqtQ6CIIjjOJbj8diHYZhFUbTZNM0rpZQXCCFkcc8uY+yb\r\nN95441eklP7Xfu3Xrsq+V52ZeP78eeh0OmCM0ZzzuXPOSClHYRgCY2y8u7uLhBCBEGK3aZoJQkjm\r\neX4DQigTQhTGmAwAFKU0L8tSKaXqqqrOG2N2KaWjIAic1loaY3KtteKcE2NMRQipGGOZtXYPY+zr\r\num4IIQ2l1GqtkTEGpJSllLJLCLngnBtyzvfqup5TSkUcx1IpVU+nU2SMsYQQVxTFUAjBGWM7o9Fo\r\nUhRFhjF21lqjlJpYa5VSihtjyrIspRCiBACcZVnJOa8555tZlqmqqhoAyOM4dt77EmM8xxjvpmkK\r\nDz744HNbQ970pjfB7u4uRFG0DADXc87PN01zVGu9G4bh1nQ6XV5aWgqbppkbY8hsNjswGAyeTjF+\r\nCmPshRD5zs7Ocr\/fX6KUbk2nU0jT1BpjYq11K47j7aqqUBzHbpHedng8Hl+w1qZLS0ttQkheFAUm\r\nhARBEOTW2rbWerazs3Ok0+nodru9eXlvjAwRQgwh9MJut7tnrT07Go1a3vtg3759c2stWGtb0+m0\r\nK4TYYYxN67o+7L2ve72e9N47hNAcIRRubm72tda83W6jNE2l1jo3xhBKKZFS2jAMG0opG41GQCmt\r\nP\/rRj+bvete74DOf+cxV2feq+5D5fA5aazwej19CKV0Jw3Borb3TGBMIIT6XZRlEURRNp9M7tdYK\r\nY7xSliW11pKmaY5aa4s4juv5fP6Ic+4mzvlLsyxrACAlhIy01l3vPTfGRM65Eef8DyaTyV1FUTyJ\r\nEBrHcdxyzv3AbDaLhBC+LMt5EAQbWuvfy\/M8ieO4Mx6Pr6OURmEYnkMI3W+tXW6aphUEQVOW5T7G\r\n2P7xeDzXWptFvkm7LMvjcRx\/qa7r67Mso1JKI4TwnPMHtdY\/oJRKvffGGIOyLHOLkFoeRVFQ1\/UD\r\n4\/G4yznfFwSBopRuvfGNb3zwyJEjV2veq68hf\/fv\/l04efIkpGkazOdzPBgM1Hw+DwGAdjqdyhhj\r\nMcZhVVXh7u6uS9OUYoxruKx2QObzuY7j2GmtVVmWYbfbFcPhsFldXe20Wq1ia2tLB0EQIIRWCCFl\r\nGIY7Z86cYd1uN+31elmaprCzsxNaawMhhMvzfB4EAYnjWAFAL0mS8ty5cyqKIhSGIQMAFwRBPZvN\r\nSKvVclJKzDmnaZq6+XyOZ7OZWV9f50opY4zBzrkgz3MkhKgZY05rTdM0BQCgRVHgIAgqrTXp9Xr4\r\n\/Pnzenl5mXLOm4XsH2u326YsS\/bggw9mm5ubz71DXvva10Jd16jb7d6ulDqIENJCiMx73wIA6b0\/\r\nnWXZUaVU7pyjURRFvV7PLvI7IoyxsNbOEULEe88wxg0AnN3a2jrc6XSwc85JKUkYhueNMS8khEy1\r\n1ue01t1WqwVKqdQYE2OMubXWJEmSEUIQQuhcURQbrVaLZ1mGhRDGe9\/Udd1OkkR674Ex1hhjvs45\r\nP5rnecM5P+Sc85RSba09l+f5dWEYXrLWXo8QKtrt9uN1XV9flqW21iYYY9rv93c558Msy47N5\/Mn\r\nl5aW2t77flVVAWPMCyHsdDqdvulNb\/rSG97wBrjjjjuuyr5X3WT1+3143ete5++5556ZUirSWu8R\r\nQnRVVTRNUw8AcyHEqbqu86ZpvPfeLC8vtwGAa61RXdcQXQ4VtABg0jT1RVFMZrNZzjnnQRDQoiiA\r\nEDI3xnzZOYeTJNkLw3DGOafT6ZTEccyNMV5rbcuy9JRSnKZpvrOzsyeEWG6aBlFKGSFESylPx3Hc\r\nZYytM8amcRyLqqomCCHOOd+pqkpaa2ec84Yx9ri1dmaMmWmtSRRFs6IoHs7zPArDUARB4BFCVVVV\r\nxWw200qpuTGmMcZMyrLElFKLMeYY4+z9738\/PJsm66pHWT\/\/8z8P9957Lzp58uT1SZL4IAjKsizd\r\nhQsXzq+srMR1XS9xznUURV3GWLyysoIwxtw5V2utp2VZ9o0xtbW2N5\/PuwCQUEpjhNBkfX3dB0HA\r\nCCGuaRoxGAzwIrGHCSG4ECJbzCn6nU4nI4TsC8NQttvtvaIo0qWlpV4QBEIIkS+kNeI0TWuEkMmy\r\nzCKEbBAEfDKZkDiOx3meH9NaizAMO1EUiaqq5lEU4TRNuRCCEEJEu922q6urYwBY8d4rKaVRSvGV\r\nlZUZY+xGQogMgoBEUbTDOQ8RQqjb7cpTp04V1lq4kr7i96SGfOUrX4HPfOYzgBAq4jjuW2s3hBDB\r\nsWPHaq11nGXZfkopCcOQEkKU1rqpqioUQgzruh4ZY9Zns9k3hRDAGFOL4Oq4qqp2WZYrSqnlqqoS\r\nQkid57nM89ynaWoX+YXbUkrcNE2rruvxIju3hzFuZrPZAc55K45j7JxbWzRXIUJoUBQFBQDqva8J\r\nIanW+tKFCxcqAEBBELi6rh0AJGVZ9sIwPFTXNc\/zXBJCcLfbnWmtLzZNsyaldEmS1EIIbIx5sq7r\r\nFmNsCSFklVK1tfZYWZahc+6iUmrn7\/\/9v3\/VNeSq+5C\/9\/f+Hly4cAF6vR43xlDvvSeEYABgWut6\r\nOp26VqsVx3FcV1UVdrvdcj6fB03TiHa7nadpiobDocEYM+dcaIxx3nsvpfTdblctsnnThbTqfDKZ\r\n9NM03QvDMBFCSM65iuPYa629MYYslIegqipLKfVRFOHRaNQdj8d4ZWVlZ21tjQ6HQwiCAGutvZSS\r\nJUniqqoSUso4CIJJmqZOa22LovBa6+OU0nkURZPxeOyXlpYgSRI2n88lxti1223aNI0vioLXdZ10\r\nOp2Mc+4XyUd4MplIIQQOw1B95CMfueo44GfVqS\/0Pl7aNM1RjHHNOc+99y2EUBMEwTeklMcYY5vO\r\nubQoihnGeNA0TT+KIkQIQcaYrzdNc5RS2qWUMkppaK3d8ZfD6E\/Vdd0vy3IZIfQIQuimMAy\/KoR4\r\nJQBwANCUUuK990mSTKSUHYQQAwCLENrOsmxbSnmT936n2+1ux3F8Is\/zZKHfhbXW0Gq1ioUSaSyE\r\naABAAEDpnHt8d3f3ACEkDcMQAUCktYYgCAqM8WNhGAZZlr2wrmuVJAmvqirgnBfe+51Op7NjrT3G\r\nGHtCSrl\/c3Pzj1\/84hf7X\/7lX74q+z4rmdg\/\/uM\/9m94wxtOCyGk1nrbe+\/LssTdbtchhEqtdbEQ\r\nNxOc88ZaOxFCkCRJ+Gw2Iwih4Xg8zgaDgQAAhjH2TdOU3nvMOa+TJBk3TXMyy7J6MBjcL4QwcRx\/\r\nCWO8jBAqlVJGKeUopU4IwQghgDFGCKHKOecxxo8ghEYAQIQQjxtjMGMMO+eWvPdDQggKggDSNKXG\r\nGA8AiFKKpZTDlZWV2XQ6Db33KkkS3jRNv9\/vV5TSenZZN+N+ADBxHJv5fI6cc0hKWQKATtN0bq2t\r\nOef6xhtvhDiOr9q2V11DXvjCF0Jd1+jo0aMH67o+yBibRVHEmqbZwxj3lVItSqmjlPKmaSZBEBgp\r\n5aQsy8MAMFFK7Yui6JGlpaVVrXW4UNUhxhi90L7CzrmAUiq11uV8Pu+XZRlHUfREEATraZqaRfio\r\nBgCxSM3GACAxxtWlS5dWOOc4iiJZ1zXCGOMwDI33\/inO+cE8z5M8z0kYhhXGeH8URecWWwaHwzDM\r\nm6axWZblGxsbREq5RwhZq6oqFkI4QogvisJkWVYuLy8HxpitJEn6TdMQ771FCHFKKZ7P5\/bw4cNf\r\nf8tb3uL\/xt\/4G899DTHGoLquY2OMFkIkVVXFdV1Pm6ahQRAYjHFHay0X6j8BAAQA4ObzeR4Ewdm1\r\ntTVflmXsvWfOOYcQCiilfQBoEEKVlBIIIU5KOTHGWErp6SiK1owx\/bquxxjjxDmnCCHcex9Za60Q\r\nAmutz3POcyllCyFEOedtrXWHELJDKV2u63opyzJGCJGU0qYsS+mcS6MoGkspy7IsEcYYgiDQVVWF\r\nWZYJAKCMMc0Y6yullLVWxnE8dc51KKWiruuO914652hVVSyO49BaO26327C7u3vVtr1qh9x8883w\r\nwAMPuPX19bNKKcEYc845WBh9iDE21tpUKZXXdb0EAGZlZWX6xBNPVFEUBUePHr2AEArCMDxJCHFw\r\nOX8bE0IIY6xumoYuLS01zjk\/n89X4jgeJ0mSSykbzvl551zNGOt47w8bY84tLS2NNzc3e2EYijRN\r\nJ1EUobqutyaTCYRhaNrtNul0Oj7LMhaG4UPdbhdTSpkxpk7T9NRsNgs55yRN0\/NVVYUYYyuEwBjj\r\nPa11KwiCJ6y1Lc75Nymlrt\/vB5zzcjqdlkqpsCzLrx08eNA759plWRpKKT1w4MDkzJkz\/vDhw8+9\r\nQzY3N2H\/\/v1oNBrdoZQ6hhAqhBC5c66FMZac86fm8\/mJPM\/PpWl6QErZ9t5\/yxjjgiCQZVneqLW+\r\nAWNsGGO1lBIYY3qh7GkQQkhK6Y0xJ5VSHaVUV0ppASAyxoggCL556dKlTYRQlzF2WCl1YTqdNsaY\r\nw0IIxTmvrbW5EOJgXdfTqqouFUWx3DTNQUJIHgRBobVOKaWZlPLcfD6\/HQAk5\/yxyWRyA6UUYYw9\r\nxjhWSpGqqnIAoEEQaM55ezqdNkEQzPM87zVNU6Vp2s6yrLHW3jgejyFJEtPpdL5yzz33XHzXu971\r\n3Dvkh37ohwAA4MEHH3ySMbaptZ4wxlCe567X66GF6sLFKIo8Y+xkXddECEEAoNrY2LCMMV6W5Tkh\r\nhE\/TFHZ3dxHnHBNCBt77Cca4CYIASykbhBCfTqc2DEMIwxBLKXtxHE9ms1kppfzCYtvYttttZ609\r\nyxiThBAnhLBJknzDGONarRbOsmyHUvqU1npKCCFKKdRqtZTW2hBCdhBCpNVq8fF4fO9i6AwAsASX\r\nlU5dq9XCQghqjFmVUu5ijHWr1cJKKZwkCY6iqNze3j7XNI0nhKD5fO7e+c53ok996lP+au171Z36\r\nRz\/6UfjABz6AWq3Wi8MwTL33Zwghy8YYRSmdVFX1EkrpKAxDrrU+izGu67o+TimVQgiCEDIY46Bp\r\nmse990e89yG9jNBajzHGlhAC1tqLWZbdijFu4jgeNU0zwRgfDIKgklJGUkq3srLyZNM0t3jvt6bT\r\naScIAmaMYWmaaqWUC4LgtJTyRgCIAGAnDEPunFv13s+rqnLee7+0tHRyNps1TdO8inOehWFY1XUd\r\nAkBAKd2M47iZzWYbizKpKIq+6b0\/0DTNEmNMMsaU9z4FgAwATmdZdrRpGvba1772S9vb2+5q0++u\r\neunkBS94AXz84x+HAwcOMEIIHw6HW0mSOEqpAYDpIkNJWmvne3t7QyEEcs41QggJAMZ7X1NKq6Io\r\nxrPZDBhjBaXUAUBmrd0zxmjGmMYYTxbqDZ5SOnbONQghgRCSlFKbZVmBEJpSStsIod35fF6laWo5\r\n55VSqs6ybN40TQYA2BhTRlE0WUjIysVeTWWMaeI4bk6fPj1RSmX9fl8ppZqiKApCSJOmqVNKzSaT\r\niWuaJrfWqk6nM1ZKtZxzwhgzQQjJqqqkEKLQWucAQKuq2v34xz8+\/8hHPgIf\/vCHn9sa8rRTwjA8\r\nHgRBsLKyMieEGGNMQCl1xpgSY4yNMdx7T1qt1rgoikBKyWezWVgURZMkyaFOpzMKw3D8tBiLUsoa\r\nY1iSJCaO4ybLsqdHZ9V4PO4mSVIbY0xRFE+nL+uqqnqL5qpYHBNRWGs3CCHzRW0VvV4vRAhBXdeE\r\nUiqqqsqttRMA6AJAyhijxhjbarX2Ll682Ov3+xZjXHvvk7qulxhjLoqiEUJIBkEg5\/P5vjRNkZRy\r\n7r2XGGM\/n8+X4zieOOcsYwwZY8bGGP3Zz372qm37rPqQ8+fPI0JIyDmnWuvjSilhrcXe+3ChudQA\r\nABJCyPl8fq5pmmOj0YghhCQAXAQAa6091jTNEiEkUUoFzjkEAFRrbWez2bfquj5clqWI4\/i0MWZp\r\nNBqFlFIIgsB679Hu7u5UStkopZbDMMRZlokgCM5gjA9rrUW73X6QMdadzWbLnHM3mUzCMAzp4myR\r\nb0opj1RVNWq1WktlWXa99+ecc9p7j7IsW7PWEoyxKMuy1FofcM6VaZo2u7u721rrE03ThBhjyzl3\r\nC93HWzjnkbVWIoT+uCiKs0888QTccMMNz61Djh8\/DseOHYOtra0RpZR2Op1vCSGclBLOnj1rDx8+\r\nzCeTicAYq0OHDtmiKMxwOLzY7\/eDwWBQ5HluoyiyxhiRJAnnnDeLnbsOY6ymlDqMsd7Z2bkYRZED\r\ngEQpdaYoivq6665jCKHg0qVLJAxDu7a2Jhljj8dxzDnnyjln4jj+VtM0NE1T1+12z2xvb8eMMRNd\r\nRhNCYmttNRgMdrz3anEwS7y6ujoPwzBkjDnO+aOEEMI559vb24QxVmOMfa\/XgyAInHNus91u+4VW\r\nF6aUhnEcS4RQXwiRe++r22+\/Hf7wD\/\/wua8h\/X4ffu7nfs6\/+MUvXqeUHh2Pxy6KokezLDuMEGIn\r\nT570ANCmlKo8zwvv\/ZmmaQ4ZYyaEkEhKuVJVVcU5r4qiaGOMJ977x51zN3nvE6VUQCmtgyBQzrl4\r\nNBpFjLHxysrKk3t7eyeappl676OFM71zjuZ5HgohiHMuN8YIjLGTUqrhcPio9\/6AUsqWZdknhERa\r\na1RVVWmMmRVF0eGcz5qmueHSpUsXi6LIEEIHCCHKOUcW+u6VtXbsvV9rmkYaY9I0TbFSyiqlDOf8\r\nTJ7nB6qqIpxzWMSmZXfdddcXv10s9DlzyM\/93M\/BkSNHIM\/zJwkhF8IwTIUQ47Isi+Xl5XAymTRB\r\nEGAhBCqKwjjnZq1Wq5hOp5n3fkAIKZ1zE+ecrqqKLi0tWYQQns1mJwkhfUIIsdZmCyHjgBBi4jgO\r\nCCEzhNA3Z7PZ3BgDGGO3trbWbZqGWmttXdewOE9KM8bcop1XUsozcRzTuq7Ph2E4iKKol2XZU7PZ\r\nzNR1HXS73RoARpe\/zk0AYC8MQzadTo33HqVpqvM8l9baYavVcnmeoyRJuPcelWWpgiCYe++HAMDz\r\nPIc4jom1trp48SJora\/aIVc9yvrQhz4E3W4Xcc4Pc855kiQjSmk\/iqJg0SmzNE0JpTTudDqccy6s\r\ntTEAlEqpsNvtYmvtvqIoSs75TCm1P8\/z1YUsbJGm6Yxzvo4xZoSQqt\/v58aY3nQ6rbXW60EQsHa7\r\n3Y7jeFlKmZ47d67inGNjjDDGOGNMyhjjs9kMa60j51xVFMWhXq+HkyRBlNK83W53ut1u2W63I+dc\r\nOBwOHef82GAw8BhjNplMLqVpKgCghxAiKysrhlK6zzknBoPBaKG5QhbCyisIoUG73bZhGErGGOOc\r\n2x\/5kR\/Jv\/71r8P999\/\/3NYQhBC02214\/PHHk9lsxuM49kmS7JdS0izLWJIkKcbYFEVRJEninHOo\r\nKApUFMV8bW1t0DQNl1JGRVFElFJCKV0qy9JrrQ8ppc6urq5GSqll5xxwzpOiKLbG43E\/y7JMCEGT\r\nJDlW17VaNBEkSZJiOp22CSHtOI51WZaCcx6VZdlYa20YhmVZlh4A1suyRO122wJA5JzTeZ7zLMui\r\nyWRykXM+JYQMAICtrKxE1tqhMWYFY8yMMd9USommaZYppdl0Ok2DIFjXWuvFljTN87xV1\/XJbrcb\r\nM8Za\/\/7f\/\/ttzvlzPzH8rd\/6Lfj85z+Pzp07t4QxriaTibv++uuRtRZVVUWUUuutVuviollRnHOm\r\nlIK6rrFSqt3r9Sbb29t2NpuR2267DYwx2BhDEULWOYeCIKizLGtpraHdbjfOOTDGuDiO9dbWViyE\r\niBZCMmowGOR7e3uRcw46nY7Z2dlJlpaW8iRJjJQyds7V0+l0eXV11YxGo2lVVX5lZYVtbm6GGxsb\r\nBUJIX7p0SR87dgxdvHgRyrKEQ4cOwcrKCuGc28V3o8lk4pumga2tLYjjGKSU\/vDhwziOY3\/q1Ck4\r\ncuQInDlzBp566il\/yy23oFtuuQV+5md+5qqd8awc8sEPfhA++MEPouXl5Vekl+NjIiGErqoqj6Jo\r\nnOf5bWEYNlJKU9f1I61W63hVVTZJklFd1zcLIcYY48e997dyzhUhhDnn2nVdT7TW1Fr7aBzH1yul\r\nKMY4ppTiMAx3lVIXiqK43jm3GYbhwaZp2q1W62GEUDCbzfYtdOPjXq+XB0HwZFEUh2ez2XR7e9tf\r\nf\/31S5xzs4j1CvM8N2EY1kKIb+zu7p75p\/\/0n8Lb3va2Z2O\/7znPKlBuY2PDa60fbrVa1Dnnq6oi\r\nRVFoIYSy1m4BAF+M6YvFVqhttVraGHMOYwyDwSBTSk2klDiKIlQUBZVSqqIofLvdbhhjE4wxWjQh\r\nMyGEdM41aZoOp9NphRA6o5Ti3vs6z3OTZdlJzjnp9XqEMWYwxtV8Pt+WUlrGmG+aJkiSBC0mgSQI\r\nAlXXtbXW1o888gj85\/\/8n59vPzzD96XG7W\/+5m8+8\/od73jH812cv1Cu2iE\/8RM\/AVprqKoKCCGw\r\nsbEBKysr8NM\/\/dPP97N8z3nf+973zOt\/9a\/+1V\/Id161Q37xF38RfvInfxJuv\/32OweDQe29H4dh\r\nCN57hhDS0+kUzWazVEpJNjY2tqMoKpumOcA5n8\/nc5+mKUnTVH\/sYx+bveQlL9ngnMerq6vTy9MP\r\nKyilRmtdL+YjxFrL0jSdGWOctTYuimIpiqIh59xrrUlVVRwAXKfTKb33ylqbZlnWRFFUKaW6i2A6\r\n1+12893dXea9v3EwGOwJITSlFDnnGADUAGCcc9Q5JwghqtfrzSaTSSvLsv2Msb12u90YY4RzTi5S\r\nHZy1NpnP53maptA0TaKUsk3TqIMHD5YXL16EZ6MnfNV9yM7ODiCE4LrrrruurutWv993TdPMtNYd\r\npZSaz+cMABDnPKnr+huMsYeVUjcvpJGi2WxmEELuzW9+831a62XOeaSUOgiXtRaJcy5ECBkAwN57\r\nxRgz8\/n8lHMuBYDD\/nLEs9Vaq4UErWWMxUVR7BljTjZN84POuQt1XT9aFMXL4zjWQRCUQoinrLUO\r\nIdRSSnUZY2FRFAwAhPeeYoyVtRYTQgwAzC9evPgtSulLCCHcGNMURZF572OMsZjNZk9praumaV5G\r\nCPnypUuXamPM7WmaFlEUTauqOtPv98fvfOc7\/Uc\/+tHn1iGPPfYYrK+vQxiGnwUA3mq1MKVUAYCs\r\n69pPp1O\/tLSElpeX2eL463I4HH6WMca73S6WUpokSXgQBGYymZwsy7I6evQoF0KQsiz97u6uW19f\r\nZ0opX9e1GwwGcPHiRey9b7fb7dOEECmEwJRSW9e1XwhYEoyxRQg1Ozs7XwiCoGqaJvfe\/4+1tTUD\r\nABpj3Op0Ono4HP5JkiR4bW2Nj8djWte1Vkq5TqdDpZSOUgr9ft\/v7e35OI7vpZSqoiictdYtzsAN\r\nwzCsq6oyk8mk5JyXi\/MRx0mSoG632zDGqPceFiO\/q+Kqm6wf\/dEfhQsXLoD3\/mVRFKW9Xk8tAqkD\r\njDGz1uYIIbaIsfKMsQvW2vWFCLPDGGu4PAqzzjnOGCswxheaptloLgcDP6WUuoNSWlNK816v98SZ\r\nM2eOBUFwY5IkJed8BACxtdZorT1CKAyCQBJCzimlvDHmZuccWuyzRNZaRSndGg6H+xhjrSAIdrz3\r\nCSHEcs5bdV1L7\/1jAMC89wedcxohlHDOe4vdxFPGmKNa6w6ldMY5x9ZagTEeB0Hwzfl8\/oqFtiTD\r\nGAf9fn9MCHk0juMJxhie8xoCcPmkAmPM6cU5gS0AEFprX9c1DsNQOOcsAOgoiqBpmjzLsotxHAfW\r\nWkMpjRBCbhHYYAAANU2TGWMqzrmp61qXZbk5GAy0EEIyxnrOuT1CyB5CqCOE8MaYAgA8IaSLEBoJ\r\nISxCCDvn6oVTp8aYpmkaoJR6hFBBCNnCGG9575uyLIMgCLS1NmCMRWEYhpPJpGqa5lKSJKm1lnjv\r\nv1lVlVlaWqomk4n03o+01hPvvVdK0W63a7z3SVmW38yyLBFCkDiOCUKo4ZzHcRxPpZTP\/Uz9U5\/6\r\nFLz1rW+Fu++++wVxHHMp5cQ55wghuizLQRAEM+ecEkLgPM+11nqVUhokSbJrrUXOOYwQWoLL+yXl\r\nfD7f6vf7k+XlZQwAXmv9TLTf\/3ySAEIIfuInfgJ3Oh33sY99DP7W3\/pbeDAYuIMHD8Lb3\/52+K\/\/\r\n9b\/CfffdRzDGNooi+Lf\/9t9e8Vne\/e53w9bWFj5+\/Lj\/wAc+4O+++27Ubrdxr9eDXq9nr7\/+erj3\r\n3nshiiLsnPPGGP9Lv\/RLf2a5vlN5n3OH\/MZv\/Ab8m3\/zb4BSeqjX652w1nYWhy8aKaXknKdCiJRS\r\nKr3354qiUFLKhDHWXmQgYYyxwhgHjDFfFMXWiRMnHqqqyvz2b\/\/2VT\/AXzWuusn6sR\/7Mej1eoAx\r\nPt9utzeTJEFN00Cn00E7OzuOc46FEL0wDCtCSBHHMbl06ZL33gMhBLIsA875M2GWSZLAoul7vm1x\r\njWv8\/7nqJusf\/sN\/CFprePTRRxnn3GGM7R\/90R8938\/xV4arbrIGgwH8zM\/8DGxsbLxZCBGsrq6e\r\ne9WrXhVgjIOiKBBcDudhVVU9bq3dezYnJv\/vzFU75JFHHgEAAGPMWAix33u\/Utd1AgCJlNJgjDt1\r\nXWspZfRsJkbPN08\/HwDArbfe+hf+\/VfdZN11113w7ne\/G\/71v\/7Xx7vdLg3DcEcIYaMoqnZ2dni3\r\n26V1XeOqquxiXN4xxkzTNJV5nhOEkFioNUC\/34f5fO4BQE+nU7ezs3NgMBhcAgCklLqh2+1uUko9\r\nXJY2F977QmutgiCgxhgKAFEcxyNKKd7c3DwohJgukoKyxfEZrK5rxznHVVUth2EIRVGQbrdbeO9n\r\neZ6X1trYex8GQVC3Wi2klEIA4MIwZLPZbE4ICRaHMFvn3FIYhuM0TdXFixfXKaVZkiSKEAJBEGBj\r\nDCrL0oVhqF\/1qldVjz32GPz6r\/\/6Vdn3qmsIpRR+\/Md\/HFZXV7tN01yXJEmYpimaTCZfsNbevre3\r\n15\/NZq0oigq43Hz1CCG1UurRra2tIAzDW8MwZAvpjUopdQhj\/ORoNDrrnHsLQujRPM9PAcDxqqqu\r\no5RSrXWAEKLGmIQQUkgpKQCYRZbtI8aY2Wg0uq3b7c611kcBoEAIda21UVEUjTHGR1EUOecaY4yY\r\nzWYzhJBzzn06iqLuzs7OTaPRiHU6na7WehJFkSuKoszz\/MtCiFdPp1Max\/EXEUKvnc\/nrq7rh5xz\r\nG2VZrhdFUYVhGC7W2oAxNlFKnXv88cc\/Swi56onhVTvkC1\/4ArRaLeCcP1IUxTfTNCWtVosAQFUU\r\nxQhjHCdJshQEwWYYhmg8HgdpmsowDC3nHKy1jyVJklJKlVJqRghpUUphZWXFWWs\/LoQYzWYz5Zw7\r\n75xrtdttoZSq5vO5s9aidrsdVlUFQogqiiLkva8X2cDTRWD2V4QQuCzLyBhTee9FkiQd7\/2utdYv\r\nLy\/73d1dzxhLhBBjhNAYY7yLMUaLPHaDEBKtVsuurq7qnZ2dPzDGaGttGYbhx+M4joQQea\/Xe3I2\r\nm1FjjOech9bafQihTYyxEkKoLMv8+vr61Zr36qNOhBDw4he\/GE0mk9cEQfBC59xgMpkc1VrfQind\r\nGI\/H+xarostFUcxHo9HrKKUCAEgYhq+Nomhnb2\/vSBAEcZZlN9R1vTKZTF4eBMFLjDFHrbVJEASH\r\nO51OMplMWgDw0qZpVoui2J8kyYZS6oC19oUIoV6e54ettYdHo9HcWnuDlPJonue7lNKXGGOY9x5H\r\nUXSdUmoFAI4DwGqWZb2maSbT6fSHGGNHAaB16dKlfhAEd4ZhGDHGjnHOVzHG38zz\/GWU0v0bGxtR\r\np9MZhGG4TCm9QWu97pxbVkotCSFaSZIgznlGCLk+iqI2Ywy\/\/vWvHw+HQ\/jqV7\/63NaQ0WgE4\/EY\r\niqKYK6WYtbYsy7LmnGcIobiu60oI4YIgkMYYG4bhBcZYaYwZa61HQRAApfQ8Y4zXdU2apiniOLZS\r\nSue9x1rrUimlOp0OZFl2xjkXxnHcqaqqCsMwFkLMmqYpACBGCG0opTYJId4YU5VlaQgh3jk3ds5t\r\nYYxDAKirqlKc83nTNAVjzDVNY8Mw3CSEeK31BaWUxhjvNU3Tappm1G63O4tR49k0TeNFeBEryzIP\r\nw\/AcxhhmsxkYY3AYhtZ7b7XW1Xw+nyzOWHT33HMPWggpXBVX3am\/+tWvhjRNIU3TtnOOGWPo00eq\r\nUkq5c67inMvRaJRmWWZXV1fRfD43aZqSOI7rCxcudBFCNAiC4WQyuX55eXmUJIlerPtQhJByzinv\r\nPdNac8aYCsOwnEwmbcaYmU6ndhHGyb33aRAEVZ7nsFghkFEUFSdPnlwNgqDGGEMURWhzc9O0Wq1u\r\nkiRzxhja29vrJ0lCvfc6iqLJQtPEGGOOxHG8k2WZppSapmkCrXWUpulkkX5tMMY5QqhXlqWXUlLO\r\nOYnjuEII2fl8viyEmPd6vdmv\/\/qvm4cffhhuu+2257aG1HUN0+kULy0t3cIY60spuxjjUgiRW2tj\r\nSmmhtT43n89v4pyL2Ww2Z4yVUspB0zTnpJQtznmvLMuvWmvDpmkOCSHSpmkIXF4CF4QQa4zxhJAG\r\nIVSdO3du1xhzK8Z4wjlvyrIkTdPE1lochiGUZQlhGAohRDmbzU4ppY5RSlVVVacB4ObFYTI4z\/OD\r\ndV2nCCExm80q7z0ty9KEYUiMMQ\/leZ70er2XzWYzlCQJsdZmUsqAEJIghHDTNGOt9dettbdkWaal\r\nlBd7vd71CCHJGDtbluVNs9lMhWH4MABsPv7441dr3qt3yB133AGPPPKIY4w9TAgRnU6HAUCW53kg\r\nhIAkSRrnnDLGXOj3+wwAzGIHMMiyDNbX16m1lkspHcb4q957FoYhwRgL55z03ts0TUnTNLbVaiFr\r\nbWCMSTHGn8MYl2tra+rJJ5+MFkcvccaYppTqMAxxr9eDRad8JkkSQAgZrfV2u922jDFHCPFnz56N\r\ner2emk6nKE3TCC7nqMPhw4eLxx9\/\/P4wDAMAwHEcG2uts9a6NE0TrfWAcz5O07Ta29v7snOu4Zzj\r\nlZWVc2EY+uFw6Jxz54UQiHPe3HLLLc8qQOOqm6yXv\/zlsL6+jjY3N++ilK50u92dsiynZVm+IAiC\r\nubX2TLvd3tc0Tai1DgghCiE0lFJq59wxzvl4a2trurS0dH2apmNjTGStfeRb3\/oW37dvH11aWlqL\r\nomjLGNPPsqwThmFgrYUkSYrFadBP7e7u3tBqtWZN08zTND1ICNny3ivv\/X7nXFFVVRgEAa6qCidJ\r\nUgohYqWUAYAzi+Hxec65GY\/Hhxf9iFhdXd2eTCYKY7wcRVG4GAFK5xyu6zpqmoZHUYS73a4aj8cS\r\nITTSWl+\/tLT0oJRyg1LKiqJgURSpIAgu3XHHHd+4dOmS\/8Vf\/MXntoZIKeGrX\/0qHDhw4ALnfEop\r\nLYwxMgiCx7z3ubW2XGzdwmKDxi4tLSmllGeMSWttprUupJRbABAIIWi73a4QQlOMcRoEQeO9z7z3\r\nRkq5FwQB11rXWmu02JmcCiG+BQCNMSZDCFmE0AwAjJRSLfqcQClliqJwQggAAMY5x2VZTp8uZ13X\r\n1Xw+n7bbbccYq621NssyQSkdEkIw59wvTrj2o9EIBUEg6rquwjAMCCHSWiuFEMp7XwohkNb6XFEU\r\nlnOOMcb5fffd5zudznNfQ973vvfB\/fffD+12+2DTNIfyPN9rtVqSMWaklMFi5GG01u04jmeU0vFk\r\nMukrpQjGWHc6HYwQCuFy0o4riqKglDZVVbUXomOT4XAYh2EYRlGknHOz6XR6fbfbvViWZZymKRFC\r\nTBbOSbXWBCHkKKWGUhobY2rO+cgY03bORYSQsGmabcYYcc7FT+\/dFEUhFhlfSClFFieS8iAIMMb4\r\n0mIGn2qtcRiGcwAIpZTGOYeDIDDD4bAfx\/GOEKIAgK7WmmqtJ3me78MY1wihp7785S9ftUOuuoY8\r\n8MAD8Mgjj+Bjx471Wq1WukiAgUVKAK2qCmGMWV3XmhAywBifmk6n+zjnLc45a5qmBABW17VmjLUn\r\nk8mZOI6pc+46rbWklD4ohDia53mIMcZa628CwMFFYHMThuELvPenq6oyQRDsk1L2AGDOOS+cc9Fi\r\ndIS11utCiLYxJpBSNlLKZWttKKXUy8vLoqqqYHG8uC2KwnrvfV3XfrFfrqfTaTdJkoQQEldVhRBC\r\nedM0vKoq2mq1IkKIo5R28zy\/EIbhvrIsg\/l8fo5SCt1ut7yswnH1XHUNeelLXwp\/8id\/Aq9\/\/et7\r\nYRi6VqulkiSxzjnkvYfxeIzjOEZKKd9ut61zDra2tpaUUr7T6WTGGCeEAKWUGY1GbaUUPXz48ExK\r\nGbbb7dp77yilaDKZsHa77WazWWqtJd1ud6KUgm63ixBCdHt7WxJCupRSkyRJAQBka2vLe+\/92toa\r\nbG9vJ957efjwYWWtJU8rlwKAQwhFjDEppTQAQJRSiDFmzp8\/v8wYq2688cZiMpkEi4RTTwhxZVm6\r\npaUlKMsSE0IwpdR772E0GnWUUigMw1me5zYMQ5SmqfnDP\/xDfdddd8F\/+2\/\/7bl1yFve8hYYjUao\r\n1Wr9EAC0F9J5yHvvoiiaKaXSxcGKFGM8LcvyQlVVJ5xzWggRWmsDQoglhJyez+eUMaYGg0FGKd1X\r\nFEVHCAFN04D3nnQ6nXFZlsvOOcI5V4t7VlrrWZ7nJymlLwqCYAQADCE0MMbQhcAYcc7xNE0rhNBJ\r\nzvlRpVS0iEaZUkoj59xEKbVLCNmo6zoty\/JJjPFqEAQnl5aWlrXWBznnmXOOK6Wcc449nd+4KMek\r\nrutLRVGccM55zrm4HFpAECHkXF3XX2u32+4P\/uAPrsq+V91kGWMgCAKI4\/hBhFAfY4yttVVd14YQ\r\n4jjndKGBiAkhGiGUdzqdfDwe+7qubZqma4yxkjE23t7etocOHdKLFeCsqiqIoiiglLa99yNKqe33\r\n+09Za7ExBgEAMMY8AECapnp3d\/eBRedrm6bZDoJgVQixvbm5qVqtFo3jGBZavBNCyIAQMvPeq4XD\r\nNQDoMAxnUkpf13VNCDl3\/PhxBZcPHN56umMPgiDUWreFEFNrranr2td1XQZBoFutVjEej6Gua9tq\r\ntQaUUskYG0dR5IIguFrzPvtg6\/e+972gtQYhBCCE4AMf+MD\/75oXv\/jFwBiDIAhgd3cXHn300T+1\r\nHP23\/\/bf\/lPXf\/CDH4SnA8yCIIB\/8A\/+wZ96\/wMf+AB472GRzAPvfe97\/5fK+ulPf\/qZ13ffffez\r\nfeQ\/xbvf\/e5nXn\/4wx8G7z089dRT0Gq1IAgCeDYjrGtc4xrXuMY1rnGNazxXXHHYe+edd8LRo0dJ\r\nURTkfw4kfuYGi4DihczfFQOMvz0o2Xv\/rIKR\/wwMALjf\/\/3f\/4u33nPAFSeGi2CGbhRFHULI0zoR\r\nGACccw4754i1liKE\/EKeDxBCFgA8QggWy+VACHGL5Qu+uAYwxoAQUgDwrPK5v409ACifb0N+r7ji\r\nT\/Tmm28GxtidQRAcS5LkjLWWc865c84uIi7OUUpf7JyrKaUXKKX7hBB7jDG+UIkWjDFGCJkTQs7k\r\nef4S59wyxljGcXxxeXn5S5\/85CfVU0899awK\/+219vjx48+3Lb8nXLGGMMYAAC4RQgLnnFosG0wx\r\nxrH33kop6yRJLmCMNUJovFj3KZxz1BgD1tqSUppYa8s8zyUAjDDGJULIMMaG3nv8Iz\/yI3Ds2LHn\r\n2w7fN1zRIZRSIIRE3vslzrnz3rcXO3yUMdYIIbRzLgeAdWOMJoQcFEIUhJCKUhp477H3PiaEpEmS\r\nTKuq6nnv16y1XkoZBkFw5jv1Tf+7ckWHaK0BY6y892MAmCOEFEJo2Xt\/DmMsKKWXjDECADDGuMAY\r\nPwCXY738Qkxfcc7Be0+qqkq891POeUYprTnnJ4MgUFLK59sG31dc0SHWWqiqqhOG4YaU8pBSqvDe\r\ntwghEUKIB0Fwc1mWQ2OMCsPw5jAMM+89KooCWWtFEATce7\/bNM1JjPGrrLXRIgLwGzfccMN0OBy6\r\ne+655\/m2wfcVV3RIURRAKT3JGDuvlEJVVWmEEImiiFhrLSGEPL2cnSTJQwCXE0KttXaRS0istWp3\r\nd7fpdru\/QwjxhBCIokiORqNnlTZ8jWtc4xrX+L7hihPDwWAAlFK0srJCnHN+eXnZ1XVNFwKVvtvt\r\nwkLrHBFC3H333QcAl886BAAIggBWV1fhoYcegqIoQCkF99577zP3f9vb3gZN00C73QZjDDp+\/Ljf\r\n2NiAqqrgPe95z\/Ntm+eFK3bqi4O7jimlXi2EGM7n89NlWd4aBMETlFKd53njve83TcM555svetGL\r\nbJ7n5\/M8H2CMW9PpNNje3j4tpdyfJEnR6XSqffv2PbM2FoZh45yLh8PhGgDY06dP6+3t7bPGmL+0\r\nx34zxiCKIpZlWfTtcyyEEHS7XTmZTJpn5ZC3vvWt8JWvfAUopdxaexJjfAQhdDvGuEIIHTHGhM45\r\nizEmlFLqnNvvvZ8MBoNhXdc9uHyUKuac92azGYvj+DopZd00DTbGlIyxdlVVeVVVM++9QAiBlHIO\r\nAM1fgdHXqwDg5+Dyut\/TEAD4EAD86rNyCMDloLgf+IEfePzs2bP+5ptvvn+RApAJIdCFCxeeXnwE\r\nhBAIIaAoCsiyzA8Gg8fDMCSccxwEgT937tyFbrcLZ8+ehcFgANZav5AWh1OnTsHa2tr5drsNy8vL\r\n\/pZbbvFRFH1fye49C\/oIoTsxxs84ZFFbvmtK1felxN9fZhZRNv8HQui\/vOY1r8EYYzh48CA89NBD\r\n8MADD\/xsURQ\/f6XPPys1oGt8dxhjwBgDhBBwzqGu6\/+lz11zyHMAxhjm8zl8+tOffmYjTkoJrVbr\r\nu372mkOeIxZHPz3z\/9Mbc98N\/F2vuMZfKP8fXClwXfvHbSoAAAAldEVYdGRhdGU6Y3JlYXRlADIw\r\nMTMtMDEtMTZUMTg6MjQ6NDQrMDA6MDCmWtE5AAAAJXRFWHRkYXRlOm1vZGlmeQAyMDEzLTAxLTE2\r\nVDE4OjI0OjQ0KzAwOjAw1wdphQAAAB10RVh0U29mdHdhcmUAR1BMIEdob3N0c2NyaXB0IDkuMDZq\r\npgw1AAAAAElFTkSuQmCC\r\n",
  "author": [
    {
      "firstname": "William E",
      "lastname": "Duellman",
      "name": "William E Duellman"
    },
    {
      "firstname": "S Blair",
      "lastname": "Hedges",
      "name": "S Blair Hedges"
    }
  ],
  "publisher": "Universidade de Sao Paulo Sistema Integrado de Bibliotecas - SIBiUSP",
  "status": 200,
  "names": [
    {
      "namestring": "Phyllomedusa",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-1",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-2",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-3",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-4",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-5",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-6",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-7",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-8",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-9",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-10",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-11",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-12",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-13",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-14",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-15",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-16",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-17"
      ]
    },
    {
      "namestring": "Pristimantis",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-1",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-2",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-3",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-5",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-6",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-7",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-9",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-11",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-12",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-13",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-14",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-15",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-16",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-17"
      ]
    },
    {
      "namestring": "Lissamphibia",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-1",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-3",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-5",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-7",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-9",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-11",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-13",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-15",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-17"
      ]
    },
    {
      "namestring": "Anura",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-1",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-2",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-3",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-5",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-7",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-9",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-11",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-13",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-15",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-16",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-17"
      ]
    },
    {
      "namestring": "P. bipunctatus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-1",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-3",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-6",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-12"
      ]
    },
    {
      "namestring": "P. conspicillatus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-1",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-6"
      ]
    },
    {
      "namestring": "P. stictogaster",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-1",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-7",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-8",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-12"
      ]
    },
    {
      "namestring": "P. peruvianus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-1",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-2",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-6"
      ]
    },
    {
      "namestring": "P. unistrigatus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-1",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-2"
      ]
    },
    {
      "namestring": "Phrynopus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-1",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-2",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-6",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-13",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-14",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-15",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-16"
      ]
    },
    {
      "namestring": "Pristimantis adiastolus sp",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-1",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-2",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-3"
      ]
    },
    {
      "namestring": "Pristimantis albertus sp",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-1",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-2",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-6"
      ]
    },
    {
      "namestring": "Pristimantis minutulus sp",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-1",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-2",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-9"
      ]
    },
    {
      "namestring": "Pristimantis provenientes",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-1"
      ]
    },
    {
      "namestring": "Phrynopus diversidad",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-2"
      ]
    },
    {
      "namestring": "Eleutherodactylus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-2",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-15",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-16"
      ]
    },
    {
      "namestring": "P. cosnipatae danae",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-2"
      ]
    },
    {
      "namestring": "P. seorsus tanyrhynchus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-2"
      ]
    },
    {
      "namestring": "P. mercedesae",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-2"
      ]
    },
    {
      "namestring": "P. olivaceus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-2"
      ]
    },
    {
      "namestring": "Morales",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-2",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-15"
      ]
    },
    {
      "namestring": "P. platydactylus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-2",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-12"
      ]
    },
    {
      "namestring": "Oreobates",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-2"
      ]
    },
    {
      "namestring": "Ayacucho",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-2",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-17"
      ]
    },
    {
      "namestring": "P. rhabdolaemus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-2",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-7"
      ]
    },
    {
      "namestring": "P. scitulus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-2"
      ]
    },
    {
      "namestring": "P. sagittulus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-2",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-9"
      ]
    },
    {
      "namestring": "P. aniptopalmatus bipunctatus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-2"
      ]
    },
    {
      "namestring": "P. bromeliaceus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-2",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-12"
      ]
    },
    {
      "namestring": "P. mendax",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-2",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-12"
      ]
    },
    {
      "namestring": "P. cruciocularis flavobracatus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-2",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-9"
      ]
    },
    {
      "namestring": "Eleutherodactylus lucida",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-2"
      ]
    },
    {
      "namestring": "Phyllonastes duellmani",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-2",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-13"
      ]
    },
    {
      "namestring": "Pristimantis bipunctatus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-3",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-4",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-13",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-16"
      ]
    },
    {
      "namestring": "Pristimantis (Pristimantis) peruvianus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-3",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-7"
      ]
    },
    {
      "namestring": "(Pristimantis) peruvianus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-3",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-7"
      ]
    },
    {
      "namestring": "Pristimatis adiastolus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-3"
      ]
    },
    {
      "namestring": "P. adiastolus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-3",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-4"
      ]
    },
    {
      "namestring": "Pristimantis conspicillatus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-3",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-6",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-7"
      ]
    },
    {
      "namestring": "P. avicuporum",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-3"
      ]
    },
    {
      "namestring": "P. skydmainos",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-3"
      ]
    },
    {
      "namestring": "Pristimantis adiastolus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-4",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-6",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-12",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-13"
      ]
    },
    {
      "namestring": "Pristimantis albertus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-4",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-7",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-8",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-13"
      ]
    },
    {
      "namestring": "Pristimantis stictogaster",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-4",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-13",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-17"
      ]
    },
    {
      "namestring": "Pristimantis meridionalis",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-4",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-17"
      ]
    },
    {
      "namestring": "Pristimantis rhabdolaemus toftae",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-4"
      ]
    },
    {
      "namestring": "P. rhadolaemus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-4"
      ]
    },
    {
      "namestring": "P. albertus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-4",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-7",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-12"
      ]
    },
    {
      "namestring": "P. toftae",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-4",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-7"
      ]
    },
    {
      "namestring": "Canthus rostralis",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-4",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-7",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-9"
      ]
    },
    {
      "namestring": "Leptodactylus andreae",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-6",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-12"
      ]
    },
    {
      "namestring": "L. grisegularis",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-6",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-12"
      ]
    },
    {
      "namestring": "Hypsiboas cinerascens",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-6",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-12"
      ]
    },
    {
      "namestring": "Hypsiboas granosus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-6",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-12"
      ]
    },
    {
      "namestring": "Rhinella poeppigii",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-6",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-12"
      ]
    },
    {
      "namestring": "Albertus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-7"
      ]
    },
    {
      "namestring": "Magnus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-7"
      ]
    },
    {
      "namestring": "P. adiastolus rhabdolaemus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-7"
      ]
    },
    {
      "namestring": "P. albertus venter",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-7"
      ]
    },
    {
      "namestring": "Pristimantis peruvianus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-8",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-13"
      ]
    },
    {
      "namestring": "Scinax",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-9"
      ]
    },
    {
      "namestring": "P. cruciocularis",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-9"
      ]
    },
    {
      "namestring": "Pristimantis (Pristimantis) unistrigatus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-9"
      ]
    },
    {
      "namestring": "(Pristimantis) unistrigatus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-9"
      ]
    },
    {
      "namestring": "Pristimantis minutulus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-9",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-10",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-12",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-13"
      ]
    },
    {
      "namestring": "P. ventrimarmoratus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-9",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-14"
      ]
    },
    {
      "namestring": "P. minutulus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-9",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-12"
      ]
    },
    {
      "namestring": "Pristimantis rhabdocnemus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-9",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-13"
      ]
    },
    {
      "namestring": "P. martiae",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-9"
      ]
    },
    {
      "namestring": "P. rhabdocnemus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-9"
      ]
    },
    {
      "namestring": "Pristimantis cruciocularis",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-12",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-13",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-17"
      ]
    },
    {
      "namestring": "P. flavobracatus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-12"
      ]
    },
    {
      "namestring": "P. ardalonychus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-12"
      ]
    },
    {
      "namestring": "Pristimantis unistrigatus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-12"
      ]
    },
    {
      "namestring": "P. ockendeni",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-12"
      ]
    },
    {
      "namestring": "Pristimantis frater",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-12"
      ]
    },
    {
      "namestring": "P. fenestratus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-12"
      ]
    },
    {
      "namestring": "P. danae",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-12"
      ]
    },
    {
      "namestring": "Eleutherodactylus lundbergi",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-13"
      ]
    },
    {
      "namestring": "Phrynopus bracki",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-13"
      ]
    },
    {
      "namestring": "Phrynopus bufoides",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-13"
      ]
    },
    {
      "namestring": "Phrynopus paucari",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-13"
      ]
    },
    {
      "namestring": "Phrynopus pesantesi",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-13"
      ]
    },
    {
      "namestring": "Pristimantis aniptopalmatus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-13"
      ]
    },
    {
      "namestring": "Pristimantis bromeliaceus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-13"
      ]
    },
    {
      "namestring": "Pristimantis flavobracatus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-13"
      ]
    },
    {
      "namestring": "Pristimantis mendax",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-13"
      ]
    },
    {
      "namestring": "Pristimantis ockendeni",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-13"
      ]
    },
    {
      "namestring": "Pristimantis ornatus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-13"
      ]
    },
    {
      "namestring": "Pristimantis pardalinus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-13"
      ]
    },
    {
      "namestring": "Pristimantis platydactylus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-13"
      ]
    },
    {
      "namestring": "Pristimantis sagittulus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-13",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-17"
      ]
    },
    {
      "namestring": "Pristimantis ventrimarmoratus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-13",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-17"
      ]
    },
    {
      "namestring": "P. altamazonicus ockendeni",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-14"
      ]
    },
    {
      "namestring": "P. playdactylus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-14"
      ]
    },
    {
      "namestring": "Stipa sp",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-14"
      ]
    },
    {
      "namestring": "P. bracki",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-14"
      ]
    },
    {
      "namestring": "P. mendax ornatus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-14"
      ]
    },
    {
      "namestring": "P. altmazonicus croceoinguinis",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-14"
      ]
    },
    {
      "namestring": "Pristimantis orestes",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-14"
      ]
    },
    {
      "namestring": "P. atrabracus corrugatus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-14"
      ]
    },
    {
      "namestring": "Huancabamba",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-14",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-16"
      ]
    },
    {
      "namestring": "Cajamarca",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-14"
      ]
    },
    {
      "namestring": "Cecilia",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-15"
      ]
    },
    {
      "namestring": "Eleutherodactylinae",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-15"
      ]
    },
    {
      "namestring": "Brachycephalidae",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-15"
      ]
    },
    {
      "namestring": "Amphibia",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-15",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-16"
      ]
    },
    {
      "namestring": "Leptodactylidae",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-15",
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-16"
      ]
    },
    {
      "namestring": "Strabomantidae",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-15"
      ]
    },
    {
      "namestring": "R. von",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-16"
      ]
    },
    {
      "namestring": "Naturales",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-16"
      ]
    },
    {
      "namestring": "Eleutherodactylus mercedesae",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-16"
      ]
    },
    {
      "namestring": "Pristimantis avicuporum",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-16"
      ]
    },
    {
      "namestring": "Divisoria",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-16"
      ]
    },
    {
      "namestring": "Pristimantis lirellus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-17"
      ]
    },
    {
      "namestring": "Pachitea",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-17"
      ]
    },
    {
      "namestring": "Pristimantis martiae",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-17"
      ]
    },
    {
      "namestring": "Pristimantis rhabdolaemus",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-17"
      ]
    },
    {
      "namestring": "Ruanda",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-17"
      ]
    },
    {
      "namestring": "Castilla",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-17"
      ]
    },
    {
      "namestring": "Pristimantis skydmainos",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-17"
      ]
    },
    {
      "namestring": "Eleutherodactylus karcharias",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-17"
      ]
    },
    {
      "namestring": "Pristimantis toftae",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-17"
      ]
    },
    {
      "namestring": "Panguana",
      "pages": [
        "b9258f9214ba9e63ebfb9296a4a8d87c7c2281cd-17"
      ]
    }
  ]
}';

$json = '
{
  "_id": "bf68a7802706e83e7beaff0dff49b567",
  "_rev": "3-c1775ea228d421f3eda7baf2af53f9d5",
  "type": "article",
  "provenance": {
    "mysql": {
      "id": "773733",
      "modified": "2013-05-13 15:18:17"
    }
  },
  "citation_string": "(1989) Cosmocerca panamaensis sp. n. (Nemata: Cosmocercidae) from the Panamanian poison-arrow frog, Dendrobates pumilio Schmidt, 1857, with a discussion of prodelphy, the type species and family authorship in Cosmocerca Diesing, 1861. Proceedings of the Helminthological Society of Washington, 56(2): 97--103",
  "title": "Cosmocerca panamaensis sp. n. (Nemata: Cosmocercidae) from the Panamanian poison-arrow frog, Dendrobates pumilio Schmidt, 1857, with a discussion of prodelphy, the type species and family authorship in Cosmocerca Diesing, 1861",
  "journal": {
    "name": "Proceedings of the Helminthological Society of Washington",
    "volume": "56",
    "issue": "2",
    "pages": "97--103",
    "identifier": [
      {
        "id": "0018-0130",
        "type": "issn"
      }
    ]
  },
  "year": "1989",
  "link": [
    {
      "url": "http:\/\/bionames.org\/bionames-archive\/issn\/0018-0130\/56\/97.pdf",
      "anchor": "PDF"
    }
  ],
  "file": {
    "sha1": "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b",
    "url": "http:\/\/bionames.org\/bionames-archive\/issn\/0018-0130\/56\/97.pdf"
  },
  "thumbnail": "data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAACaCAYAAABfeu09AAAABGdBTUEAALGPC\/xhBQAAAAFzUkdC\r\nAK7OHOkAAAAgY0hSTQAAeiYAAICEAAD6AAAAgOgAAHUwAADqYAAAOpgAABdwnLpRPAAAAAZiS0dE\r\nAP8A\/wD\/oL2nkwAAAAlwSFlzAAAsSwAALEsBpT2WqQAAQDxJREFUeNrtvVlvZEmWJvbdxfd9pdO5\r\nx8KIyIjImqrKrlKrZtEA0ov6QYBeBOixf0a\/zO\/oVz20gBlIgNASBoKggQBJM2qppqpyX2JhMIJ0\r\n0umk7+v1u8zDte9ccwaXyMiqzKxRGkC40\/0uds3O8p3vHDM38FP7wVuz2QSABoB\/Yf7QnfmprTTj\r\npwn5kbWfJuRH1n6akB9P8wEsf5qQH0+bADj5aUJ+PG0BoGtf9Y2CYQBgAAi0ry7\/r39mqD9ffW5e\r\n+j8AgFar9UM\/+I+1BQCm9g0HlAE8BdACMAbgAriv3hsA5gBsADH1vg+gAsBS52QB3APQUZ89AzD6\r\noZ\/6R9wCAP5NJssHMASQB1BVJ4wBJAGkEE3KWB2bBTBTn5cRquAzAFMAA\/X5T+3m5t+kIR7CiVgC\r\ncAB0AfQA3AWQANAGUESoFZ8gjDSHCCeppo75HID\/k5l6pxYAGN80IVMA\/4DQJAHhpMwBnCP0D9Sg\r\nY4QT1VMXtQAcITRxPn5q36YFV06IkmgP4YBfbkvt\/eyK712E5uqn9u3bT9TJj6w5P03Ij6ApixQA\r\nWFzrQ7RYhP7iTxJDqPsY6j7edfdQx1nqz1N9Cq46XjvWRuj7gpv6rh3PgfERxVWBus5SHwN1jqm+\r\nD\/5YY3MlFNUm46E6povQL1gInfziUmdtNUhAFJ8k1P9x7bOUes97x9SDJgGkAbxQx6TUPdoAdhD6\r\nqi6AfYSx0BmAU3XtOELonVb37KvzfqnOWaq+GQAy6lgOuqn64CBEiUl1\/LHqY0Id9wGAz9T7NMJ4\r\nagzgNwjBzGsAJwAW7zsxasz\/+U0oKwHgI4RI679UD55ECHN7quND1UETISqrAPh3ALYRwmOiLlc9\r\nNGOVNIALbUIW6nWqhOAD9YD\/E4Bfq3P+nRq05wB+BeBnqk95NeCO6vcSwL8CUFL9\/MdqghMACuoz\r\nW01qUgnITL3fUIOeQBhDnSMMbGsA\/hGAJoAcgEMA\/4\/6\/4l6lv8efwQwc5OGGKqDrupgoP3Z6nNT\r\nvS4RacUQYYR+oq7hqIHjwFvquKkaSAqFHng+QqgBJ+pcSw1aBSEJ56nPffUdNYr\/DxBJP80P4buH\r\niP6JIWK8XUQWIFD9jakJjGvHW+q7mZocjuFEvTq4wfRe195FQyw1+yMAX6hB5MMkEElkDKHk9rXP\r\nBggl87dqgAmFs+r7c4RSx\/sv1UOXEZqbbTWQtN2GOr8D4K9UHz5DZD4\/QKg5c9XnI0RSP1fPMAWw\r\npf431P1iCDV5hlAjOgD+E9WHserHK3WdvOpPHKF2WAgtSFWNi6ee8\/9T93+vdtOEmKqzpwD+c9V5\r\nF6u+Io3IHtPh\/r8IzQEQ2tgMIg3jNT4F8J+qBx+qY5Jq0P4H1a8MgMcItSIH4F+rQc8jND2bCM0S\r\nlCBsqfMKCE3aUE3mBMCB6vdfqj731HFtRJqxDeB\/Vv\/\/ZwBeKkH7uerLSPWxqybrCwB11YepGqdD\r\n1Ve72Wy67+NPbjJZJkIbOQGwjsjc+NpD6BJsIPIrrrpUCpFZ4718NYBFdU3yX66aNEcN+kxNYAbA\r\nHkKteo1Qy+bqO5pJsghESjrCokndVIMaINISHVFZ6vuUek8EZWv9I3hJIdSmtDaOS3VMSX33rSbk\r\nXUwW1IDlVEdKiNBEWnX6V6ojpwgZ3piSItroDYRSSKn0EaKmuLrmAwD\/Xk1iSgnAEULJ7KhBPECo\r\nGR2EGrOLUDonasB\/DeAbNcj0JX1EpmeoPluo\/pC57qhnK6j+bqnrHn+LgXSu+OzknWfhinabD\/mv\r\nEUpKUh37EKH9\/OcI1XtdPdAvEUrJKzXgS0TS56nj\/nd1ncfqfUEN6i\/VBNXUNTqITM9CTUoPwP8N\r\n4A5CwPBATdL\/pk3krvquC+Bfqvv+GqEmTtTEzNR9JgB+hxBCf6gG1kToR37QdlscUlKDlUaEmAhv\r\nj9XrFKHZsNUAxhHFKZ56UMJiXw3gBFHASefKuGCpBjGNKK9iIjQnjppU9n2A0KSl1GtWCcVY9amo\r\nPutiFSHOVR8TWEVrPQDLH4KdVmP+T27TkKcIHXQbEUS8px7sVE3KU\/UaIHSMSYSSZqmHrSLyNRcI\r\nJfUDRBj\/qbqWo67BCeiqQWY2soQIUAwA\/FPVJ\/oWqElcV\/c6R2g+foNQC+Jqgi0AfwAwaLVaDFJ\/\r\nLG1204QYCM1ACsB\/hchh9tX7EoD\/Sw3ohwDWEJqEdTUISzVwaUQBoI0w2PsnCO34\/6LO6wH4L9T1\r\nswgld4DI0VKTF+r4\/1Edk1N9fIJIG1MI4fO\/B\/C\/ItSSHEJgkFfXZUzyY2vBTRPiqwdaIpLAQA06\r\nKYilGtSMGjwHUdDI4CquBrSg3r8G8Hfq+j01QC5Cu6\/n64lyiGA8RMiqh1DbiHyYuyf0vqf66QH4\r\nP7Bqmn1E9M2PrVnfOq2qRfHAO5Jqmk8C8FOhw1VNjdE\/\/SnP\/SNpakL+2U1lQCZCiDhClCVkAEj6\r\nu4zQdGQRmi2aIRuRz6FZMRGaikD7n3RDBassLBvNloUwhjhAaPaK6jimkw3teFIuLlRG889JI2\/y\r\nITGEXE0PUYRuqHPI\/fwaIVUSR4h6Jogc+QSh4zUR+ZzPEMYpRFJ9hD7l1wgnZ6nOGan\/SXWfIqQ9\r\n+uq8f4zQwbOogs9BYZmr1z\/gzyuv79wUh1gII2ZXDTijUjK1E0Rc1gQhgqEGQQ0YmdS0Gpg+opiG\r\ngzdBxGUtEYEDapKn7pdFFHETRPjaKzXO0a4\/hPJzl\/2Y3q76\/vvWKnX\/D26bkHWE0kZTQ46H2gI1\r\nACk1oKTfLweFJiJeaYGQlFsgQmMWIvKRQVtZmxxqJq\/PNkBoVtNqsmlKFwg1caL+CJ8Lqi8s8HOx\r\nymsRDRrqvBjCWGn8p54gNeYPbgsMNxHxVtQE+gfmH84R+ZIaQq2KIcohkCQsqof7Sr3nRPmI\/A\/N\r\nyynCeKOvvquq6yTUvQIlAEeqP2vqmIESjjcINWoNYYDJCXHV9zV1bFKbxATCwNFGxN+l1HHfV0vd\r\nNCFLhHwPVGdJvV+u7fUR0s4+QtqCjpjmisdnETnavnY+v6fGMaXK6J9lqFfVFDP+eKldi8Jzrn3G\r\nnD01+5tL9ze095fvcfmzP2UzfoK9P5KmTNbPb6Pf3+UiUjECvJ8zvFxtf6myA4ik\/irERNjr3XAL\r\nqQ7BqjaY2jV1jdO11cU15bDa8wfa68oYXDrm1vG5LafeQBgjMH8+RpTPniAkHusIERaZXrLCzGPT\r\ncSYQ5asvDwwHgueR6S0gdOL31bm8PxNKPYR+gNUgHHjyZlDvmfueIURsrFS5g9BHEDoX1TEBQnr\/\r\ngTqvj6g2gNlPxlUVNQ6E7UBUEMJxY+nSMYDpDZP7i9ucek39DbWHXiDKvEHdaKQemtKaQCS1dI6E\r\nuxysBSKnevmzEqI0sI0QMLDcKEBU+BBTfWPJkaN9T40isrO1Y4gWmawy1UTwc0ede4TQ93ECWKzB\r\n54sh0kwDUWogo553qp2TRBQsX9dSt5GLJwgdZlE9UBdRVtBQEnSmOksYy2u6SvpKiDSAJTcZ1Uk9\r\nB+Ig1DoXUWxCtqCHqECCAaWJUDNNhKgqof5fqu97iLRSTzNb6jmYhqXJHSGCz0CI5vKI2OYRQm1g\r\nTp3ndRHVjNmq72M1mT5CpDdWx7Iy5bpm3ka\/M7uWVx1ksVlOO66L0GxlNGlh\/t1T37URYfyckpoZ\r\nIu3xVafjiOIAxiiGOsZFtDyCkDqjBvwMkSmcqGsXEUF23iOhvosrQRkhyvNM1TXr6u9zdVxFPcdM\r\nXbumjmMun6bLU30vqM8TiLRphtUi9etacFvGkA8ErNp6miaqMqlx0iWsoSqqCXipjiWFYqvXvHro\r\ngTqWkzlRg8\/FQIY6lpM21+4DRMV4lNoAUWAa0\/o6VwM2RlQfNtPO42TzPceHBRRFRHGVpa7D+9Nf\r\nLhDBb0M9v6+ecYZrih\/exYfEESae9CI5OjY9Jeuovx0Av1eS10WYEGIE7yEM9jYQRd2HCDOMXdXp\r\nhjpuoY7l8jkW0BUQUSkn6t5VRBUmQBTkET3pi46WCDUijpCBOEOYN+EqsKK61nP1uquuSX6Ofimv\r\n9ZU+KI2owuZYjVkFkVak1Hj9Hlcv8WDzb9IQFhpQLYFVpMGkkYco0h4iysZR+vTKRA7oQj1YEaHD\r\nphmhdKcQOXpG8GQHLvuDHCKT4SMyE+wXaR+9ApL9JZeWQ4TekmriiI5oBqH6zBInPqup9QeIuD9q\r\nyVy7zhg3F4j\/o9t8yJ42+DQdRBsLRKVB5Lxa6hw6waH6f4nIsRUAfK3+L6vvDxBWjiwROW9WOjKV\r\nSzR2qs4jsMgo6aMWH6n+ENbOtAkrITIfc\/X\/C4SaaiMEB9va5HB8iPjS6pk6CLVkF6sUEF+nmnCd\r\nI9SWAKGGcEKvas5NE+KqgaODNVWH5oiK33LqgVtaZ+jAaMMnanIYgBURsbIv1PVZ+RcgYpB5X0Ln\r\npXaNC0Q2Wg8WA3XOBaJYhhNFIeP\/SXXPkXY9HyEA4f3JhS0vnct7faoJKjWZVkB\/hu4Vfb2qLW+a\r\nEBuhXzhHWFJK5z1GKL1ELmmEUmooSSL5x+rClHpwEoSk2lnErefVWT+bRmROUtqAQUnba4TSzXw6\r\nNZaVLscIJZiaxUlPqD6y+rGBSHtriJy0o+6xhUhjfK0\/NEGE+Sx7miAqvGPyjf6Dk9i7Yczjt8Uh\r\ntO8vEKEYnjNG5CQpDXP1ILT9lCZLSR4LoIlI+PCUKFs7XpcmFk+wGI+OH4hsPdQ1Y+o+R3i73ovx\r\nEjOKrxDB6hZCc8Q+LBAWTuvPp5sbfWMEpg6AUID1slsGyMwj3dRit\/mQ+2qQlwjtfB6hfeZaj08R\r\nxSpriMxUAZHdJiTtI5RIQk5KGsv7dXUnhZLVHlhPXjGrWNCuRcFZQ0jxv8uSAFaf3IR8bhvEP2ab\r\n3aYhz9XDcqB7iBJBlPIOogU5dPgeQtNAasFFVKA9Ucdk1Ht9IvT3+kqlhHYNINQyB5FvoiROEa1L\r\nsZrN5lWEI9EQfZBeL8CongiJ6E5PO+iEJK\/h3pR1\/BYEo3kj\/a4uVEGIJk4R2tSxmpSC6ij9AavM\r\nuYsDISh5HaKsU0S5dhsRx8M6KhZM08EzudRAKNGciDVE0Jcwlbl4oppTrPoaJrkIbbOI\/EJX3WOk\r\nrplHGNA2NUHgxHgITRPPy6jj6fRpJmkdaO7bAEY3wN4P34V+XyAKApmeJTtKCSGy0ldVsRM5hNqi\r\nxy19RHEC63z5IIS5LMrjukHek2s+dDKQMQUniDB1jmjHCS6Zo+NnsGer648RMQGSukXoi+KX7kGS\r\nk2tQdEvARUQ0yWNELPdtKOvqVbhaTn1DSWQLUQzC4mYysyyApqbowVVdG\/wCIi0oIdIKOlgODtEZ\r\n4bWBEKGxMJsrocjI0pTMEJrUh+p\/aguvT8ieUeeykjKujl1HxFnRcuQRZTpZtEH2lmaX9cdTbVwI\r\nJvieBSLfCfZCDShpDwZAXERD51xAZJ7odHVHzbw0\/Q7NATWKUfQUUfEBmWELUVxiap9zDYpevppS\r\nE\/JG9SmG1WiZkXpSexY94i8iSjNY2nekb\/SVxaSDgCh\/4yO0BnwOHZE5CE0s2e5r200TwqiXg8AV\r\ntDp8ZODGxTIdRFXqpBxIX9PGU9WJ2elb0ogo+7NbpOn4hu9Yx3Vde33N5y\/w3fLnurO\/qj3DzVlN\r\nADdPiI0Q9vbUhQhvqeaMaIlGauo1hnBSiOnjCM2WjdXsI6U6i0i7YgilsAvAuWUTAWnvU198xXm3\r\nTsYt973VHN3aSdy+YIcmir5kiMguU9VpApgdiyOEnilEdDXNw4W6bh4RnOTCmaIalJF2POODlPaZ\r\nq+5VwmrORKc09JLStOrDGKumg9\/Tvpvaax6Ro6cp0k0c09RkL\/SUtL7ekj4po72\/iVy8c9NuQGg2\r\nm3SaSYSOtIvQpGwiyqOPEXFaOtG2REi9EB3RwS0Q0t5cmsAF\/Xq97xKrawbvIYo3mFql3a8g8ltA\r\nZBbI+jK5NUYIY1nbxQ0HiJwC7VxC+tcIrcIDdQ1G4WmEQIP3MbR7s+aASbivtP5\/gVs2F7ityIGU\r\nON\/zhmlEGwFQW6g5MYRmaKhJHR08U7d02ITF3EQgpY7n92WE\/oQDRAHQzR\/XJdKJXlVLpZeuGlcc\r\nd7ngQj9Hr0LxLx2PK87XtfNyNczKfilXjPmd23zIzxFl6qaICEEDobZ4avbPlTSsIcrE0S8cI0JR\r\nWTW4R+pYFi4sEPE9DK6OEdLnNJeMTZ4jWocIRMUEvXcsQfpTF755l16\/VbtNQ1hSSVtNKaTmkA5h\r\n3S4HmA9uYrXwYYoopUoyjtfQtY1EHCeIUJLcF2MFSqJubjzVb6LAy6us9GemiSQ1RNqGwZ9OndBX\r\nBAiFgfEFzSH9xFVLpaGd+94+JKhWq0MApSAInvi+7wRBcGyapoHQhxiGYSQAuEEQTCaTyae5XC7t\r\n+z6rL2KmaSaCIJhCVbbPZrPfp1KpBkJExrgEhmGcBEHgIqzc4KS5hmEYvu+Pp9Ppl9lsdt\/3\/YJh\r\nGF4QBAGAwPO8C9u2a0EQLIIg8A3DSAZB8MyyrE3f9xOGYRQ8z\/vEtm0LwAPf9ycAfMMw4kEQeIZh\r\n2EEQjBzHeZlIJAoA9oIgmAEIDMNIBEEQGIbByUl7nvfcdd03yWTyZwCSQRDMDcNYuq77O8MwNn3f\r\nt0zTTKmBN4IgWKo+zQGYpmm+ws30OwzP8\/au+9L3fbx+\/Tr28ccfZ7O5rLu1uTVPJBLB4eFhYjgc\r\n2o7jGIvFImg0Gv5f\/uVfjvv9vvXJJ59kAMB1XWM6ndr5fH7pOI4ZBAH29vZm4\/HYmkwmFgDE43F\/\r\nMBjEtre356enp\/GLi4tErVabLxYLCwBSqZRnmmawubm5+P3vf5\/P5\/PLeDwezOdzM5VKeZVKZXl8\r\nfJysVCrOYrEws9mst7297bx58yY+HA6tjz\/+uLy3tzfa39+ffvbZZ9lcLrc0DAOmacL3fcTjcb\/f\r\n78fW1tacSqWyPDo6Sriua8znc8v3fSQSCd80zaDf78dfvHhR2t\/f7\/7iF78Yvn79OjEcDmOlUskZ\r\nj8f2vXv3Zt1u1+52u7HZbGZlMhl3MpnYiUTCXy6XRjabdVutVvoXv\/jF4PHjx3Pffxshm6YZ\/M3f\r\n\/E3T8DzvykDJdV189tlnmM\/nUJIC13URBIERi8UCALBtG6Zp4tGjR0in00YQBDAM449uo9V1b\/08\r\nVBwYWh8oqVee\/y730A+57lrvcn29f1d9ZxgGvv766xMbIZx9q\/m+j0qlglgsJhezbRvz+RyxWAyx\r\nWAyu68I0Tdi2zZvJ659iUt7183f97H2O+S7Xv63Ztu0anudde6V3mfU\/Vmf+\/94Mw8Dx8fEXN5KL\r\nPw3099tM0\/RvY3sBRDbSMIwb7bl+3G3Xu9wu+4LrrqF\/9z4C47qu3M+27ZW+83P9+r7vyz1NM9rE\r\nVR+LP6bg3johjuPg2bNnME0T5XIZhUIBk8kEnuchCALEYjEEQYBsNouzszPEYjHYtg3PC8MCywoZ\r\nDc\/z5H02m8VgMECxWMTJyQlM00Q2m4XneZjP50in07BtG7PZDKZpwrIs8Vf5fB6tVguWZaFcLiOT\r\nybyzaTUMA8+fP8eXX36JbDYr9wmCAK7nYuksUalUkM\/n0W63sVwukUqlMJ1O0ev10Gg0MJ1OYVkW\r\nqtUqTk5OsLe3h93d3Xfuw3eeECKpfr+PTqeDx48f4x\/+4R+QyWSQTCYRBAFM08T9+\/cxn88xn88x\r\nGo3g+z4cx4Ft23INy7IwnU7x4MEDtFotBEEAx3HQ7Xbh+z4Mw4Dnebhz5w6Oj48xHo8Ri8XkWr1e\r\nD7\/5zW9wfn6Ofr+Pvb093Lt3750fNggCVKtV7O3tYTAYYLFYwPM8ZLNZOBMnnBjXxXg8RrfbhWEY\r\nKBaLyOfzME0Ts9kMnudhOp1iOp1isVig3++\/M8p6J6G5zqmzc3w1TVMQ1sXFBWzbRqlUkoGMxWKY\r\nTCZYLpfIZrMyUdPpFIZhwPf9lcnhn+NEgS0nxPd9uU6v10M2m4VlWRiPxygUCvB9H57nwXVdFAqF\r\nFROzXC4Ri8VgWdZbpuQ206sjRfb\/8rn6+6uO04+\/bMJvMm2GYeD09PQz+7ovR6MRfvvb38LzPMRi\r\nMSyXS8TjcaRSKSwWC3S7XaRSKelMo9HA+fk5CoUCzs\/PYVkWDMPAbDaDZVkwTXNlcre2tpBIJPDq\r\n1Su5Z7FYxHQaVt24roudnR0cHh7KZCSTSaytreHs7Aye56FareJnP\/uZ9Hs+n+Pjjz9GqVQCAGQy\r\nGcxmM7iui0QiAcMwMJ\/PkUwm4fs+ksmkaEkQBMjlcvA8D+PxGPP5HPl8XoTS931ks1kkEgm0220k\r\nkwlkMlm0Wi2sr6\/LM1qWhX6\/j0QiAc\/zYJomEokETNNEsVgUv3VVi8fj15eSWpaFvb09pNNpWJYF\r\nx3HkoVzXBaNNRr2pVArr6+uIxWJoNBqIxWKYTqcirbZty8NxEhOJBAqFAqbTKZLJJGzbFo1zHAfZ\r\nbBblchmu6+Ls7AyZTAaFQgH1eh1BECCZTEp\/6aQ3Nzfhui7eHL1BdprFfD5HIpHgAyMIAkwmYe00\r\n77dYLMRPzedzeJ4H27YxHo9FY\/XJDYIA\/f4AiUQSjuPg+PhYtCGfz6PX66FWqyGfz6Pb7eLs7EyE\r\nmT73Ko2KxWLX59RpMylBrusilUqh2Wzi1atXSKVSb5kIx3GwtbWFeDyOVquFra0tHB4eYjabYXNz\r\nE5Zl4fT0FJZlicYFQSAdff36tUhtOp1Gt9vFfD4X0zQYDJBMJjGbzTCfz7G1tSUP8+zZM9GuSqWC\r\nfC4vCIlmrtPpIJlMIhaL4eTkZAVBWZaFyWQC13URi8UQj8eRSCTw8uVLVCoVQVmLxQKFQkEE7u7d\r\nuxgOh8jn8zg5ORGh8H0f4\/FYJjOTycjzXmeVXNe1b41DDMNAIpFALBaD4zhwXTd0go6DVCoFy7JW\r\nJNVxHIneKTGM8hOJBJLJpKg2pToWiyGTyYgJTCQSsG0bk8kEhmEglUrB933EYjHxV47jQOeELMtC\r\nPB5f8T\/8jNcsFAoAQpTHc4kIaV6IumgRms0mptOp+DrLskRQZ7OZPHsQBEin05hMJgiCAIvFgrQT\r\nfN+H67poNBo3DTdc17UM13WDqxCC53kYDAYwTVM6nE6nMZ\/PxfkuFgukUqkVCDyZTJDJZGDbNjqd\r\nDjKZjHTUcRzU63Wcnp6iUCiI+XIcB\/F4XOyr67piFpPJpICCRCIBx3GwWCywWCxQKpVkwo+OjnBy\r\ncoLZbIYgCPDRRx\/h5OQEFxcXuHPnDg4ODkQoaBYrlQri8TgODg5EKDY2NtDv93F2dgbXddFsNtHv\r\n95HNZvHy5UtkMhnUajVUKhUcHR9hOgnNcrVaRTqdxldffYVkMolms4nhcCgTDQDb29uIx+NXToZh\r\nGOh0On+41qlPJhP87ne\/QzKZRDwex3w+R6FQkEEulUrodruYTqcimaZpIp1OwzRNQRZHR0eIxWJi\r\nly3LQqfTQavVwmKxQDabFf9CU0kpq9fropXL5RKbm5tot9sAgOVyCdd1kc\/nAQCFQkEAh+M4K\/FM\r\nPB5HsVgUjZjNZiJItm1ja2tL\/Nx8PsdyuYRt20ilUkgkEsjn80ilUmg0GlgsFlgulwiCAOVSGaVi\r\nCclkEpZlIRaLYX19Hf1+X8zueDzG8fExYrEYNjc3bw0kr9UQxgfpdBqxWEw0hVJtGIb4D9d15SF1\r\nSEl0M5vNxLHSRPAYDtBkMhFfQo2g3Z7P57AsC7lcTmyzYRgiLADw7NkzdLtdCR5Ho5EMbjweR7lc\r\nlpjj1atXyGazKBQKaLfb8nzFYhG9Xg+O44gpXl9fF7\/HYy4uLtDtdgVgzOdzAQqZTEbMuuu6mE6n\r\ncF0Xtm3j7t27N2rI+fn57+2r8DgH+9mzZwiCAPF4HI8ePcKLFy8wGo3Ewbuui8ePH2M+n2M4HGI4\r\nHIr0eJ6HZDKJJ0+e4Msvv4TjOGLb9fbhhx+i3W7j4OAA6XQaQRCIWaHGjEbhr+3t7++jWq3ik08+\r\nwWKxwM7ODu7fvy8DQbOWSqVQLBaxWCzE\/KbTacxmM2QyGezu7sLzPBQKBYmHOFn0V3yORCKBer0O\r\nwzCwWCxg2zaSySTq9TpisZiAjNlsJr6JMYg+Gaenp9jc3EQikbgWZSWTyfmVJosdefDggcQNqVQK\r\ne3t7EsFmMhl5mHK5jFQqhXq9LpSJ7mj39\/dF6qgV8\/kcvu\/DsixsbGygVCphsVhIIEUtpCnzPA+J\r\nRAKWZWF\/f1+kkD5nNBrBcRz0+32ZSAIMACgWiyJc9FW9Xk9iJrIC1NJCoRDC5zdvhCoyTROZTAa5\r\nXE7iqlevXsn1ptOpwGQ+K4WCYOamdi25SA25uLgQdR6Px8hkMqjX6zg+PobruvA8D+vr6zg5OcF4\r\nPEYqlcJoNML+\/r7Y0VQqhVevXsGyLKTTaYnYe70e0uk0DMPAxsYGHMfB0dERPM+TIPHu3bs4OTnB\r\n+Xm4sU+lUkEQBDg+PkY2m0WlUpGJpxRPp1OBm+l0Wmw5B00PcBnrLBYLuVYsFkMikRDTkk6nBZ3R\r\nt+TzeZoYCR6n0yny+bxot23b4k9930ehUFjJG13nQmw648ttMpng8PAQ6+vrAuM4UQcHB6hWqzBN\r\nE8vlEslkEqenp0Kt0EfM5\/MVc9JqteSBLMsSJMfImtwYSUjCS3JZk8lE\/Aj9A2Fnu92G7\/vI5XLo\r\n9\/vo9\/viYOPxuAR0jNRrtRra7TYKhQIqlQpOTk6QSqUwm81w7949HB8fYzQaie8aDoeYzWYC51Op\r\nFJbLpSBOaheDQI5rPB4XZEhhu9Gpz2az4CpHs1wuMR6PYds2ptOpSNxwOEShUJDO8eaUVNpQqjQl\r\nkVCWD0QwQJPY6\/WQz+dlUshXkRcj3DZNE67rit\/L5XIIgkD4NaI4xi25XA7L5XJlMBkIWpYlQZ3+\r\n3MlkUpw0Tdx0OpV+AcBwOJRYhwFyPB7HZDIRrYvH40gmkxgOh0IXMQN7VZvNZv\/Wvi43MZ\/P8dln\r\nnwk8JIMbj8fx9OlTnJ+fw7Zt9Pt9iWBJHAIRvHzw4AHOz88xmUwEMsZiMRSLRRksTv7FRVhpSlSV\r\nSCSwubmJ6XSKTqcjJokTX61W8eDBAwDA+fk5DMPA7u4uRqMRhsMhFosFPvroI7x58wa9fg+2ZQs8\r\nTSQSePr0KV68eIGXBy+RiCeQy+WEDOWkP3nyBO12W65fLBbRaDTw5ZdfSixFn8uJaTabePPmjSCz\r\no6MjFItF0aQbbdZkMgn0SJvNdV30ej1x3pQOx3GQz+cFhQCAaZlAAFFh8jX0MwCE7+KD0iwxaqc2\r\nUosoebFYTMzlYrEQDovHpVJhsWOn0xHzyLhFj+o5QcViUe6fSqUwn88xnU6xXEa10PRtfL9cLtHr\r\n9WBZljAKw+FQ+kDrQPNVqVQwGAwkECUcr9frN5KLs9ns39pX2TWytJ9\/\/jny+Twcx4FhGNja2sIX\r\nX3yBZDKJ+\/fvo9\/vYzQaybk0P6ZpYmNjQ6Q6Ho\/j+PhYYoFEIoFarYaTkxORrPF4LH4lHo+jXq\/j\r\n7OxM+Knd3V08f\/4csVgM6XQaruuiVqthZ2cHQRCg0+nIpJDq8TwPw+EQOzs7GI\/HaLVawujG43Es\r\nl0vk83mUSiWcn5+jWCzi9DRayUBB3N7eFgKRppDMc7PZvDIXUq\/XAYSINZPJyPtbWmD0+\/2A9MNl\r\nH9LpdETSDcOQ6Nz3fdRqNXG6elqUqKJcLmM0GkmwSOioZw3H47HAW2fpIGbHhPdhcEefVK1WMR6P\r\nMZvNJB2Qy+VQq9Wkj4vFAufn5xIc8nMiRXJLhODkzIAIVpPx1XMYqVRKTC6vxb9kMol0Oi1WgOZe\r\n5\/Ookbclsebz+W\/tGz2+ugDt3ng8loibeL9SqcD3fXz11VeIx+OoVCqoVCoirURcHCBOTLfbRSKR\r\nkOg48EPp46RTYzjJvB8ll5E6+0nne3R0hE6nA9u2BT0RtDCDSa3b2NjAYrHAaDSS4xl1UxNIG9H8\r\nkbJJJpNIpVI4Pj6W5RsUBnJgo9EIs9kMhmGgVqvh3r17N5osy7KeXBuHMAdByWK2LpFIYDwei4Tb\r\nto1qtSoS3el04HkePvnkEzSbTQQIMJvOsL29LRGr7ghzuRw6nQ5Go5HQJq9fv0Yul1thBYhacrkc\r\n4vE42u22QOggCDAYDBAEARqNBprNpkhpMplELpeTQJRmiJrq+z42NzcBhIiq2+1KQFur1eD7PqbT\r\nqWgT\/RhZ5HQ6jXQ6jX6\/j42NDWHC8\/m85HLUYMs9r2umaSaNTqcTMODS22KxwPHxsUBRnZElJI3H\r\n45JfpjRls1mcn58jCAJBFtQ0PhiLHGgO2GHmXXjscrlcybLxvkwmeZ6HUqmEIAjw5ZdfotcLy2b3\r\n9vbw\/PlzeJ6HcrkM27ZlAknfJBIJDAYDCTA7nQ4ePnyIw8ND9Ho9+L6Pu3fv4ujoCMvlEo7jCLWz\r\nsbEhzHI8HsedO3fw6tUreJ6HRqOBw8NDeXaatlwuh3v37t1otjzPg3FychKsra295dQHgwH+8Ic\/\r\nCJxllDkajbCxsYHpdIpms4nZbIbj42MkEgmUy2Wsr69LivXs7ExMHPmhVCqF3d1dHB0dod\/vi9mp\r\n1Wpi5tbX1zGfzyXncnZ2JpPCbOJisUCz2cSTJ08QBAFarRam06kwtERZyWQS0+lU4hD6F\/pJXpPO\r\nl4EoQYHjOCIoDPQYp9A\/MO1g2zaGw6EI9NramphYPSC+rvm+f\/WEcLZ4U9\/3Rd273a6QcDq85QWT\r\nyaRIlA5RicFpeijlerA3HA6FJ6KTDYJAJNHzPAnAHMdBLpcTMvDly5eYTqfodruwbRu5XA4XFxfI\r\n5XICj2ezGYbDIXZ3d9HtduW6fN5Go4FWq4Xlcom1tTVMJhOMRiOBvkEQoNls4uLiQrSv0+lIEiuZ\r\nTGI0GqFareJ3v\/udkJfMxz948EAC3Wsn5OjoKGg2m29pyGg0wrNnz7BYLARJUALT6bRQDb7vi3Qw\r\nYFsul+LsSUR+8803KBaL2NjYwPPnzwXru66LcrkMAJI37\/f78H0f6+vrqFarOD09xcbGBi4uLnB2\r\ndibXvXfvHihMJAqZSSRZSYkkfUIhIsPQ6XRWijVYkEDzyIl3lk74PpsTQYrFYnjz5o34xPX1dRFA\r\nIjnbtkWIq9XqjYFhEASw9YBIb1RvOkUWwMXjcaTTadRqNTEfo9EIpVJJJgQASqWSSFUymcTOzo6o\r\nOLN1lP5MJiNBFwlJIKRFMpmMBHPlcnklfatXHnY6HUE\/vV4Pz58\/RyqVwtraGlqtliSj6NOy2SzW\r\n1tbQ6\/XQ6\/WEpd3a2sJyuZTInPmck5MTSUV7nodMJoNGo4GLiwvRAIYErNUaDoe4e\/cu2u02TNNE\r\noVC4Ma8OAMbBwUHA4ErXkPF4jIODA2xvb6Pb7SIWi6HX6yGXywklEIvFMBgMpDKFrDCdNGOXXq8n\r\npmG5XAr9wWj59PQU1WpVzGI+n8dgMJBrUGj0SaNNpm\/rdDqiEYSmHMzNzU0J+CjBnFA+l2EYUpXJ\r\n+5IpiCfiCPyoWmW5XCKTyQhnF4vFpPLy8PBQBI6M8Hw+h23b2N\/fF596rYbc5GBYf9XtdrG2tiYl\r\nLZZtwTRM3L17F6enp4jH4yv5kVarhXg8LtCw0+mI9nAwHMdBMpkU6v309BSTyQSxWAxra2s4OjqS\r\niByAmJtqtSqUTiqVEi0hw6uTfXTCy+USL1++RC6Xk+CP0JaVMNlsVhAj\/Rvjjnq9jo2NDSmp9X1f\r\nBpqT9vTpU6lGabfbWCwWePr0KY6OjjCZTJDP59+N7b1KQ\/QJ4XtKr57KTSaTGAwGgjx03orHM0od\r\nDofiN\/g9gzQmnmjrB4MB+v0+yuWyDBr9DY8bDocoFotiAlqtFmaz2crkMYZiVi+RSCCTyUhgyMRb\r\nt9uV4jkCE9M0RUszmYzESUAIyev1umguwQe5LKYrcrmc9CkWi62st7lWQ65je0ejEV68eIHBYCD5\r\nDEasu7u7OD4+Fn5pPB7j4cOHmM1mUnA9n8\/FF5D2oDkg\/cEJJ41hWRY++OADscMvX75EoVBAuVzG\r\nYrFAu91GsVhErVaTGIX9XS6XYrspHJ1OR5JNRHpkqOkjqRUkA5lL7\/f7MulMUbueC3fprhCGBDXM\r\nTtK\/MWnV7XYloNUF6FoNef78eXDnzp23DnIcRySEDzSZTCT+YN6AnaXDXS6XKwEc2VzSJnq+hJPG\r\nnDcHV4+IOWEAhEtKp9Ni8uhDDg8PMRqNJJfP79gfIiO9CCOfz+PNmzdSfV8qlTAejwWy27aNYrGI\r\nwWAgdVocG0p9NpvFZDLBeDyWWIr5F1bFn5+fY2NjQ\/zKjRpy1QJEStyrV6\/EjpM0i8fj+Oabb8RJ\r\nb25uotfrrZS+sBSH6kn42m63pUY3CAI8evRIctrpdBpnZ2c4ODiQbByPI7uaTCYF9s5mMzQaDezs\r\n7Mgk60VuzHswU0htZDxDRFQsFjGbzSSQHI\/HGAzCH9Upl8tCy1AgaJYASCJqNBpJ7EUto6+iEOtI\r\n9FrtMAzYpNYvawj5ewAS5epoSq\/0o8awSI41sQBW8siNRkMGjBOczWbl\/pZlSXkocw2kvEm50CSQ\r\n3NOrZhhhs9AZgETqPIZQnsjs7t27ko85OzvD+vq6ZCoBSPkqNZeayUGnqc3lcuh2uyiVSuKXCDjI\r\naTEnf5PJsoliLqsObwhA0MF0OkWxWFypqqDUXVxcyEPSzne7XdRqNcznc+GHCAwsy5KcO8uGut2u\r\nUO8cVEbZuVwOrVZLqkP0Igeez7UkLIwmoUhTp0svwQVNK8EHpTyfz0t6gWkECiLXuVBb0um0pGo9\r\nz5OyIJpK3v8dVlv1bar7ZdWZTqf44osv5EEqlQo8z8Pr168F67O4miU2juPI8gMiD7LGHBxGtdQS\r\nIicGh4vFAkdHR+J3+GAfffSRLAhiZToLJDi47NfBwQE2Njbw4sULITnL5bJUr0wmEyH8Xr9+LfC5\r\nXq\/j6OgIs9lMAj4OOCtmOPEs7CDpaJom1tbWMBqNJFajKaR230S9q\/axfd1ik2w2iydPniCVSond\r\nJapgcOc4DjKZDLLZrKgxpYhmhywxAz\/GJ1xHwVVJjDE4AQy0mDBifr3dbktNrv6ArGpPp9NS1E1z\r\nRKQ1mUwkP0F6n2QkIXqlUpGCBj4PEKaGl8ulaC3rwgIEsMxI6\/jctAZEX\/RltzTP9jyvh3DvDnH\/\r\nhL3n5+eSvuz1elgsFpLDmEwmOD4+FmxNVMQ17KPRSOgOlmcyes7n87h\/\/z7a7TYGgwHy+TyGwyEs\r\ny0K320Wj0UC73cbLly8l6JxMJtje3sZoNJLrPX36VISl3W6L3yEAYK3U559\/LusRWUZKP8KKSk6A\r\n4zgSpxAoNJtNnJycSPX6xcUFJpMJNjY2EIvFMB6PkcvlcHR0BMMwJHClEL18+fLaisW3fEi32\/3X\r\nAP4baD\/Hw9VEhLz1eh2NRkMWYTKL1mw2VzYRILK6jCS4XkJHQrZty\/pAYnnLsrC5uSmD\/MEHH4h5\r\nmEwmSCaTojnkvAiht7e3JUilplCyd3Z2pCToyZMnErEzaGSyzLIs9Ho9lMtlMZmMSxikxmIxlEol\r\nYZppJkkDsXaM5GMymUSpVBIfcuuEeJ7Hn3NY1R3PQ6\/XE8llpm19fR29Xk+KlD3PkxJSmoeTkxMA\r\nEFUdjUbC\/VDls9ksRqORLAxi8gdYre8iomo2mzg8PMTFxYWs99AHjtCz3++vLGEjsnFdF5ubmzg7\r\nO5Njad83Nja4tQUWTght9\/b2JMfSbreRSCQk8ca\/i4sLWLaFSrkicQ3TtUdHR5jOpkhnwoVH1Wr1\r\n3TTkui\/oL5gzYFBFKrnRaIh9JB1OyoHHsrguk8kIoiJy0enwfD6PWq0my48ZR9B+U\/uKxaKkARho\r\nEgnSD7DUh06YSIfVMWtra4Lg2E8GkXfu3BHujJWIBAvM0\/BPr02m9LOmgD7TNE2kkmHNM\/v33hMC\r\nhI7y8ePHKzCPjR3moJ6fn8vaulqttpIPiMfjUmFCM3FxcYFyuSyTxoIHMsiUpt3dXdEAauTOzo5Q\r\nOhSek5MTgdzr6+s4Pj6WvDpN2jfffCOUyXK5RKlUQr1ex6tXr7BYLFaE6eLiQoJP0kh37twROkS3\r\nGsywptNpbG9v4\/T0VJx4sViUZQ\/NZvPWvLodBG\/\/DhXrsiaTidAJJO\/oPygVlmVhfX0d0+kUF90L\r\n0RpSFjQtz549E21oNBqYz+c4PT2VAavVatjb25NcejabRb\/fl\/XkL1+Gv65KW345ftre3ka+kIdp\r\nmOLfmDijQy0UCshms5Kcormr1WorVfsUPPq1crmMYrEoQWy1WhXfA0REJ\/1roVAQEx6Px1cK9G7V\r\nEN\/339Ijwl5m13K5HO7evSuBzWW6Red8WAytryHh9agxg8EAd+7cWYnmqfq1Wk1qYbkGfWtrC6lU\r\nCv1+H5VKZYXO0QdxNBxJnVg6nUav15OB0qs\/mJr1fV9yHUw6JRIJqRMmSUrqhMmpZrOJ8\/NzMYss\r\nsAYiOoUUfr1el6zk+vr67ROyWCzeqiM1DAPD4RCff\/65QFqaGqIk+g7LslAqlbC9vY3Xr19Loj+d\r\nTuPDDz\/El19+KSnZR48eIZFI4PXraIsusqLb29t49OgRxuOxLG8Yj8doNpuo1+tSkM2VuvP5HPv7\r\n+1K5mMlk8PDhQ6FtuMiTAS39HKtmaDoYoKbTaYxGI1mMw2uMJyFpSEhNdMbcuGVZqNVqUrNG2oRM\r\nNzOsNPPfSUOePHkiEs1gjQ+j0yf0E48ePZJ8AJnWnZ0d7O\/vC7pKJpN4+vTpyr2YV2BdLIsYuGQt\r\nCAKUSiV8+OGHcn3P8wT2cmD1HDcLGfL5PI6Pj1eWnDGFC0DWmuzt7eH09FQg7Hg8xtbWlqxHYX\/u\r\n37+P8\/NzIVCz2SxqtRqOj4+RTqeRy+Xw7Nkz1Ot1iez1lPFtZsv4+7\/\/+\/\/ur\/7qr\/7bIAjE29Cp\r\nHRwcrKxDpyN0XVc2XiHlzXXbrNYgz9PtdiVRs1gs8PDhQxwfH0vxNO0steXevXsYDAY4ODgQmM0s\r\nHBBVLXqeh62tLWxvb0vVCRNRjNo5STS9LKKoVCrCN1HTadb09YaEuazSD\/2jgSCAnMPcDk1yr9cT\r\nprpUKknKgcvsbpmQf2Pbtn3lr4aR4mBUyw6zaG5jY2NlXQW1hCuFgBClMf4gU2zbNrZ3tjGfzYXr\r\nulw6VKvVEI\/HMRqNkM\/nMZ\/PUavVJE9C2kRfr8iElL6DkGVZEuvcvXtXNq3hxgHMzevcGgv+CoUC\r\nhsMhzs7OsLe3B8\/zcHx8vJKKZsDKtR\/5fF4WiHKSiOz4\/XuhLAAr2FtfGkAM32g0VragSKVSyGQy\r\nUj3IEhpGuolEAq2TlnBbelqU+RDSIix0Y2qYWT7aYgqLXiTOCktd4rnsmhJ+584dqZBkgQRNLt8T\r\nTlOzaYaI3FzXlfoCDi6Z4eVyiXK5jHq9Lghte3tbgsbvFIfM53NJKLEojpHo2dmZVA+6rovBYCCB\r\nUTKZFFRBSiWfz4cB3WSKbCaLo6MjFAoFHB0dyb5VqVQK33zzDYBogSaJRyaP6Jh5P0ock0hcW+i6\r\nrgSzLPTu9\/tS+KATftVqVZabcVDJZbGx6E5Pfh0cHAhDzfw790LJZrNShXl6eir9IKXyrSeED\/H4\r\n8eOVZWhEV+VyWZaC6dtevHnzBvl8HpubmyubrBDWkj6wLGsl2qckM7ZhwEdExOsQWDSbTSwWCwwG\r\nA1SrVVnZpEssi6SZOKOWkophwo27+5D9pYR3u13RdAaxdN7L5RKNRgO1Wk0o+EajIZWdjuMImbm+\r\nvi682zvFIVd9yPUcn376qZgIToxunympnucJuUfGk+iCaIi5BmbsSBICwOHhIdbW1mQnN+YqTNOU\r\nCnwuN+MCmk6ng2q1KllNajX9FTczMAwD48kYlmmt1OCSTGQwR+KQqV76M05Kr9dDMpkUxkEvQdKT\r\nZswHsb6AJpzJs1t9yGKxeKtyiw\/1+PFjgbCUWKo9CbvJZCKSxoidjfacmsVtlYg6aF64tYVpmrI0\r\ngKalVqsJMNAljHuLsL8cfL3gmTmc3Z1dqRLhQDO45eL+ly9fYmdnB6PRCG\/evEGz2USv18NkMpEA\r\ntdVqSfXh+fk5Dg8PEY\/H0Ww2cXZ2tlJ1SbqH+8OQGb5VQ5bL5VvRil79nslkxGGyeI3wcmtrC69e\r\nvZIKQfJAu7u7gmJYrTGbzVAqlVCpVPDNN9+gVCoJFN7c3EQ2m8WLFy9k4ilRXM+XSqXQ6XSwt7cn\r\nO0M8ePAAm5ubb+2+w6Qay4E4UQQKHBgmnVi1SOTGuIv0Bzk0liNREBgg0iRTkMjZUdPoo65bgn6r\r\nyQLCxY57e3srS7q4CIV2mNtUcODpazKZDMrl8spCSkbTxWIRe3t7Iq22bcuOQVzRpKeA6XM4CMlk\r\nEtvb2xKU6dLY7XZRr9clY0etOjo6kgIFBo1nZ2dSr0tKo9VqSQ6cDO18PhftmU6nOD8\/FyKULDT9\r\nVK1WAwBZ1MQ6NiJKwvkbJ+QqR6NvDENkQeaSHBU3pWROXM8a6usQh8OhkJS+78umMCxSGA6H6HQ6\r\nwlEx18EtoebzOYrFotDnLJbQ07eGYWB9fV0KMAitCUQ4ufyMRQxcm6KncGezmZglSj+LzWkq2b9c\r\nLicAoVwuSzkqAElOUYj0hUs3TojjOImrihxc1xU2lsmcXC4nq19ZT8VkECP2bDYrSS19F7bxeCxB\r\n2ng8Rr\/fR6PREMfH+7BIgNJHR3hwcIBkMolCoSD9IbqihrBc6eLiAmtraygUCvj666+FsmF\/z8\/P\r\nJY5ZLpc4Pj6W6kKuyeeCV2Yv9U01Y7EYut2uaDB96unpqSBQMtYsmnuXGASAlJKuTB2lirkQxiIM\r\nApmA4UAQsbCQjFtccLLIga2vr4emaunANExx+uvr61IUrS8DY6zQ6\/Xw85\/\/HIlEQrSQsQu1uVqt\r\nYjgcykZk9AdbW1uShGL8QRaXASoHjnu1FAoFuQ8zj\/yfk762tiY+i5PNRZ\/1el3yK\/Q\/75zCtW37\r\nrQUiLHL46quvsLGxIfuINJtNHBwcCK9FU0LOiHEJ11YMBgPcvXtX0qAbGxuwbRutVkvsM6mIvb09\r\nPHv2TNaYcw15pVLB4eHhSt6eexjeu3dPJqXdbmM6nYofm0wmaJ20YJkmJpOpbKfU6\/Wws7MjCSwS\r\nmDoo0QXl5OQEd+7cQafTWVlBvLGxgVarJRqcyWQk\/uDnjuPg\/v376HQ6wljfOiFXfUi2d39\/H\/l8\r\nHtVqlbMnnBXRCtUWiCoHyXQC0cYz3E2N+1QxpmHughpRKpUEUlOqqtWqrPFjLRZjCQpQs9kUX0dt\r\nJXdGapzggQs1gbd3n6CgtNtt8QvMu+sbuQHR3o1EVQQ3m5ubyGQyOD8\/F6LxO1EnlLBnz5\/BMtXC\r\nmnQKuzu7Eqmy\/rbZbMq23EC4Avbrr7+WBZu2baPRaGA4HMrSA0pjpVLB69evhSnd2NjA559\/LnZZ\r\nX1rG7WcXiwV6vR5isRj29vbEwbbbbQyHQ9kliL7r8ePHmEwmaLfboSbHY3CXq9vV6lsM7u\/vo91u\r\no9Fo4PT0VAociALpkzhGyWQS+\/v7oj2kWH75y19isVig1WoJBCb19F4akkqlsLO9I+aIWJslPcT0\r\nXIhCTUmlUnj48KHk4PlA1WpV+C3deetb\/7Fkh3EHJZx9oENnaSaRD2Exg9i1tTXE43EpzK7X67Kj\r\n3GKxQKlYQrlcXtlVW8+nE54WCgUpviBK2t3dFaGloLAwL5lKSlw0n89Rr9dlgaxeXfmtJ4Q3pNpz\r\nLeHp6SkSibjkCzqdDqbT6Up1yOnpqai\/YRjY398XxML9TTh54\/F4hbDjg6ytrYU5+osLidJLpRIu\r\nLi6k1pbmhFCWi\/5ns5lcl4UXOzs7mEwmsi6E4IHrRxKJODKZcH098yg0fdy1+tWrVyv7lnAyifQm\r\nk4nUGjByZ31xKpXCzs6OLG59L5PlOA7G47FwWNwoYDAYCEp58+aN7HDA\/ADP54DcvXtXAkmaDq6S\r\n5e6h+lqR4XC4UspPNFSpVGQdBlcGk9Ul0uFma9QUIiuuXqpUKitL3rjpwHg8Rj6fl9iBzp9WYblc\r\nyhav3LzMNE2pLkmlUigUClLRaZqm+DQdMb5TpO553luTQtPDEhwGaUCUFyaqYsbMjtlIJpKSR+DW\r\nffP5HOVyWVR8d3dX1uJd1XQp4srdq7673E5OTqR8lY6bBXHD4VAQELOANJEkHEm993o9McvM\/skv\r\nKKgBZuUMTZ2+OuvFixfCNFCY6K8Yyd84IY7jpAL5dbhIQwaDAT799FNZrcTCBdrA7e1tIdu45+F0\r\nOsXh4eEKGem6LlqtlgysZVm4c+eO7OJzU7vKAeq79OitUqnIwv1arYaLiwvJmZTLZfn5C\/4GCFkC\r\nml\/HcVAqlYQo5Y8KcO0hQQtBDBNp3Js3CAJJYXOb8tlsJjtfcMJunZCrPiRN8qtf\/QoAxPbScZKC\r\nr9VqK2vTLcvCX\/zFX4hWsek7jNJxsjyI\/wPROhR90HkM\/QwXvujJISBcWDOZTrB0llJVqK+L557y\r\neqKNFS80tXq2k7mYwWCAXq8n+0LSt1FjWRXJTCRLayeTCRZOuAM3V1FVKpX3JxeZRGItLFOyzCfo\r\nv97GKFvf+ggId5pbzBcCE\/VcSjYbZg6JgLjJfQgcErL4hXaXgejZ2ZnY8b29PWxsbIif4y4LrO\/l\r\nKuHFYiG\/WkAGmRG5nnijnQcgmzUT6XFSGQeRAjo7O0OpVBLSUNemeCyO2m5YIkRw8F4awkbbSchG\r\n5MFgCoBMBjN0DNr0rcV1BldfP85tNRjlshiAFeZ6Pp9CQvoFgBRZcLDG47FUyZC2MAwDnU4H5XIZ\r\n1WpVlkXQrDARxi0A9ZVh5+fnqNfrQgMB0W9YxeNxqWrXfxuF4QBrALh1UzqdllXD33pCWCjHBEyt\r\nVpMolLkHfdMwrsXmTzawMJokH5EIpZUZQGbaSFQul0t88MEHsCxL9sq9qekmjdWIXILNNfGpVEp2\r\nizAtE6ZhiknVfQo38adp3NzclOBWD4RZ1HfbLx3oe3MxNnmXdqOGmKaJ6SzKS5O5ZM0uq\/uY+aNd\r\nZ7mmvs0FB4EkXbFYlLWAtO36r9J820aNYwqVqQPC8kwmgwCB7FzHwJFlsLwnP4vFYqJVpHaYS6ej\r\nvynq1tcTvutkAIDxt3\/7t\/\/nX\/\/1X\/\/GDH90+Fs1Dt5lhHZdB6777jrk9E4PcMW578Kq6ufox1\/+\r\n7HLq+H37+Y7t39iu68Zxze+z3tauclI3dfa67973Abm7BICVqo5ve72rjtc\/+xNOwFvNVHHI93bD\r\nP1YjtfPZZ5\/JT\/D9x9Bs3\/ftP8eHIdx+8ODBO\/3ywJ9Le6efXv2xNsuyJIX7H0szr9o44M+p\/Tn3\r\n\/ar2g2jIu6IgtquQzuXrvcvEXHXcTef+EJP9vU+I53nyQ2Fs+m4NXCLd7\/eRy+Ukkm61WrK3CYsZ\r\n6Df03xUhG0C2gD9FxFwLmWDuIsHFq1yQw0g8k8lI3fD3OiGmaS6\/+2XevZEV5Ub+3L4VgBQmM4om\r\nIcgk1Zs3b2TjfD23sFwupdqQXFoqlZIyH1aDcNL5MxOj0UjYAibVLi4uUCgUUK1WZR389z0hi+\/1\r\nhraNhw8fSn2tvtUTH14Pzvhe54H4Q2BXNfJs+kaWenxyUxpVT01\/35oh44P3DAq\/S9PLbQC8BVkv\r\nR\/7fpl1OfF2+1k0Sz6rJH7LZnucFf25I5YeS3u+j2ZlMZl1PCgFvo4vbaIT3oUv0724TiNuO+zY0\r\nx3dFVDfxX9e1ywJ0HTfm+\/6OfXFxsfl3f\/d3K6pMZpb0tr7xGBM4tM06BU66+bIP0L\/Tcyv6n378\r\nVROhV7PrmUX9\/MvnXDeRVw2qfn3eT9868Cbofbmfl+9\/1URczooqkHHX7vV6+OKLL1aKo2EACFYH\r\n9KpZvuwHrmN9Lx+nd1bP0un30V8vX0vvk\/75VZp+eSD1464TAL1dXnR0eUD1teh69vHyhPFzjoVe\r\nB6Zf7z8AzauZ4nNa7\/wAAAAldEVYdGRhdGU6Y3JlYXRlADIwMTItMTItMThUMjE6NDI6NDMrMDA6\r\nMDCMOVUEAAAAJXRFWHRkYXRlOm1vZGlmeQAyMDEyLTEyLTE4VDIxOjQyOjQzKzAwOjAw\/WTtuAAA\r\nAB10RVh0U29mdHdhcmUAR1BMIEdob3N0c2NyaXB0IDkuMDZqpgw1AAAAAElFTkSuQmCC\r\n",
  "status": 200,
  "names": [
    {
      "namestring": "Cosmocerca panamaensis",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-1",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-2",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-3",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-5",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-6"
      ]
    },
    {
      "namestring": "Nemata",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-1"
      ]
    },
    {
      "namestring": "Cosmocercidae",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-1",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-2",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-6",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-7"
      ]
    },
    {
      "namestring": "Dendrobates pumilio",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-1",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-3",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-6"
      ]
    },
    {
      "namestring": "Cosmocerca",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-1",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-2",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-5",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-6",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-7"
      ]
    },
    {
      "namestring": "C. panamaensissp",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-1"
      ]
    },
    {
      "namestring": "Paracosmocerca spinocerca",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-1",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-6"
      ]
    },
    {
      "namestring": "Cosmocerca spinocerca",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-1",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-2",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-5",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-6"
      ]
    },
    {
      "namestring": "Cosmocerca parasitizing",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-1",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-7"
      ]
    },
    {
      "namestring": "Dendrobatidae",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-1"
      ]
    },
    {
      "namestring": "Cosmocercoidea",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-1",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-2",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-7"
      ]
    },
    {
      "namestring": "Cosmocercinae",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-1",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-2",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-6",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-7"
      ]
    },
    {
      "namestring": "Cosmocerca ornata",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-1",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-2",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-5",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-6"
      ]
    },
    {
      "namestring": "Oxyuris",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-1",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-6"
      ]
    },
    {
      "namestring": "Rana esculenta",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-1"
      ]
    },
    {
      "namestring": "Rana temporaria",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-1",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-6"
      ]
    },
    {
      "namestring": "Cosmocerca brasiliensis",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-1",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-7"
      ]
    },
    {
      "namestring": "Cosmocerca chiliensis",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-1",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-2"
      ]
    },
    {
      "namestring": "Cosmocerca commutata",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-1",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-2",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-6"
      ]
    },
    {
      "namestring": "Cosmocerca cruzi",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-1",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-2",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-5"
      ]
    },
    {
      "namestring": "Cosmocerca parva",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-1",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-2",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-5"
      ]
    },
    {
      "namestring": "Cosmocerca rara",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-1"
      ]
    },
    {
      "namestring": "Cosmocerca travassoi",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-1"
      ]
    },
    {
      "namestring": "Cosmocerca uruguayensis",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-1",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-2"
      ]
    },
    {
      "namestring": "Dendrobates parvulus",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-1",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-7"
      ]
    },
    {
      "namestring": "Cosmocerca braziliensis",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-1"
      ]
    },
    {
      "namestring": "Cosmocerca trispinosa",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-2",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-6"
      ]
    },
    {
      "namestring": "Cosmocerca longicauda",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-2",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-5",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-7"
      ]
    },
    {
      "namestring": "Cosmocerca freitasi",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-2"
      ]
    },
    {
      "namestring": "Cosmocerca japonica",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-2"
      ]
    },
    {
      "namestring": "C. pulcherhma",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-2"
      ]
    },
    {
      "namestring": "Cosmocerca limnodynastes",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-2",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-5"
      ]
    },
    {
      "namestring": "C. timpohejevoi",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-2"
      ]
    },
    {
      "namestring": "Cosmocerca banyulensis",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-2"
      ]
    },
    {
      "namestring": "Cosmocerca kashmirensis",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-2"
      ]
    },
    {
      "namestring": "Cosmocerca travassosi",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-2"
      ]
    },
    {
      "namestring": "Cosmocerca crenshawi",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-2"
      ]
    },
    {
      "namestring": "Cosmocerca indica",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-2",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-5"
      ]
    },
    {
      "namestring": "Cosmocerca mucronata",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-2"
      ]
    },
    {
      "namestring": "Cosmocerca macrogubernaculum",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-2",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-5"
      ]
    },
    {
      "namestring": "Cosmocerca podicipinus",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-2"
      ]
    },
    {
      "namestring": "Gubernaculum",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-2"
      ]
    },
    {
      "namestring": "Cosmocercapanamaensis",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-4"
      ]
    },
    {
      "namestring": "C. panamaensis resem",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-5"
      ]
    },
    {
      "namestring": "C. ornata",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-5"
      ]
    },
    {
      "namestring": "Bufo",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-5"
      ]
    },
    {
      "namestring": "C. parva",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-5"
      ]
    },
    {
      "namestring": "Elosia nasus",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-5"
      ]
    },
    {
      "namestring": "C. limnodynastes",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-5"
      ]
    },
    {
      "namestring": "Limnodynastes dorsalis",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-5"
      ]
    },
    {
      "namestring": "C. minuscula",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-5"
      ]
    },
    {
      "namestring": "C. indica",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-5"
      ]
    },
    {
      "namestring": "Rana cyanophyctis",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-5"
      ]
    },
    {
      "namestring": "C. cruzi",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-5"
      ]
    },
    {
      "namestring": "Leptodactylus ocellatus",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-5"
      ]
    },
    {
      "namestring": "C. panamaensis",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-5"
      ]
    },
    {
      "namestring": "Cosmocerca minuscula",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-5",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-6"
      ]
    },
    {
      "namestring": "Cosmocerca pana",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-5",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-7"
      ]
    },
    {
      "namestring": "Elosia (Helosia) nasus",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-5"
      ]
    },
    {
      "namestring": "Califor- nia",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-5"
      ]
    },
    {
      "namestring": "Oxyuris ornata",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-6",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-7"
      ]
    },
    {
      "namestring": "Ascaris commutata",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-6"
      ]
    },
    {
      "namestring": "Cosmo- cercoidea",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-6"
      ]
    },
    {
      "namestring": "Haemonchus",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-6",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-7"
      ]
    },
    {
      "namestring": "Trichostrongylidae",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-6"
      ]
    },
    {
      "namestring": "Aplectana",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-6",
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-7"
      ]
    },
    {
      "namestring": "Oxysomatium",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-7"
      ]
    },
    {
      "namestring": "Oxysomatinae",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-7"
      ]
    },
    {
      "namestring": "Dendrobates",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-7"
      ]
    },
    {
      "namestring": "Oxyso- matium",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-7"
      ]
    },
    {
      "namestring": "Nematoda",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-7"
      ]
    },
    {
      "namestring": "Seuratoidea",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-7"
      ]
    },
    {
      "namestring": "Heterakoidea",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-7"
      ]
    },
    {
      "namestring": "Subuluroidea",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-7"
      ]
    },
    {
      "namestring": "Nema toda",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-7"
      ]
    },
    {
      "namestring": "Lago- dovskaya",
      "pages": [
        "c6c34cb11938ee4a6ca6353682b230c84e0a6e2b-7"
      ]
    }
  ],
  "author": [
    {
      "lastname": "Martinez",
      "firstname": "S A",
      "name": "S A Martinez"
    },
    {
      "lastname": "Maggenti",
      "firstname": "A R",
      "name": "A R Maggenti"
    }
  ]
}';

require_once(dirname(dirname(__FILE__)) . '/lib.php');

$id = 'ebd3763643ca8f6e99dfa7a2ab3583b1';
$id = 'e99c4e7a16c8fdd2afe5d9d17968e14e';
$id = '5b21264b860b49fa241b750f5383a0de';


//print_r($reference);

$target_name = 'Megophrys lekaguli';
$target_page = 3;

$target_name = 'Odorrana aureola';
$target_page = 8;

// Not found
// http://bionames.org/references/79bf83103db6ffd731c3cbef47b13f94
$target_name = 'Arthroleptis kidogo';
$target_page = 8;


$target_name = 'Phrynobatrachus irangi';
$target_page =56;

// nope
$target_name = 'Cardioglossa gratiosa peternageli';
$target_name = 'Cardioglossa gratiosa';
$target_page = 249;


$target_name ='Afrixalus crotalus';
$target_page = 209;

$target_name ='Pristimantis adiastolus';
$target_page = 121;

$target_name = 'Cosmocerca panamaensis';
$target_page = 98;

$target_name = 'Kimberleyleotris hutchinsi';
              //Kimberleyeleotris hutchinsi
$target_page = 36;

$target_name = 'Awaouichthys';
$target_page = 85;

$target_name = 'Rhinogobius henchuenensis';
$target_page = 209;



$id = 'b9335fb00721357edd36b962fb24bade';

$target_name ='Belobranchus segura';
$target_page = 480;
$id = 'a03b15bac6829814fea5a2b9bdca3757';





$url = 'http://bionames.org/api/id/' . $id;
$json = get($url);
$reference = json_decode($json);



$obj = new stdclass;
$obj->status = 404;
$obj->name = $target_name;
$obj->microreference = $target_page;
$obj->results = array();



$name_found 	= false;
$name_page 		= 0;
$name_page_url 	= '';

if (isset($reference->names))
{
	$n = count($reference->names);
	$i = 0;
	while (!$name_found && ($i < $n))
	{
		if ($reference->names[$i]->namestring == $target_name)
		{
			$name_found = true;
			break;
		}
		$i++;
	}
	
	if ($name_found) 
	{
		print_r($reference->names[$i]);
		
		// do page numbers match?
		$start_page = 0;
		if (isset($reference->journal->pages))
		{
			if (preg_match('/^(?<spage>.*)--(?<epage>.*)/', $reference->journal->pages, $m))
			{
				$start_page =  $m['spage'];
			}
			else
			{
				$start_page = $reference->journal->pages;
			}
		}
		
		$page_found = false;
		
		foreach ($reference->names[$i]->pages as $page)
		{
			// This gets messy
			// BHL
			if (isset($reference->bhl_pages))
			{
				$local_page = array_search($page, $reference->bhl_pages);
				
				$candidate_page = -1;
				
				if (is_numeric($local_page))
				{
					$candidate_page = $start_page + $local_page;
				}
				
				if (!$page_found && ($candidate_page != -1))
				{
					if ($candidate_page == $target_page)
					{
						$page_found = true;
						
						$hit = new stdclass;
						$hit->page_number = $candidate_page;
						$hit->fragment_identifier = '#' . ($local_page + 1); // BHL pages are zero-offset
						$hit->bhl = $reference->bhl_pages[$local_page];
						$hit->url = 'http://biodiversitylibrary.org/page/' . $reference->bhl_pages[$local_page];
						
						$obj->results[] = $hit;
					}
				}
			}
			else
			{
				// PDF
				$n = count($page);
				
				$candidate_page = -1;
				
				$i = 0;
				while (!$page_found && ($i < $n))
				{
					if (preg_match('/^(?<sha1>.*)\-(?<page>\d+)$/', $page, $m))
					{
					
						$sha1 = $m['sha1'];
						$local_page = $m['page'];
						
						$candidate_page = $start_page + $local_page - 1;
						
						if (!$page_found && ($candidate_page != -1))
						{
							if ($candidate_page == $target_page)
							{
								$page_found = true;
					
								$hit = new stdclass;
								$hit->page_number = $candidate_page;
								$hit->fragment_identifier = '#' . $local_page;
								$hit->url = 'http://bionames.org/bionames-archive/documentcloud/pages/' . $sha1 . '/' . $local_page . '-normal';
					
								$obj->results[] = $hit;
							}
						}
					}

					$i++;
				}
			}
		}
	}
}	

if ($name_found && $page_found)
{
	$obj->status = 200;
}

/*
echo $target_name . "\n";
echo $target_page . "\n";
echo $name_found . "\n";
echo $page_found . "\n";
echo $name_page . "\n";
echo $name_url . "\n";
*/

print_r($obj);





?>
