/*
Title: Shell snippets
Template: page
*/

## MacOS X
- **Open** opens files, directories and applications.
  $ open /Applications/Safari.app/

- **pbcopy** and **pbpaste** for copy/past from the command-line
  $ ls ~ | pbcopy
  $ pbcopy < blogpost.txt
  $ pbpaste >> tasklist.txt

- **mdfind**: use spolight index from the command-line
  $ mdfind -onlyin ~/Documents essay
  
- **screencapture** captures the contents of the screen, including the cursor, and attach the resulting image (named ‘image.png’) to a new Mail message:
  $ screencapture -C -M image.png
  
- **say** converts text to speech. Create a podcast:
  $ say -f mynovel.txt -o myaudiobook.aiff

[http://www.mitchchn.me/2014/os-x-terminal/]  
  
