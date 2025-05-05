 Create a description of all steps which are necessary to deploy your application. think about dependencies to other applications or libraries. (approx. 2-5 pages)



# GeoVista - Deployment Manual
### Der neue Blick auf die Welt


## Projektbeschreibung
Bei GeoVista handelt es sich um eine interaktive Quiz-Website mit geografischen Thematiken. Hierbei können User Multiple-Choice Fragen beantworten können.
Die App besteht aus dem Frontend (HTML/JS) und dem Backend (PHP).

## Systemanforderungen
### Webserver
- XAMPP Kollation: utf8mb4_general_ci
- Apache: 2.4.58
### PHP
- PHP: 8.2.12
- Erforderliche PHP-Erweiterungen, die aktiviert sein müssen: `mysqli`
### Datenbank
- MySQL: 10.4.32-MariaDB



## Deployment-Anleitung

### 🧬 1. Projekt klonen
Um das remote Git-Repository lokal zu klonen, soll das Projekt lokal unter XAMPP im Verzeichnis `C:\xampp\htdocs\` abgelegt werden, indem folgende Befehle in der Git-Bash eingegebenen werden.

```bash
git clone https://github.com/IT-Projects-FH-Technikum/itp_geovista.git
cd itp_geovista
```

### 📐 2. Datenbank einrichten
- XAMPP für `Apache` und `MySQL` starten
- Im Browser [localhost/phpmyadmin](localhost/phpmyadmin) aufrufen 
- Eine neue Datenbank namens `geovista` erstellen
- Den SQL-Dump (Export) aus GitHub mittels `Import` einfügen


### 🏁 3. Server starten
- XAMPP für `Apache` und `MySQL` starten

## 📨 4. Kontakt
projectstechnikum@gmail.com