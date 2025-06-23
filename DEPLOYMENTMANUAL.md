# GeoVista - Deployment Manual
### Der neue Blick auf die Welt


## Projektbeschreibung
Bei GeoVista handelt es sich um eine interaktive Quiz-Website mit geografischen Thematiken. Hierbei können User Multiple-Choice Fragen beantworten. Es kann sowohl auf Smartphones als auch auf Laptops/PC gespielt werden, da responsives Design integriert worden ist.
Die App besteht aus dem Frontend (HTML/TS) und dem Backend (PHP).

## Systemanforderungen
### Webserver
- XAMPP Kollation: utf8mb4_general_ci
- Apache: 2.4.58
### PHP
- PHP: ab 8.1.2
- Erforderliche PHP-Erweiterungen, die aktiviert sein müssen: `mysqli`
### Datenbank
- Server-Version: ab 10.4.22-MariaDB



## Deployment-Anleitung

### 🧬 1. Projekt klonen
Um das remote Git-Repository lokal zu klonen, soll das Projekt lokal unter XAMPP im Verzeichnis `C:\xampp\htdocs\` abgelegt werden, indem folgende Befehle in der Git-Bash eingegebenen werden.

```bash
git clone https://github.com/IT-Projects-FH-Technikum/itp_geovista.git
cd itp_geovista
```

### 📐 2. Datenbank einrichten
- XAMPP für die Module `Apache` und `MySQL` starten
- Im Browser [localhost/phpmyadmin](localhost/phpmyadmin) aufrufen 
- Eine neue Datenbank namens `geovista` erstellen
- Den SQL-Dump (Export) aus [GitHub](https://github.com/IT-Projects-FH-Technikum/itp_geovista.git) mittels `Import` einfügen


### 🏁 3. Server starten
- XAMPP für die Module `Apache` und `MySQL` starten
- [localhost](localhost) aufrufen und zu dem Projekt-Ordner navigieren


## 📨 4. Kontakt
projectstechnikum@gmail.com
