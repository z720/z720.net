/*
Title: Shell snippets
Template: page
*/

## MacOS X

### Open

**open** opens files, directories and applications.
	
	$ open /Applications/Safari.app/

### pbcopy and pbpaste

copy/past from the command-line:

	$ ls ~ | pbcopy
	$ pbcopy < blogpost.txt
	$ pbpaste >> tasklist.txt

### mdfind

use spotlight index from the command-line:

	$ mdfind -onlyin ~/Documents essay

  
### screencapture

Captures the contents of the screen, including the cursor, and attach the resulting image (named ‘image.png’) to a new Mail message:
	
	$ screencapture -C -M image.png
	$ screencapture -c -W
	$ screencapture -T 10 -P image.png
	$ screencapture -s -t pdf image.pdf
  
### say

Converts text to speech. (Create a podcast)

	$ say -f mynovel.txt -o myaudiobook.aiff

(Source)[http://www.mitchchn.me/2014/os-x-terminal/]
  
  
## Windows

### Decode Base64

Encode/Decode a base64 file:

	$ certutil -decode %FILE%
	$ certutil -encode %FILE%
	
### Hash file

Calcul the file hash with MD5 or SHA1

	$ certutil -hashfile %FILE% %ALGO%
	$ certutil -hashfile C:\Windows\write.exe MD5
	MD5 hash of file C:\Windows\write.exe:
	f8 ed 3b 4b 20 9e 2c b4 90 28 e3 6c f0 6c a8 51
	CertUtil: -hashfile command completed successfully.
	
