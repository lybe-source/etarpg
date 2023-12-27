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
- [Entity](#entity)
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

---

## Entity


---

## Dependencies
- [Vich\UploaderBundle](https://github.com/dustin10/VichUploaderBundle)
- [Liip\ImagineBundle](https://github.com/liip/LiipImagineBundle)
- [FakerPHP\Faker](https://github.com/FakerPHP/Faker)

---