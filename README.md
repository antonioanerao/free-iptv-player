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
- Run php artisan tinker to create your first account
- Put your account e-mail in IPTV_EMAIL_ADMIN (.env)
- Login and go to admin area
- Set your iptv login and iptv password to your account


## Customization

You can customize the index.blade.php with some IDs to slide, top movies and top series.
