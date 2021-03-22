

# Cooking Recipes

Aplikacja do publikowania i dzielenia się przepisami kucharskimi

### Autorzy

- Justyn Chroł - Backend
- Kamil Maciuszek - Mobile
- Agnieszka Rudek - Web
- Krystian Duda - Desktop

### Lista funkcjonalności

- Możliwoś dodawania nowych przepisów według określonego szablonu
- Zwracanie listy przepisów danego użytkownika
- Możliwoś filtrowania zwracancyh przepisów (np. obiadowe, szybkie, wege, wyszukiwanie po
   nazwie)
- Możliwoś dodawania do ulubionych
- Możliwoś sortowania (datami, nazwami, ocenami)
- Możliwoś dodania oceny 1-5 dla danego przepisu
- Możliwoś dodania komentarza do oceny
- Logowanie przez facebooka
- Możliwoś usunięcia przepisu
- Możliwoś edycji przepisu
- Możliwoś obserwacji użytkownika
- Powiadomienia mailowe o nowym przepisie

### Dokumntacja

- **[Dokmentacja API](https://app.swaggerhub.com/)**
- **[Schemat bazy danych](https://dbdiagram.io/d/6057d8ceecb54e10c33c86e0)**

### Uruchomienie aplikacji w środowisku deweloperskim

1. Sklonowanie projektu z repozytorium
```
 git clone https://github.com/Cooking-Recipies/Cooking-Recipes-API.git
 ```
2. Dodanie pliku .env
```
 cp .env.example .env (dla systemu linux)
```
```
 copy .env.example .env (dla systemu windows)
```
3. Uruchomienie kontenerów dockerowych
```
 docker-compose up -d --build
```
4. Pobranie zależności
```
 docker-compose exec php composer install
```   
5. Wygenerowanie klucza
```
 docker-compose exec php php artisan key:generate
 ```

6. Migracja tabel w bazie danych i seed danych testowych
```
 docker-compose exec php php artisan migrate --seed
```

7. Aplikacja będzie dostępna pod adresem:
```
 http://localhost
```
