## Download project
```
CMD: git clone git clone https://github.com/v-e-y/hillel.git .
```

## Turn on/run and prepare project
```
CMD: git checkout dev-hw-16
```
rename '.env.example' file to '.env'  
and fill constants your own data:  
TELEGRAM_BOT_NAME=  
TELEGRAM_BOT_ID=  
TELEGRAM_API_TOKEN= 

```
CMD: docker-compose up -d --build
CMD: docker container exec -it hillel_hw_16_php /bin/bash
CMD: composer update
CMD: php artisan key:generate
CMD: php artisan migrate:fresh --seed
# to see the result
CMD: php artisan bot:updates
```
After that go to the your Telegram bot and try to write something.

## Turn of/stop project
```
CMD: docker-compose down
```