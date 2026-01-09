# Backend Web Project - Een site maken voor Inter Milafrique

Dit is een dynamische website voor de zaalvoetbalploeg die we hebben opgericht sinds vorig jaar.

## Projectbeschrijving
Ik heb gekozen voor een Inter Milafrique website omdat ik zelf lid ben van deze zaalvoetbalploeg die we vorig jaar hebben opgericht. Deze dynamische website biedt zowel publieke functies als een uitgebreid admin systeem en bevat functies zoals:

* **Nieuwssysteem** - Admins kunnen nieuwsartikelen toevoegen, bewerken en verwijderen met afbeeldingen
* **Tags systeem** - Nieuws categoriseren met tags (many-to-many relatie)
* **Team overzicht** - Publieke pagina met alle spelers, hun foto's, rugnummers en posities
* **Profielpagina's** - Elke speler heeft een publiek profiel met persoonlijke informatie
* **Profiel bewerken** - Users kunnen hun eigen profiel aanpassen (foto, rugnummer, positie, bio)
* **FAQ systeem** - vragen georganiseerd per categorie
* **Contactformulier** - Bezoekers kunnen contact opnemen, admin krijgt email notificatie
* **User management** - Admins kunnen gebruikers beheren en admin rechten toekennen
* **Authenticatie** - Volledige login/registratie met Laravel Breeze
* **Role systeem** - Onderscheid tussen gewone users en admins
* **Database relaties** - One-to-many én many-to-many relaties geïmplementeerd


## Functionele vereisten
**Functioneel:**
- Login systeem
  - Bezoekers kunnen inloggen
  - Alle bezoekers kunnen een nieuwe account aanmaken
  - Een useraccount is of een gewone gebruiker, of een admin
  - Enkel admins kunnen andere gebruikers verheffen tot admin en deze rechten afnemen
  - Enkel admins kunnen een nieuwe gebruiker manueel aanmaken (en deze al dan niet admin maken)
- Profielpagina
  - Elke gebruiker heeft zijn eigen publieke profielpagina die toegankelijk is voor iedereen, ook voor niet ingelogde gebruikers
  - Een ingelogde gebruiker kan diens eigen data aanpassen
  - Een profiel bevat minstens de volgende data (maar de velden zelf zijn optioneel):
  - Username (dus de gebruiker kan zelf kiezen welke naam er op het profiel staat)
  - Verjaardag
  - Profielfoto (dat op de webserver zal bewaard worden)
  - Kleine "over mij" tekst
  - Laatste nieuwtjes
  - Admins kunnen nieuwe nieuwsitems toevoegen, wijzigen en verwijderen
  - Elke bezoeker kan een lijst van alle nieuwtjes en een detail per nieuwtje zien
  - De nieuwsitems hebben minstens:
- Titel
  - Afbeelding (opgeslagen op de server)
  - Content
  - Publicatiedatum
  - FAQ pagina
  - De FAQ-pagina bevat een lijst van vragen en antwoorden, gegroepeerd per categorie
  - Admins kunnen categorieën en vraag/antwoorden toevoegen, wijzigen en verwijderen
  - Elke bezoeker kan de FAQ zien
  - Contact pagina
  - Elke bezoeker kan een contactformulier invullen
  - Bij het versturen van dit contactformulier krijgt de admin een email met de inhoud van het formulier
  

## Installatiehandleiding

### Stap 1: Repository clone
```bash
git clone https://github.com/davidrugeroehb/bw-inter-milafrique.git
cd laravel
```

### Stap 2: Dependencies
```bash
composer install
npm install
```

### Stap 3: .env
```bash
cp .env.example .env
php artisan key:generate
```

### Stap 4: Database Configureren
`.env` aanpassen met mijn database.
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inter_milafrique
DB_USERNAME=root
DB_PASSWORD=
```
**Maak de database handmatig aan:**
- Via MySQL command line: `CREATE DATABASE inter_milafrique;`

### Stap 5: Database Migreren & Seeden
```bash
php artisan migrate:fresh --seed
```
Dit maakt alle tabellen aan en vult ze met testdata:
- 1 admin user
- 4 test spelers
- 3 nieuwsartikelen met tags
- 4 FAQ categorieën met vragen
- 6 nieuws tags

### Stap 6: Storage Link
```bash
php artisan storage:link
```

### Stap 7: Assets Builden
```bash
npm run build
```

### Stap 8: Server Starten

**Met Laravel Herd:**
- Zorg dat de project folder in een Herd path staat
- De website is automatisch beschikbaar op: `http://laravel.test`
- Herd moet draaien (check het icoontje in je systeem tray)


## Screenshots

## Bronnenlijst
- Backend Web Cursusmateriaal
- Eerder kreeg ik het vak Back-End Development aan UCLL, wat hielp bij algemene logica (geen code werd hergebruikt).
- https://laravel.com/docs/12.x/seeding - seeders
- https://www.w3schools.com/php/ - algemene php-kennis
- https://www.php.net/manual/en/index.php - algemene PHP-kennis
- https://laravel.com/docs/12.x/filesystem - storage:link
- https://laravel.com/docs/12.x/migrations - migrations
- https://www.figma.com/nl-nl/ai/ - voor de juiste design
- https://laravel.com/docs/12.x/mail - email
- AI tools – voor foutopsporingen
## Auteur
- **Naam:** [David Rugero]  
- **Opleiding:** [Toegepaste Informatica]  
- **Vak:** [Backend Web]
- **Docent:** [Bert Heyman]
- **Academiejaar:** [2025-2026]
