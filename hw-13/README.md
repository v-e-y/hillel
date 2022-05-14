## Download project
```
CMD: git clone https://github.com/v-e-y/hillel.git .
CMD: git checkout hw-13
CMD: cd hw-13
```

## Prepare project
- rename '.env.example' file to '.env'
- Run commands: 
```
CMD: composer update
CMD: php artisan key:generate
```

## Turn on/run project
```
CMD: docker-compose up -d --build
CMD: docker container exec -it hw_13_php /bin/bash
CMD: php artisan migrate:fresh --seed
```

## To look the result
- open browser and new tab
- write to the address line:
```
http://localhost:7760/
```
- fill the inputs (login/password): hw_13_laravel, hw_13_laravel

## Turn of/stop project
```
CMD: docker-compose down
```