# Etarpg

---

<div align="center">

![Static Badge](https://img.shields.io/badge/Symfony-7.0-red?logo=Symfony&label=symfony&logoColor=white)
![Static Badge](https://img.shields.io/badge/php-%5E8.2-red?logo=php&label=php)

</div>

---

## Sommary
- [Database](#create-the-database)
- [Create table](#create-the-table)
- [How it works](#how-it-works)
- [Dependencies](#dependencies)

---

## Create the database
```bash
symfony console doctrine:database:create
```

## Create the migration
```bash
symfony console make:migration
```

## Create the table
```bash
symfony console doctrine:migrations:migrate
```
OR  
```bash
symfony console d:m:m
```

## Run the datafixtures
```bash
symfony console doctrine:fixtures:load
```

---

## How it works
Connection to the website is by discord, and the files managing this connection are :  
- App\Auhenticator\DiscordAuthenticator.php
- App\Controller\Security\DiscordController.php
- App\Service\DiscordApiService.php
- App\Model\DiscordUser.php
- App\Entity\User.php
- templates\discord\check.html.twig
- public\assets\js\check.js

All members of the discord will be able to send a command daily, enabling them to hit a monster and potentially get an item or just earn money to buy items in the shop, which will be randomised every x amount of time.  

Each item must give a score, accumulated in the entity Leaderboard in order to calculate the rank of the members.  

The leaderboard will display all members of the discord who have run the command at least once. Whichever member has run the command, their rank will be displayed at the top of the board, followed by 1st if the member hasn't run the command, etc.  

---

## Dependencies
- [Vich\UploaderBundle](https://github.com/dustin10/VichUploaderBundle)
- [Liip\ImagineBundle](https://github.com/liip/LiipImagineBundle)
- [FakerPHP\Faker](https://github.com/FakerPHP/Faker)

---

## TODO
- DataFixtures
    - UserFixtures
    - ItemsFixtures
    - InventoryItemsFixtures
- Check inventory display
- Leaderboard