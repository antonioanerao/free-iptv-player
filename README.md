## Free IPTV Player

Watch IPTV from your Internet service provider or free live TV channels from any other source in the web.

**You will need your own M3U8 list.**

- [Thanks to Smart Eye for HTML Template](https://www.smarteyeapps.com/video-streaming-website-templates-free-download).
- [Thanks to @ onigetoc for m3u PHP Parser.m3u8 parser to json](https://github.com/onigetoc/m3u8-PHP-Parser).


## How to use

- Clone this repo
- Run "composer install"
- Rename .env.example to .env and fill inputs with your m3u informations
- Remember to make a new database.sqlite inside storage folder
- Run "php artisan migrate" 
- Put your m3u file inside storage and name it as iptv.m3u
- Run php artisan serve to run the application
- Login to your account (the same in the .env file)
- Go to admin area (look at the top header)
- Click Generate Json 
- Click Store Channels (It will take a bit longer)
- Click get EPG
- Set some movies, series and live tv IDs to your .env file
